<?php
namespace LendoUmCheque;

class Interpreter 
{
    
    private $tokenizer;

    private $matriz = array(
        'zero'   => 0,
        'um'     => 1,
        'dois'   => 2,
        'três'   => 3,
        'quatro' => 4,
        'cinco'  => 5
    );

    public function __construct($tokenizer) 
    {

        $this->tokenizer = $tokenizer;
    }

    public function interpret()
    {

    	return $this->matriz[$this->tokenizer->current()];
    }

}
