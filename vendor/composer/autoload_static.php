<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b036368ab274611a69c19f1578b5140
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Razorpay\\Tests\\' => 15,
            'Razorpay\\Api\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Razorpay\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/razorpay/razorpay/tests',
        ),
        'Razorpay\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/razorpay/razorpay/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Requests' => 
            array (
                0 => __DIR__ . '/..' . '/rmccue/requests/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b036368ab274611a69c19f1578b5140::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b036368ab274611a69c19f1578b5140::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6b036368ab274611a69c19f1578b5140::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
