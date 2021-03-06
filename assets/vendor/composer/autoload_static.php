<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d42feabdb6f86c4c428c936a704463e
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CodeItNow\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CodeItNow\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeitnowin/barcode/CodeItNow',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d42feabdb6f86c4c428c936a704463e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d42feabdb6f86c4c428c936a704463e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
