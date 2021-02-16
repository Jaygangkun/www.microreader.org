<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb5b8e5139f85ae4ac7593f8655ba1a80
{
    public static $files = array (
        'da253f61703e9c22a5a34f228526f05a' => __DIR__ . '/..' . '/wixel/gump/gump.class.php',
    );

    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jaybizzle\\CrawlerDetect\\' => 24,
        ),
        'G' => 
        array (
            'GUMP\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jaybizzle\\CrawlerDetect\\' => 
        array (
            0 => __DIR__ . '/..' . '/jaybizzle/crawler-detect/src',
        ),
        'GUMP\\' => 
        array (
            0 => __DIR__ . '/..' . '/wixel/gump/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb5b8e5139f85ae4ac7593f8655ba1a80::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb5b8e5139f85ae4ac7593f8655ba1a80::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
