<?php
namespace LendoUmCheque;

class InterpreterTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateAnInstanceOfInterpreter()
    {
        $tokenizer   = new Tokenizer('dois mil quinhentos e vinte e três reais e dezoito centavos');
        $interpreter = new Interpreter($tokenizer);

        $this->assertInstanceOf('LendoUmCheque\Interpreter', $interpreter);
    }
    
}
