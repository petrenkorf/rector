<?php

declare(strict_types=1);

namespace Rector\Tests\Php53\Rector\Variable\ReplaceHttpServerVarsByServerRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use SplFileInfo;
use Symplify\SmartFileSystem\SmartFileInfo;

final class ReplaceHttpServerVarsByServerRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator<SplFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
