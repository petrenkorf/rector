<?php

namespace Rector\Tests\Privatization\Rector\ClassConst\PrivatizeLocalClassConstantRector\Fixture;

class SkipMultiOvercomplex
{
    const LOCAL_ONLY = true, AND_ALSO = false;
}

class ExternalMultiUser
{
    public function useMe()
    {
        return SkipMulti::AND_ALSO;
    }
}
