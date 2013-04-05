<?php

namespace LendoUmCheque;

class Interpreter {
    
    private $tokenizer;
    private $matriz = array();

    public function __construct($tokenizer) {
        $this->tokenizer = $tokenizer;
    }

    public function returnNumberMilhar(){

    	return $this->tokenizer->current();
    }

}