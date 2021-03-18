<?php

declare(strict_types=1);

use Rector\CodeQualityStrict\Rector\ClassMethod\ParamTypeToAssertTypeRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(ParamTypeToAssertTypeRector::class);
};
