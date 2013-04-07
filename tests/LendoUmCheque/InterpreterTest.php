<?php
namespace LendoUmCheque;

class InterpreterTest extends \PHPUnit_Framework_TestCase
{


    public function testCanCreateAnInstanceOfInterpreter()
    {
        $tokenizer = new Tokenizer('dois mil quinhentos e vinte e três reais e dezoito centavos');
        $interpreter = new Interpreter($tokenizer);

        $this->assertInstanceOf('LendoUmCheque\Interpreter', $interpreter);
    }

    public function testReturnOfMatrizNumberMilhar()
    {
        $tokenizer = new Tokenizer('dois');
        $interpreter = new Interpreter();

        $this->assertEquals(2, $interpreter->interpret($tokenizer));
    }

    public function testInterpretElevenToNumber()
    {
        $tokenizer = new Tokenizer('onze');
        $interpreter = new Interpreter();

        $this->assertEquals(11, $interpreter->interpret($tokenizer));
    }

    public function testInterpretTwentyOneToNumber()
    {
        $tokenizer = new Tokenizer('vinte e um');
        $interpreter = new Interpreter();

        $this->assertEquals(21, $interpreter->interpret($tokenizer));
    }

    public function testInterpretFiveHundredSixtyOneToNumber()
    {
        $tokenizer = new Tokenizer('quinhentos e sessenta e um');
        $interpreter = new Interpreter();

        $this->assertEquals(561, $interpreter->interpret($tokenizer));
    }

    public function testInterpretTwentyFiveThousandsToNumber()
    {
        $tokenizer = new Tokenizer('vinte e cinco mil');
        $interpreter = new Interpreter();

        $this->assertEquals(25000, $interpreter->interpret($tokenizer));
    }

    public function testInterpretOneThousandFourHundredThirtyThreeToNumber()
    {
        $tokenizer = new Tokenizer('um mil e quatrocentos e trinta e três');
        $interpreter = new Interpreter();

        $this->assertEquals(1433, $interpreter->interpret($tokenizer));
    }

    public function testInterpretTwoMillionOneThousandFourHundredThirtyThreeToNumber()
    {
        $tokenizer = new Tokenizer('dois milhões e quinhentos e um mil e quatrocentos e trinta e três');
        $interpreter = new Interpreter();

        $this->assertEquals(2501433, $interpreter->interpret($tokenizer));
    }
    
    public function testInterpretTwoThousandFiveHundredTwentyThreeEighteenCentsToNumber()
    {
        $interpreter= new Interpreter();
        $tokenizer = new Tokenizer('dois mil quinhentos e vinte e três reais e dezoito centavos');
        $this->assertEquals(2523.18, $interpreter->interpret($tokenizer));
    }

}
