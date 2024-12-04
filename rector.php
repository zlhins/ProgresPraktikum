<?php
declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/vendor/twig/twig/src',
        __DIR__ . '/libraries/classes', // Tambahkan folder lain yang relevan
    ]);

    $rectorConfig->rule(ExplicitNullableParamTypeRector::class);

    // Tambahkan pengaturan PHP versi yang relevan
    $rectorConfig->phpVersion(80401);
};
