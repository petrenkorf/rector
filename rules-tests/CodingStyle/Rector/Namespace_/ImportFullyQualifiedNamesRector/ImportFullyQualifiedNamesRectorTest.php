<?php

declare(strict_types=1);

namespace Rector\Tests\CodingStyle\Rector\Namespace_\ImportFullyQualifiedNamesRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

/**
 * @see \Rector\PostRector\Rector\NameImportingPostRector
 */
final class ImportFullyQualifiedNamesRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     * @dataProvider provideDataFunction()
     * @dataProvider provideDataGeneric()
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

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideDataFunction(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureFunction');
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideDataGeneric(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureGeneric');
    }

    protected function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/import_config.php';
    }
}
