<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd85b1bdadd6f2df9f2eae20282ef4c46
{
    public static $classMap = array (
        'Book' => __DIR__ . '/../..' . '/classes/models/product/book.php',
        'ComposerAutoloaderInitd85b1bdadd6f2df9f2eae20282ef4c46' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitd85b1bdadd6f2df9f2eae20282ef4c46' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DVD' => __DIR__ . '/../..' . '/classes/models/product/dvd.php',
        'Database' => __DIR__ . '/../..' . '/classes/core/database.php',
        'Furniture' => __DIR__ . '/../..' . '/classes/models/product/furniture.php',
        'Product' => __DIR__ . '/../..' . '/classes/models/product/product.php',
        'ProductTypeEnum' => __DIR__ . '/../..' . '/classes/models/product/producTypeEnum.php',
        'Utils' => __DIR__ . '/../..' . '/classes/utils/utils.trait.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd85b1bdadd6f2df9f2eae20282ef4c46::$classMap;

        }, null, ClassLoader::class);
    }
}
