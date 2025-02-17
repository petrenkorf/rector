<?php

declare(strict_types=1);

namespace Rector\Tests\Laravel\Rector\StaticCall\RequestStaticValidateToInjectRector;

use Iterator;
use Rector\Laravel\Rector\StaticCall\RequestStaticValidateToInjectRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class RequestStaticValidateToInjectRectorTest extends AbstractRectorTestCase
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
        return RequestStaticValidateToInjectRector::class;
    }
}
