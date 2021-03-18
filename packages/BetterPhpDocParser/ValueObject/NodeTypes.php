<?php

declare(strict_types=1);

namespace Rector\BetterPhpDocParser\ValueObject;

use PHPStan\PhpDocParser\Ast\PhpDoc\ParamTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PropertyTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\ReturnTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\ThrowsTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\VarTagValueNode;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Doctrine\Property_\OneToManyTagValueNode;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\JMS\SerializerTypeTagValueNode;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Symfony\Validator\Constraints\AssertChoiceTagValueNode;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Symfony\Validator\Constraints\AssertEmailTagValueNode;
use Rector\BetterPhpDocParser\ValueObject\PhpDocNode\Symfony\Validator\Constraints\AssertRangeTagValueNode;

final class NodeTypes
{
    /**
     * @var array<class-string<PhpDocTagValueNode>>
     */
    public const TYPE_AWARE_NODES = [
        VarTagValueNode::class,
        ParamTagValueNode::class,
        ReturnTagValueNode::class,
        ThrowsTagValueNode::class,
        PropertyTagValueNode::class,
        SerializerTypeTagValueNode::class,
        OneToManyTagValueNode::class,
        AssertChoiceTagValueNode::class,
        AssertEmailTagValueNode::class,
        AssertRangeTagValueNode::class,
    ];
}
