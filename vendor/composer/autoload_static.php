<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita88bac321e3cafe55c23f5679e53b255
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Curl\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita88bac321e3cafe55c23f5679e53b255::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita88bac321e3cafe55c23f5679e53b255::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
