<?php

declare(strict_types=1);

namespace Rector\Defluent\Rector\MethodCall;

use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\Rector\AbstractRector;
use Rector\Defluent\Matcher\AssignAndRootExprAndNodesToAddMatcher;
use Rector\Defluent\Skipper\FluentMethodCallSkipper;
use Rector\Defluent\ValueObject\AssignAndRootExprAndNodesToAdd;
use Rector\Defluent\ValueObject\FluentCallsKind;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Symfony\NodeAnalyzer\FluentNodeRemover;
use Symplify\PackageBuilder\Php\TypeChecker;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see https://ocramius.github.io/blog/fluent-interfaces-are-evil/
 * @see https://www.yegor256.com/2018/03/13/fluent-interfaces.html
 *
 * @see \Rector\Tests\Defluent\Rector\MethodCall\FluentChainMethodCallToNormalMethodCallRector\FluentChainMethodCallToNormalMethodCallRectorTest
 * @see \Rector\Tests\Defluent\Rector\MethodCall\NewFluentChainMethodCallToNonFluentRector\NewFluentChainMethodCallToNonFluentRectorTest
 */
final class NewFluentChainMethodCallToNonFluentRector extends AbstractRector
{
    /**
     * @var TypeChecker
     */
    private $typeChecker;

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
        TypeChecker $typeChecker,
        FluentNodeRemover $fluentNodeRemover,
        AssignAndRootExprAndNodesToAddMatcher $assignAndRootExprAndNodesToAddMatcher,
        FluentMethodCallSkipper $fluentMethodCallSkipper
    ) {
        $this->typeChecker = $typeChecker;
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
(new SomeClass())->someFunction()
            ->otherFunction();
CODE_SAMPLE
                    ,
                    <<<'CODE_SAMPLE'
$someClass = new SomeClass();
$someClass->someFunction();
$someClass->otherFunction();
CODE_SAMPLE
            ),
            ]);
    }

    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        // handled by another rule
        $parent = $node->getAttribute(AttributeKey::PARENT_NODE);
        if ($this->typeChecker->isInstanceOf($parent, [Return_::class, Arg::class])) {
            return null;
        }

        if ($this->fluentMethodCallSkipper->shouldSkipRootMethodCall($node)) {
            return null;
        }

        $assignAndRootExprAndNodesToAdd = $this->assignAndRootExprAndNodesToAddMatcher->match(
            $node,
            FluentCallsKind::NORMAL
        );
        if (! $assignAndRootExprAndNodesToAdd instanceof AssignAndRootExprAndNodesToAdd) {
            return null;
        }

        $this->fluentNodeRemover->removeCurrentNode($node);
        $this->addNodesAfterNode($assignAndRootExprAndNodesToAdd->getNodesToAdd(), $node);

        return null;
    }
}
