<?php

namespace Rector\Tests\Laravel\Rector\StaticCall\MinutesToSecondsInCacheRector\Fixture;

use Illuminate\Contracts\Cache\Repository;

final class RememberCache
{
    public function run(Repository $repository)
    {
        $repository->remember('key', 'value', 60);
    }
}

?>
-----
<?php

namespace Rector\Tests\Laravel\Rector\StaticCall\MinutesToSecondsInCacheRector\Fixture;

use Illuminate\Contracts\Cache\Repository;

final class RememberCache
{
    public function run(Repository $repository)
    {
        $repository->remember('key', 'value', 60 * 60);
    }
}

?>
