<?php

declare(strict_types=1);

namespace Rector\Tests\DeadCode\Rector\If_\RemoveUnusedNonEmptyArrayBeforeForeachRector;

use Iterator;
use Rector\DeadCode\Rector\If_\RemoveUnusedNonEmptyArrayBeforeForeachRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class RemoveUnusedNonEmptyArrayBeforeForeachRectorTest extends AbstractRectorTestCase
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
        return RemoveUnusedNonEmptyArrayBeforeForeachRector::class;
    }
}
