<?php

declare(strict_types=1);

namespace Rector\Tests\CodeQuality\Rector\Foreach_\ForeachToInArrayRector;

use Iterator;
use Rector\CodeQuality\Rector\Foreach_\ForeachToInArrayRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class ForeachToInArrayRectorTest extends AbstractRectorTestCase
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
        return ForeachToInArrayRector::class;
    }
}
