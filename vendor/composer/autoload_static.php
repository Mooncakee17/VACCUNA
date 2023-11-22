<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc8dcf7cdbda4db3f28157e287400132c
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc8dcf7cdbda4db3f28157e287400132c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc8dcf7cdbda4db3f28157e287400132c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc8dcf7cdbda4db3f28157e287400132c::$classMap;

        }, null, ClassLoader::class);
    }
}