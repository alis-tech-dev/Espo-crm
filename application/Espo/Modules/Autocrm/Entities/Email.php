<?php

namespace Espo\Modules\Autocrm\Entities;

class Email extends \Espo\Entities\Email
{
    public function getBodyForSending(): string
    {
        $body = parent::getBodyForSending();

        if (!empty($body)) {
            $attachmentList = $this->getInlineAttachmentList();

            foreach ($attachmentList as $attachment) {
                $id = $attachment->getId();

                $body = str_replace(
                    "'?entryPoint=attachment&amp;id={$id}'",
                    "'cid:{$id}'",
                    $body
                );
            }
        }

        return $body;
    }
}
