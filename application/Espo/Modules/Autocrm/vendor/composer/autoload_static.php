<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb12857746002403259499a7346f6fb27
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'ZipStream\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ZipStream\\' => 
        array (
            0 => __DIR__ . '/..' . '/maennchen/zipstream-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'jSignature_Tools_Base30' => __DIR__ . '/..' . '/brinley/jsignature/extras/SignatureDataConversion_PHP/core/jSignature_Tools_Base30.php',
        'jSignature_Tools_SVG' => __DIR__ . '/..' . '/brinley/jsignature/extras/SignatureDataConversion_PHP/core/jSignature_Tools_SVG.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb12857746002403259499a7346f6fb27::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb12857746002403259499a7346f6fb27::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb12857746002403259499a7346f6fb27::$classMap;

        }, null, ClassLoader::class);
    }
}
