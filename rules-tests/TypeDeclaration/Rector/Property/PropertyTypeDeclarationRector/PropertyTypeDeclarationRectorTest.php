<?php

declare(strict_types=1);

namespace Rector\Tests\TypeDeclaration\Rector\Property\PropertyTypeDeclarationRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\TypeDeclaration\Rector\Property\PropertyTypeDeclarationRector;
use Symplify\SmartFileSystem\SmartFileInfo;

final class PropertyTypeDeclarationRectorTest extends AbstractRectorTestCase
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
        return PropertyTypeDeclarationRector::class;
    }
}
