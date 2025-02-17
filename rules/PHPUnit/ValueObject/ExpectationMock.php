<?php
declare(strict_types=1);

namespace Rector\PHPUnit\ValueObject;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Stmt\Expression;

final class ExpectationMock
{
    /**
     * @var Variable
     */
    private $expectationVariable;

    /**
     * @var Arg[]
     */
    private $methodArguments = [];

    /**
     * @var int
     */
    private $index;

    /**
     * @var ?Expr
     */
    private $expr;

    /**
     * @var array<int, null|Expr>
     */
    private $withArguments = [];

    /**
     * @var Expression|null
     */
    private $originalExpression;

    /**
     * @param Arg[] $methodArguments
     * @param array<int, null|Expr> $withArguments
     */
    public function __construct(
        Variable $expectationVariable,
        array $methodArguments,
        int $index,
        ?Expr $expr,
        array $withArguments,
        ?Expression $originalExpression
    ) {
        $this->expectationVariable = $expectationVariable;
        $this->methodArguments = $methodArguments;
        $this->index = $index;
        $this->expr = $expr;
        $this->withArguments = $withArguments;
        $this->originalExpression = $originalExpression;
    }

    public function getExpectationVariable(): Variable
    {
        return $this->expectationVariable;
    }

    /**
     * @return Arg[]
     */
    public function getMethodArguments(): array
    {
        return $this->methodArguments;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getReturn(): ?Expr
    {
        return $this->expr;
    }

    /**
     * @return array<int, null|Expr>
     */
    public function getWithArguments(): array
    {
        return $this->withArguments;
    }

    public function getOriginalExpression(): ?Expression
    {
        return $this->originalExpression;
    }
}
