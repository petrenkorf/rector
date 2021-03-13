<?php

declare(strict_types=1);

use Rector\DeadCode\Rector\Switch_\RemoveDuplicatedCaseInSwitchRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(RemoveDuplicatedCaseInSwitchRector::class);
};
