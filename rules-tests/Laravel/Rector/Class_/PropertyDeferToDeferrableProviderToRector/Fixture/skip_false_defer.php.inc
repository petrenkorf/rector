<?php

namespace Rector\Tests\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector\Fixture;

use Illuminate\Support\ServiceProvider;

final class SkipFalseDefer extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;
}
