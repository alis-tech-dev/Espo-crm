<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2da3b18f78dc93e658845e0be9539621
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Isdoc\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Isdoc\\' => 
        array (
            0 => __DIR__ . '/..' . '/cetria/isdoc/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2da3b18f78dc93e658845e0be9539621::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2da3b18f78dc93e658845e0be9539621::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2da3b18f78dc93e658845e0be9539621::$classMap;

        }, null, ClassLoader::class);
    }
}
