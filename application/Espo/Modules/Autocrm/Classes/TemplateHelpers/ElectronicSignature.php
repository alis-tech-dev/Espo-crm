<?php

namespace Espo\Modules\Autocrm\Classes\TemplateHelpers;

use Espo\Core\Htmlizer\{Helper, Helper\Data, Helper\Result};

class ElectronicSignature implements Helper
{
	private const DEFAULT_WIDTH = 100;

	private const DEFAULT_HEIGHT = 'auto';

	public function render(Data $data): Result
	{
		$base30Str = $data->getArgumentList()[0];
		$width = $data->getOption('width') ?? self::DEFAULT_WIDTH;
		$height = $data->getOption('height') ?? self::DEFAULT_HEIGHT;

		if (!$base30Str) {
			return Result::createEmpty();
		}

		$parts = explode(',', $base30Str, 2);
		$base30 = $parts[1] ?? $parts[0];
		$nativeData = @(new \jSignature_Tools_Base30())->Base64ToNative($base30);
		$svg = @(new \jSignature_Tools_SVG())->NativeToSVG($nativeData);
		$dataString = base64_encode($svg);

		$attributes = [
			'src' => "data:image/svg+xml;base64,$dataString",
			'width' => $width,
			'height' => $height,
		];

		$attributesString = '';

		foreach ($attributes as $name => $value) {
			$attributesString .= sprintf(' %s="%s"', $name, $value);
		}

		return Result::createSafeString("<img alt='Electronic signature' $attributesString>");
	}
}
