<?php

namespace Rector\Tests\Doctrine\Rector\Class_\RemoveRepositoryFromEntityAnnotationRector\Fixture;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ProductRepository")
 */
class Product
{
}

?>
-----
<?php

namespace Rector\Tests\Doctrine\Rector\Class_\RemoveRepositoryFromEntityAnnotationRector\Fixture;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Product
{
}

?>
