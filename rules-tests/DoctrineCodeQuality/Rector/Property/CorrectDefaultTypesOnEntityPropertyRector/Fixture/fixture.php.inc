<?php

namespace Rector\Tests\DoctrineCodeQuality\Rector\Property\CorrectDefaultTypesOnEntityPropertyRector\Fixture;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Column(name="is_old", type="boolean")
     */
    private $isOld = '0';
}

?>
-----
<?php

namespace Rector\Tests\DoctrineCodeQuality\Rector\Property\CorrectDefaultTypesOnEntityPropertyRector\Fixture;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Column(name="is_old", type="boolean")
     */
    private $isOld = false;
}

?>
