<?php

declare(strict_types=1);

namespace Rector\Tests\Php80\Rector\Identical\StrStartsWithRector;

use Iterator;
use Rector\Php80\Rector\Identical\StrStartsWithRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class StrStartsWithRectorTest extends AbstractRectorTestCase
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
        return StrStartsWithRector::class;
    }
}
