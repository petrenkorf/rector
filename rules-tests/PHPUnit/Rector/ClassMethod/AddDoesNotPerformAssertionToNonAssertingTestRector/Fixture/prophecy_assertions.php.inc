<?php

namespace Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Fixture;

use Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Source\Denormalizer;
use Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Source\DenormalizerInterface;

class ProphecyAssertions extends \PHPUnit\Framework\TestCase
{
    public function testDenormalize(): void
    {
        $badData = ['42'];
        $fixedData = [42];

        $type = 'anything';

        /** @var DenormalizerInterface $denormalizer */
        $denormalizer = $this->prophesize(DenormalizerInterface::class);
        $denormalizer
            ->denormalize($fixedData, $type)
            ->shouldBeCalled();

        (new Denormalizer($denormalizer))->handle($badData, $type);
    }
}

?>
-----
<?php

namespace Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Fixture;

use Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Source\Denormalizer;
use Rector\Tests\PHPUnit\Rector\ClassMethod\AddDoesNotPerformAssertionToNonAssertingTestRector\Source\DenormalizerInterface;

class ProphecyAssertions extends \PHPUnit\Framework\TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testDenormalize(): void
    {
        $badData = ['42'];
        $fixedData = [42];

        $type = 'anything';

        /** @var DenormalizerInterface $denormalizer */
        $denormalizer = $this->prophesize(DenormalizerInterface::class);
        $denormalizer
            ->denormalize($fixedData, $type)
            ->shouldBeCalled();

        (new Denormalizer($denormalizer))->handle($badData, $type);
    }
}

?>
