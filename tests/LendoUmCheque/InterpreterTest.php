<?php
namespace LendoUmCheque;

class InterpreterTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreateAnInstanceOfInterpreter()
    {
        $tokenizer   = new Tokenizer('Dois');
        $interpreter = new Interpreter($tokenizer);

        $this->assertInstanceOf('LendoUmCheque\Interpreter', $interpreter);
    }
}
