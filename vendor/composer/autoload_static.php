<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a6e719a813c22a157e174e5bd962bb4
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        '6157b075b923803e5ef157aeb43b83bd' => __DIR__ . '/..' . '/tamtamchik/simple-flash/src/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tamtamchik\\SimpleFlash\\' => 23,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'K' => 
        array (
            'Kint\\' => 5,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
        'A' => 
        array (
            'Aura\\SqlQuery\\' => 14,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tamtamchik\\SimpleFlash\\' => 
        array (
            0 => __DIR__ . '/..' . '/tamtamchik/simple-flash/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a6e719a813c22a157e174e5bd962bb4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a6e719a813c22a157e174e5bd962bb4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a6e719a813c22a157e174e5bd962bb4::$classMap;

        }, null, ClassLoader::class);
    }
}
