<?php

declare(strict_types=1);

namespace Rector\Tests\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;

use Iterator;
use Rector\CodeQuality\Rector\Expression\InlineIfToExplicitIfRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class InlineIfToExplicitIfRectorTest extends AbstractRectorTestCase
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
        return InlineIfToExplicitIfRector::class;
    }
}
