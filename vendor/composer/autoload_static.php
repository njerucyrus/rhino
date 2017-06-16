<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2e6d16bb2124dc086289decd86c5fb5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'App\\AppInterface\\BaseInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/BaseInterface.php',
        'App\\AppInterface\\FundInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/FundInterface.php',
        'App\\AppInterface\\PaymentInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/PaymentInterface.php',
        'App\\AppInterface\\ReferralTreeInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/ReferralTreeInterface.php',
        'App\\AppInterface\\SiteInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/SiteInterface.php',
        'App\\AppInterface\\UserInterface' => __DIR__ . '/../..' . '/src/App/AppInterface/UserInterface.php',
        'App\\Auth\\Auth' => __DIR__ . '/../..' . '/src/App/Auth/Auth.php',
        'App\\Controller\\FundController' => __DIR__ . '/../..' . '/src/App/Controller/FundController.php',
        'App\\Controller\\PaymentController' => __DIR__ . '/../..' . '/src/App/Controller/PaymentController.php',
        'App\\Controller\\ReferralTreeController' => __DIR__ . '/../..' . '/src/App/Controller/ReferralTreeController.php',
        'App\\Controller\\SiteController' => __DIR__ . '/../..' . '/src/App/Controller/SiteController.php',
        'App\\Controller\\UserController' => __DIR__ . '/../..' . '/src/App/Controller/UserController.php',
        'App\\DBManager\\ComplexQuery' => __DIR__ . '/../..' . '/src/App/DBManager/ComplexQuery.php',
        'App\\DBManager\\DB' => __DIR__ . '/../..' . '/src/App/DBManager/DB.php',
        'App\\Entity\\Fund' => __DIR__ . '/../..' . '/src/App/Entity/Fund.php',
        'App\\Entity\\Payment' => __DIR__ . '/../..' . '/src/App/Entity/Payment.php',
        'App\\Entity\\ReferralTree' => __DIR__ . '/../..' . '/src/App/Entity/ReferralTree.php',
        'App\\Entity\\Site' => __DIR__ . '/../..' . '/src/App/Entity/Site.php',
        'App\\Entity\\User' => __DIR__ . '/../..' . '/src/App/Entity/User.php',
        'App\\Services\\Mailer\\SendEmail' => __DIR__ . '/../..' . '/src/App/Services/Mailer/SendEmail.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2e6d16bb2124dc086289decd86c5fb5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2e6d16bb2124dc086289decd86c5fb5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf2e6d16bb2124dc086289decd86c5fb5::$classMap;

        }, null, ClassLoader::class);
    }
}
