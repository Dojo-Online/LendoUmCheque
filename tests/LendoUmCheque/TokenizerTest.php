<?php
namespace LendoUmCheque;

class TokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatingAnInstanceOfTokenizerWithAnExpressionWillStoreThatExpression()
    {
        $tokenizer = new Tokenizer('Uma expressão');

        $this->assertEquals('Uma expressão', $tokenizer->expression);
    }

    public function testAfterCreatingAnInstanceOfTokenizerWeCanGetAnArrayOfTokens()
    {
        $tokenizer = new Tokenizer('Uma expressão');

        $tokens = $tokenizer->getTokens();

        $this->assertCount(2, $tokens);
        $this->assertEquals('Uma', $tokens[0]);
        $this->assertEquals('expressão', $tokens[1]);

    }

    public function testCallingCurrentWillReturnTheCurrentToken()
    {
        $tokenizer = new Tokenizer('Uma outra expressão');

        $current = $tokenizer->current();

        $this->assertEquals('Uma', $current);
    }

    public function testCallingNextWillMoveToTheNextToken()
    {
        $tokenizer = new Tokenizer('Uma outra expressão');
        $current   = $tokenizer->current();

        $this->assertEquals('Uma', $current);

        $tokenizer->next();
        $current = $tokenizer->current();
        $this->assertEquals('outra', $current);
    }

    public function testCallingPreviousWillMoveToThePrevious()
    {
        $tokenizer = new Tokenizer('Uma outra expressão');
        $current   = $tokenizer->current();

        $this->assertEquals('Uma', $current);

        $tokenizer->next();
        $current = $tokenizer->current();
        $this->assertEquals('outra', $current);

        $tokenizer->previous();
        $current = $tokenizer->current();
        $this->assertEquals('Uma', $current);
    }
}
