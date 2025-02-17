<?php

declare(strict_types=1);

namespace Rector\Tests\Carbon\Rector\MethodCall\ChangeCarbonSingularMethodCallToPluralRector;

use Iterator;
use Rector\Carbon\Rector\MethodCall\ChangeCarbonSingularMethodCallToPluralRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class ChangeCarbonSingularMethodCallToPluralRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return ChangeCarbonSingularMethodCallToPluralRector::class;
    }
}
