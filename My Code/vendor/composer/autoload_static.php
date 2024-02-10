<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19e9c16320cc93d62e781e980de15f54
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19e9c16320cc93d62e781e980de15f54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19e9c16320cc93d62e781e980de15f54::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19e9c16320cc93d62e781e980de15f54::$classMap;

        }, null, ClassLoader::class);
    }
}
