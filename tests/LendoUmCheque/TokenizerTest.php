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
        $this->assertEquals('Expressão', $tokens[1]);
   
    }
}
