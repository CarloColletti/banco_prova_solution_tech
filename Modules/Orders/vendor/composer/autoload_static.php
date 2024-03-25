<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43ba6f3dd488a8734ae84065b7b6b5a3
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Orders\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Orders\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit43ba6f3dd488a8734ae84065b7b6b5a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43ba6f3dd488a8734ae84065b7b6b5a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit43ba6f3dd488a8734ae84065b7b6b5a3::$classMap;

        }, null, ClassLoader::class);
    }
}
