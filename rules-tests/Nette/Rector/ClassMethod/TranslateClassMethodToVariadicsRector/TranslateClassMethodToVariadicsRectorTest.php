<?php

declare(strict_types=1);

namespace Rector\Tests\Nette\Rector\ClassMethod\TranslateClassMethodToVariadicsRector;

use Iterator;
use Rector\Nette\Rector\ClassMethod\TranslateClassMethodToVariadicsRector;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class TranslateClassMethodToVariadicsRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $localFilePath = __DIR__ . '/../../../../../../vendor/nette/utils/src/Utils/ITranslator.php';
        if (file_exists($localFilePath)) {
            $this->smartFileSystem->remove($localFilePath);
        }

        require_once __DIR__ . '/../../../../../stubs/Nette/Localization/ITranslation.php';

        // to make test work with fixture
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
        return __DIR__ . '/config/configured_rule.php';
    }
}
