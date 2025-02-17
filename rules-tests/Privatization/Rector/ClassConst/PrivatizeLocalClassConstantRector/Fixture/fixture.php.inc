<?php

namespace Rector\Tests\Privatization\Rector\ClassConst\PrivatizeLocalClassConstantRector\Fixture;

class Fixture
{
    const LOCAL_ONLY = true;

    public function isLocalOnly()
    {
        return self::LOCAL_ONLY;
    }
}

?>
-----
<?php

namespace Rector\Tests\Privatization\Rector\ClassConst\PrivatizeLocalClassConstantRector\Fixture;

class Fixture
{
    private const LOCAL_ONLY = true;

    public function isLocalOnly()
    {
        return self::LOCAL_ONLY;
    }
}

?>
