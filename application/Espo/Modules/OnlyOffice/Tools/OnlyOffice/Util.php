<?php

namespace Espo\Modules\OnlyOffice\Tools\OnlyOffice;

use Espo\Core\Utils\Crypt;
use Espo\Core\Utils\Json;
use Espo\Core\Utils\Metadata;
use Espo\Entities\Attachment;
use Espo\Tools\Attachment\DetailsObtainer;
use JsonException;

class Util
{
    /** @var array{
     *     'cell': string[],
     *     'slide': string[],
     *     'word': string[]
     * } $map
     */
    protected array $map = [];

    public const CALLBACK_STATUS = [
        0 => 'NotFound',
        1 => 'Editing',
        2 => 'MustSave',
        3 => 'Corrupted',
        4 => 'Closed',
        6 => 'MustForceSave',
        7 => 'CorruptedForceSave'
    ];

    public function __construct(
        private readonly Crypt    $crypt,
        private readonly Metadata $metadata
    )
    {
        $this->map = $this->metadata->get(['app', 'file', 'onlyOfficeTypeMap'], []);
    }

    /** @returns string[] */
    public function getAllowedFileTypes(): array
    {
        $list = [];

        foreach ($this->map as $extensions) {
            foreach ($extensions as $ext) {
                $list[] = $ext;
            }
        }

        return $list;
    }

    public function isCellType(string $type): bool
    {
        return in_array($type, $this->map['cell'], true);
    }

    public function isSlideType(string $type): bool
    {
        return in_array($type, $this->map['slide'], true);
    }

    public function isWordType(string $type): bool
    {
        return in_array($type, $this->map['word'], true);
    }

    public function getOnlyOfficeType(Attachment $attachment): ?string
    {
        $type = $this->getExtension($attachment);

        if ($this->isCellType($type)) {
            return 'cell';
        }

        if ($this->isSlideType($type)) {
            return 'slide';
        }

        if ($this->isWordType($type)) {
            return 'text';
        }

        return null;
    }

    public function getCallbackStatus(int $status): ?string
    {
        return self::CALLBACK_STATUS[$status] ?? null;
    }

    /**
     * @throws JsonException
     */
    public function getFileKey(string $attachmentId, string $userId): string
    {
        return urlencode(
            $this->encrypt(Json::encode([
                'attachment_id' => $attachmentId,
                'user_id' => $userId,
            ]))
        );
    }

    public function getActualKey(Attachment $attachment): string
    {
        return md5($attachment->getId() . $attachment->get('modifiedAt'));
    }

    public function sanitizeFileName(string $fileName): string
    {
        return str_replace("\"", "\\\"", $fileName);
    }

    public function encrypt(string $message): string
    {
        return strtr($this->crypt->encrypt($message), '+/=', '-_=');
    }

    public function decrypt(string $message): string
    {
        return $this->crypt->decrypt(strtr($message, '-_=', '+/='));
    }

    public function getExtension(Attachment $attachment): ?string
    {
        return DetailsObtainer::getFileExtension($attachment);
    }
}
