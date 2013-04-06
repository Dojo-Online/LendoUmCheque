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
        'seis' => 6,
        'sete' => 7,
        'oito' => 8,
        'nove' => 9,
        'dez' => 10,
        'onze' => 11,
        'doze' => 12,
        'treze' => 13,
        'quatorze' => 14,
        'quinze' => 15,
        'dezesseis' => 16,
        'dezessete' => 17,
        'dezoito' => 18,
        'dezenove' => 19,
        'vinte' => 20,
        'trinta' => 30,
        'sessenta' => 60,
        'quatrocentos' => 400,
        'quinhentos' => 500,
    );
    private $thounsands = array(
        'mil' => 1000,
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
            if (array_key_exists($token,$this->thounsands)) {
                $number *= (int)$this->thounsands[$token];
            } else {
                $number += (int)$this->matriz[$token];
            }
        }
        return $number;
    }

}
