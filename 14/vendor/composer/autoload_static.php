<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce063041ffa3b156eeab73c1ab90c875
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Graphp\\Algorithms\\' => 18,
        ),
        'F' => 
        array (
            'Fhaculty\\Graph\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Graphp\\Algorithms\\' => 
        array (
            0 => __DIR__ . '/..' . '/graphp/algorithms/src',
        ),
        'Fhaculty\\Graph\\' => 
        array (
            0 => __DIR__ . '/..' . '/clue/graph/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce063041ffa3b156eeab73c1ab90c875::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce063041ffa3b156eeab73c1ab90c875::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
