<?php

namespace Espo\Modules\Autocrm\Classes\TemplateHelpers;

use Espo\Core\Htmlizer\{Helper, Helper\Data, Helper\Result};

class ImgTag implements Helper
{
    public function render(Data $data): Result
    {
        $attachmentId = $data->getArgumentList()[0];

        $width = $data->getArgumentList()[1] ?? null;
        $height = $data->getArgumentList()[2] ?? null;

        if (empty($attachmentId)) {
            return Result::createEmpty();
        }

        $imgTag = "<img src=\"?entryPoint=attachment&id=${attachmentId}\"";

        if (!empty($width)) {
            $imgTag .= " width=\"${width}\"";
        }

        if (!empty($height)) {
            $imgTag .= " height=\"${height}\"";
        }

        $imgTag .= ">";

        return Result::createSafeString($imgTag);
    }
}
