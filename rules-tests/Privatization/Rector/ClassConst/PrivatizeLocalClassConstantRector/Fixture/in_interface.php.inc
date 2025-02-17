<?php

namespace Rector\Tests\Privatization\Rector\ClassConst\PrivatizeLocalClassConstantRector\Fixture;

interface InterfaceWithConstant
{
    const LOCAL_ONLY = true;
}

class ClassExtendingInterface implements InterfaceWithConstant
{
    public function run()
    {
        return self::LOCAL_ONLY;
    }
}

?>
-----
<?php

namespace Rector\Tests\Privatization\Rector\ClassConst\PrivatizeLocalClassConstantRector\Fixture;

interface InterfaceWithConstant
{
    public const LOCAL_ONLY = true;
}

class ClassExtendingInterface implements InterfaceWithConstant
{
    public function run()
    {
        return self::LOCAL_ONLY;
    }
}

?>
