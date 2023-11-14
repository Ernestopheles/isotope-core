<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitacd4c19823e73ff28dd3086341c8149a
{
    public static $files = array (
        '9b38cf48e83f5d8f60375221cd213eee' => __DIR__ . '/..' . '/phpstan/phpstan/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TheCodingMachine\\PHPStan\\' => 25,
        ),
        'S' => 
        array (
            'SlamPhpStan\\' => 12,
        ),
        'P' => 
        array (
            'PhpParser\\' => 10,
            'PHPStan\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TheCodingMachine\\PHPStan\\' => 
        array (
            0 => __DIR__ . '/..' . '/thecodingmachine/phpstan-strict-rules/src',
        ),
        'SlamPhpStan\\' => 
        array (
            0 => __DIR__ . '/..' . '/slam/phpstan-extensions/lib',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'PHPStan\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpstan/phpstan-phpunit/src',
            1 => __DIR__ . '/..' . '/phpstan/phpstan-symfony/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitacd4c19823e73ff28dd3086341c8149a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitacd4c19823e73ff28dd3086341c8149a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitacd4c19823e73ff28dd3086341c8149a::$classMap;

        }, null, ClassLoader::class);
    }
}
