<?php

declare(strict_types=1);

namespace Rector\Tests\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector;

use Iterator;
use Rector\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class PropertyDeferToDeferrableProviderToRectorTest extends AbstractRectorTestCase
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
        return PropertyDeferToDeferrableProviderToRector::class;
    }
}
