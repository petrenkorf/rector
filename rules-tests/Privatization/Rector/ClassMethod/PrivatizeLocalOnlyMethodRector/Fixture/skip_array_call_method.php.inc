<?php

namespace Rector\Tests\Privatization\Rector\ClassMethod\PrivatizeLocalOnlyMethodRector\Fixture;

class SkipArrayCallMethod
{
    /**
     * @api
     */
    public function run()
    {
        register_shutdown_function([$this, 'my_method']);
    }

    public function my_method()
    {
    }
}
