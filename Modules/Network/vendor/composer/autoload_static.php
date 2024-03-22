<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a35268fd01b9e2dca94c683f520f84e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Network\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Network\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9a35268fd01b9e2dca94c683f520f84e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9a35268fd01b9e2dca94c683f520f84e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9a35268fd01b9e2dca94c683f520f84e::$classMap;

        }, null, ClassLoader::class);
    }
}
