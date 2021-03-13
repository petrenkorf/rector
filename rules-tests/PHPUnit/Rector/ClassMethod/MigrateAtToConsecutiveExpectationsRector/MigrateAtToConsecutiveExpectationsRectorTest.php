<?php

declare(strict_types=1);

namespace Rector\Tests\PHPUnit\Rector\ClassMethod\MigrateAtToConsecutiveExpectationsRector;

use Iterator;
use Rector\PHPUnit\Rector\ClassMethod\MigrateAtToConsecutiveExpectationsRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class MigrateAtToConsecutiveExpectationsRectorTest extends AbstractRectorTestCase
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

    public function provideConfigFilePath(): string
    {
<<<<<<< HEAD:rules-tests/PHPUnit/Rector/ClassMethod/MigrateAtToConsecutiveExpectationsRector/MigrateAtToConsecutiveExpectationsRectorTest.php
        return MigrateAtToConsecutiveExpectationsRector::class;
=======
        return __DIR__ . '/config/configured_rule.php';
>>>>>>> 232f8d4dc6... use config based tests for rules:rules-tests/Naming/Rector/Property/UnderscoreToCamelCasePropertyNameRector/UnderscoreToCamelCasePropertyNameRectorTest.php
    }
}
