<?php

namespace Rector\Tests\DeadDocBlock\Rector\Node\RemoveNonExistingVarAnnotationRector\Fixture;

class Keep
{
    /**
     * @var string
     */
    public const SPLIT_LINE = '#-----\n#';

    public function get()
    {
        /** @var int $trainings */
        $trainings = $this->getAnotherData();

        return $trainings;
    }
}
