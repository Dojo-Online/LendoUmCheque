<?php
namespace LendoUmCheque;

class Interpreter
{

    /**
     * @var Tokenizer
     */
    private $tokenizer;

    private $matriz = array(
        'zero' => 0,
        'um' => 1,
        'dois' => 2,
        'três' => 3,
        'quatro' => 4,
        'cinco' => 5,
        'onze' => 11,
        'vinte' => 20,
    );

    public function __construct($tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function interpret()
    {
        $number = 0;

        while ($token = $this->tokenizer->current()) {
            $this->tokenizer->next();
            if ($token == 'e') {
                continue;
            }
            $number += $this->matriz[$token];
        }
        return $number;
    }

}
