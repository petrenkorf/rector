<?php

declare(strict_types=1);

namespace Rector\AttributeAwarePhpDoc\AttributeAwareNodeFactory\PhpDoc;

use PHPStan\PhpDocParser\Ast\Node;
use PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode;
use Rector\AttributeAwarePhpDoc\Ast\PhpDoc\AttributeAwareTemplateTagValueNode;
use Rector\AttributeAwarePhpDoc\Contract\AttributeNodeAwareFactory\AttributeNodeAwareFactoryInterface;

final class AttributeAwareTemplateTagValueNodeFactory implements AttributeNodeAwareFactoryInterface
{
    public function isMatch(Node $node): bool
    {
        return is_a($node, TemplateTagValueNode::class, true);
    }

    /**
     * @param TemplateTagValueNode $node
     */
    public function create(Node $node, string $docContent): AttributeAwareTemplateTagValueNode
    {
        return new AttributeAwareTemplateTagValueNode($node->name, $node->bound, $node->description, $docContent);
    }
}
