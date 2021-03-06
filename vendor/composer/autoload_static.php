<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2a91679ec7d65a35d03915427284c98
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webmozart\\Assert\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webmozart\\Assert\\' => 
        array (
            0 => __DIR__ . '/..' . '/webmozart/assert/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2a91679ec7d65a35d03915427284c98::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2a91679ec7d65a35d03915427284c98::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
