<?php

namespace Rector\Tests\PHPUnit\Rector\MethodCall\AssertSameBoolNullToSpecificMethodRector\Fixture;

final class MyTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $this->assertSame(NULL, 'something');
        $this->assertNotSame(false, 'something', 'message');
    }
}

?>
-----
<?php

namespace Rector\Tests\PHPUnit\Rector\MethodCall\AssertSameBoolNullToSpecificMethodRector\Fixture;

final class MyTest extends \PHPUnit\Framework\TestCase
{
    public function test()
    {
        $this->assertNull('something');
        $this->assertNotFalse('something', 'message');
    }
}

?>
