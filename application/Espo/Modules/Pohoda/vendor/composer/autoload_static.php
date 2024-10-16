<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '0d59ee240a4cd96ddbb4ff164fccea4d' => __DIR__ . '/..' . '/symfony/polyfill-php73/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'mServer\\' => 8,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Php73\\' => 23,
            'Symfony\\Component\\OptionsResolver\\' => 34,
        ),
        'R' => 
        array (
            'Riesenia\\' => 9,
        ),
        'E' => 
        array (
            'Ease\\Logger\\' => 12,
            'Ease\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'mServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/vitexsoftware/pohoda-connector/src/mServer',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Php73\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php73',
        ),
        'Symfony\\Component\\OptionsResolver\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/options-resolver',
        ),
        'Riesenia\\' => 
        array (
            0 => __DIR__ . '/..' . '/riesenia/pohoda/src',
        ),
        'Ease\\Logger\\' => 
        array (
            0 => __DIR__ . '/..' . '/vitexsoftware/ease-core/src/Ease/Logger',
        ),
        'Ease\\' => 
        array (
            0 => __DIR__ . '/..' . '/vitexsoftware/ease-core/src/Ease',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mail' => 
            array (
                0 => __DIR__ . '/..' . '/pear/mail',
                1 => __DIR__ . '/..' . '/pear/mail_mime',
            ),
        ),
        'C' => 
        array (
            'Console' => 
            array (
                0 => __DIR__ . '/..' . '/pear/console_getopt',
            ),
        ),
    );

    public static $fallbackDirsPsr0 = array (
        0 => __DIR__ . '/..' . '/pear/pear-core-minimal/src',
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'JsonException' => __DIR__ . '/..' . '/symfony/polyfill-php73/Resources/stubs/JsonException.php',
        'Lightools\\Xml\\XmlException' => __DIR__ . '/..' . '/lightools/xml/src/Xml/XmlException.php',
        'Lightools\\Xml\\XmlLoader' => __DIR__ . '/..' . '/lightools/xml/src/Xml/XmlLoader.php',
        'PEAR_Exception' => __DIR__ . '/..' . '/pear/pear_exception/PEAR/Exception.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4::$prefixesPsr0;
            $loader->fallbackDirsPsr0 = ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4::$fallbackDirsPsr0;
            $loader->classMap = ComposerStaticInit57f7c0a4ad8efa2d4b9de5f5de3a39f4::$classMap;

        }, null, ClassLoader::class);
    }
}
