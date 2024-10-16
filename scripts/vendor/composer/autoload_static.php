<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit543eed9f3bbd8a86f94fc27092c5787c
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Espo\\ApiClient\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Espo\\ApiClient\\' => 
        array (
            0 => __DIR__ . '/..' . '/espocrm/php-espo-api-client/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit543eed9f3bbd8a86f94fc27092c5787c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit543eed9f3bbd8a86f94fc27092c5787c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit543eed9f3bbd8a86f94fc27092c5787c::$classMap;

        }, null, ClassLoader::class);
    }
}
