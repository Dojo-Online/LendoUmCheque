<?php

namespace LendoUmCheque;

class Interpreter {
    
    private $tokenizer;
    
    public function __construct($tokenizer) {
        $this->tokenizer = $tokenizer;
    }
}