<?php

declare(strict_types=1);

namespace Rector\Tests\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector;

use Iterator;
use Rector\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class ArrayKeyExistsTernaryThenValueToCoalescingRectorTest extends AbstractRectorTestCase
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
        return ArrayKeyExistsTernaryThenValueToCoalescingRector::class;
    }
}
