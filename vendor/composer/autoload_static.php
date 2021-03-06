<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e8d4da26c1473563dfa71db4c22a2aa
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Delight\\Http\\' => 13,
            'Delight\\Db\\' => 11,
            'Delight\\Cookie\\' => 15,
            'Delight\\Base64\\' => 15,
            'Delight\\Auth\\' => 13,
        ),
        'B' => 
        array (
            'Buki\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Delight\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/http/src',
        ),
        'Delight\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/db/src',
        ),
        'Delight\\Cookie\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/cookie/src',
        ),
        'Delight\\Base64\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/base64/src',
        ),
        'Delight\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/auth/src',
        ),
        'Buki\\' => 
        array (
            0 => __DIR__ . '/..' . '/izniburak/pdox/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'F' => 
        array (
            'Fenom\\' => 
            array (
                0 => __DIR__ . '/..' . '/fenom/fenom/src',
            ),
        ),
    );

    public static $classMap = array (
        'Fenom' => __DIR__ . '/..' . '/fenom/fenom/src/Fenom.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e8d4da26c1473563dfa71db4c22a2aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e8d4da26c1473563dfa71db4c22a2aa::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0e8d4da26c1473563dfa71db4c22a2aa::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit0e8d4da26c1473563dfa71db4c22a2aa::$classMap;

        }, null, ClassLoader::class);
    }
}
