<?php

declare(strict_types=1);

use Rector\DependencyInjection\Rector\Property\AnnotatedPropertyInjectToConstructorInjectionRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER, __DIR__ . '/../xml/services.xml');

    $services = $containerConfigurator->services();
    $services->set(AnnotatedPropertyInjectToConstructorInjectionRector::class);
};
