<?php

declare(strict_types=1);

namespace Rector\Tests\CodingStyle\Rector\Namespace_\ImportFullyQualifiedNamesRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

/**
 * @see \Rector\PostRector\Rector\NameImportingPostRector
 */
final class ImportRootNamespaceClassesDisabledTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator
     */
    public function provideData(): iterable
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureRoot');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/not_import_short_classes.php';
    }
}
