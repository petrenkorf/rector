<?php

declare(strict_types=1);

namespace Rector\Tests\RemovingStatic\Rector\Class_\PassFactoryToEntityRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\EasyTesting\StaticFixtureSplitter;
use Symplify\SmartFileSystem\SmartFileInfo;

final class PassFactoryToEntityRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);

        $expectedFactoryFilePath = StaticFixtureSplitter::getTemporaryPath() . '/AnotherClassWithMoreArgumentsFactory.php';

        $this->assertFileExists($expectedFactoryFilePath);
        $this->assertFileEquals(
            __DIR__ . '/Source/ExpectedAnotherClassWithMoreArgumentsFactory.php',
            $expectedFactoryFilePath
        );
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureWithMultipleArguments');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
