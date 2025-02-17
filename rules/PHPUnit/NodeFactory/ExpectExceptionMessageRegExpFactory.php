<?php

declare(strict_types=1);

namespace Rector\PHPUnit\NodeFactory;

use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Scalar\String_;
use Rector\Core\PhpParser\Comparing\NodeComparator;
use Rector\NodeNameResolver\NodeNameResolver;

final class ExpectExceptionMessageRegExpFactory
{
    /**
     * @var NodeNameResolver
     */
    private $nodeNameResolver;

    /**
     * @var ArgumentShiftingFactory
     */
    private $argumentShiftingFactory;

    /**
     * @var NodeComparator
     */
    private $nodeComparator;

    public function __construct(
        NodeNameResolver $nodeNameResolver,
        ArgumentShiftingFactory $argumentShiftingFactory,
        NodeComparator $nodeComparator
    ) {
        $this->nodeNameResolver = $nodeNameResolver;
        $this->argumentShiftingFactory = $argumentShiftingFactory;
        $this->nodeComparator = $nodeComparator;
    }

    public function create(MethodCall $methodCall, Variable $exceptionVariable): ?MethodCall
    {
        if (! $this->nodeNameResolver->isLocalMethodCallNamed($methodCall, 'assertContains')) {
            return null;
        }

        $secondArgument = $methodCall->args[1]->value;
        if (! $secondArgument instanceof MethodCall) {
            return null;
        }

        // looking for "$exception->getMessage()"
        if (! $this->nodeComparator->areNodesEqual($secondArgument->var, $exceptionVariable)) {
            return null;
        }

        if (! $this->nodeNameResolver->isName($secondArgument->name, 'getMessage')) {
            return null;
        }

        $this->argumentShiftingFactory->removeAllButFirstArgMethodCall(
            $methodCall,
            'expectExceptionMessageRegExp'
        );

        // put regex between "#...#" to create match
        if ($methodCall->args[0]->value instanceof String_) {
            /** @var String_ $oldString */
            $oldString = $methodCall->args[0]->value;
            $methodCall->args[0]->value = new String_('#' . preg_quote($oldString->value, '#') . '#');
        }

        return $methodCall;
    }
}
