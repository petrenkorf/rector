<?php

namespace Rector\Tests\Doctrine\Rector\MethodCall\EntityAliasToClassConstantReferenceRector\Fixture;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class Test2Controller extends AbstractController
{
    public function indexAction()
    {
        $this->getDoctrine()->getRepository('App:Post');
    }
}

?>
-----
<?php

namespace Rector\Tests\Doctrine\Rector\MethodCall\EntityAliasToClassConstantReferenceRector\Fixture;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class Test2Controller extends AbstractController
{
    public function indexAction()
    {
        $this->getDoctrine()->getRepository(\App\Entity\Post::class);
    }
}

?>
