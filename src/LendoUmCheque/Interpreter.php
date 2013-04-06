<?php
namespace LendoUmCheque;

class Interpreter
{

    /**
     * @var Tokenizer
     */
    private $tokenizer;
    private $cardinal = array(
        'zero' => 0,
        'um' => 1,
        'dois' => 2,
        '(três|tres)' => 3,
        'quatro' => 4,
        'cinco' => 5,
        'seis' => 6,
        'sete' => 7,
        'oito' => 8,
        'nove' => 9,
    );
    private $dozens = array(
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
        'quarenta' => 40,
        'cinquenta' => 50,
        'sessenta' => 60,
        'setenta' => 70,
        'oitenta' => 80,
        'noventa' => 90,
    );
    private $hundreds = array(
        '(cem|cento)' => 100,
        'duzentos' => 200,
        'trezentos' => 300,
        'quatrocentos' => 400,
        'quinhentos' => 500,
        'seiscentos' => 600,
        'setecentos' => 700,
        'oitocentos' => 800,
        'novecentos' => 900,
    );
    private $thounsands = array(
        'mil' => 1000,
        'milh(ão|ões)' => 1000000,
        'bilh(ão|ões)' => 1000000000,
        'trilh(ão|ões)' => 1000000000000,
        'quatrilh(ão|ões)' => 1000000000000000,
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
            if (count($thousand = $this->findValueFromToken($token, $this->thounsands)) > 0) {
                $number *= (int)current($thousand);
            } else if (count($hundred = $this->findValueFromToken($token, $this->hundreds)) > 0) {
                $number += (int)current($hundred);
            } else if (count($dozen = $this->findValueFromToken($token, $this->dozens)) > 0) {
                $number += (int)current($dozen);
            } else if (count($cardinal = $this->findValueFromToken($token, $this->cardinal)) > 0) {
                $number += (int)current($cardinal);
            }
        }
        return $number;
    }

    /**
     * @param $token
     * @param array $data
     * @return array
     */
    protected function findValueFromToken($token, array $data)
    {
        return array_flip(array_filter(array_flip($data), function ($key) use ($token) {
            return preg_match('/^' . $key . '/i', $token);
        }));
    }
}
