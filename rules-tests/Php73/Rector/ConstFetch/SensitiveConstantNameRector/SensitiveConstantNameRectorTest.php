<?php

declare(strict_types=1);

namespace Rector\Tests\Php73\Rector\ConstFetch\SensitiveConstantNameRector;

use Iterator;
use Rector\Php73\Rector\ConstFetch\SensitiveConstantNameRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class SensitiveConstantNameRectorTest extends AbstractRectorTestCase
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
        return SensitiveConstantNameRector::class;
    }
}
