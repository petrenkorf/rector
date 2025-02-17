<?php

declare(strict_types=1);

namespace Rector\Defluent\Rector\Return_;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Rector\AbstractRector;
use Rector\Defluent\Matcher\AssignAndRootExprAndNodesToAddMatcher;
use Rector\Defluent\Skipper\FluentMethodCallSkipper;
use Rector\Defluent\ValueObject\AssignAndRootExprAndNodesToAdd;
use Rector\Defluent\ValueObject\FluentCallsKind;
use Rector\Symfony\NodeAnalyzer\FluentNodeRemover;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see https://ocramius.github.io/blog/fluent-interfaces-are-evil/
 * @see https://www.yegor256.com/2018/03/13/fluent-interfaces.html
 *
 * @see \Rector\Tests\Defluent\Rector\MethodCall\FluentChainMethodCallToNormalMethodCallRector\FluentChainMethodCallToNormalMethodCallRectorTest
 * @see \Rector\Tests\Defluent\Rector\Return_\ReturnNewFluentChainMethodCallToNonFluentRector\ReturnNewFluentChainMethodCallToNonFluentRectorTest
 */
final class ReturnNewFluentChainMethodCallToNonFluentRector extends AbstractRector
{
    /**
     * @var FluentNodeRemover
     */
    private $fluentNodeRemover;

    /**
     * @var AssignAndRootExprAndNodesToAddMatcher
     */
    private $assignAndRootExprAndNodesToAddMatcher;

    /**
     * @var FluentMethodCallSkipper
     */
    private $fluentMethodCallSkipper;

    public function __construct(
        FluentNodeRemover $fluentNodeRemover,
        AssignAndRootExprAndNodesToAddMatcher $assignAndRootExprAndNodesToAddMatcher,
        FluentMethodCallSkipper $fluentMethodCallSkipper
    ) {
        $this->fluentNodeRemover = $fluentNodeRemover;
        $this->assignAndRootExprAndNodesToAddMatcher = $assignAndRootExprAndNodesToAddMatcher;
        $this->fluentMethodCallSkipper = $fluentMethodCallSkipper;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Turns fluent interface calls to classic ones.',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
return (new SomeClass())->someFunction()
            ->otherFunction();
CODE_SAMPLE
                    ,
                    <<<'CODE_SAMPLE'
$someClass = new SomeClass();
$someClass->someFunction();
$someClass->otherFunction();
return $someClass;
CODE_SAMPLE
            ),
            ]);
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [Return_::class];
    }

    /**
     * @param Return_ $node
     */
    public function refactor(Node $node): ?Node
    {
        $methodCall = $this->matchReturnMethodCall($node);
        if (! $methodCall instanceof MethodCall) {
            return null;
        }

        if ($this->fluentMethodCallSkipper->shouldSkipRootMethodCall($methodCall)) {
            return null;
        }

        $assignAndRootExprAndNodesToAdd = $this->assignAndRootExprAndNodesToAddMatcher->match(
            $methodCall,
            FluentCallsKind::NORMAL
        );

        if (! $assignAndRootExprAndNodesToAdd instanceof AssignAndRootExprAndNodesToAdd) {
            return null;
        }

        $this->fluentNodeRemover->removeCurrentNode($node);
        $this->addNodesAfterNode($assignAndRootExprAndNodesToAdd->getNodesToAdd(), $node);

        return null;
    }

    private function matchReturnMethodCall(Return_ $return): ?Expr
    {
        if ($return->expr === null) {
            return null;
        }

        if (! $return->expr instanceof MethodCall) {
            return null;
        }

        return $return->expr;
    }
}
