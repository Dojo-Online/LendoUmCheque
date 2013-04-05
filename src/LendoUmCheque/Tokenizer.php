<?php
namespace LendoUmCheque;

class Tokenizer
{
    public $expression;
    private $tokens = array();

    public function __construct($expression)
    {
        $this->expression = $expression;
        $this->tokens = explode(' ', $this->expression);
    }

    public function getTokens()
    {
        return $this->tokens;
    }

    public function current()
    {
        return current($this->tokens);
    }

    public function next()
    {
        return next($this->tokens);
    }

    public function previous()
    {
        return prev($this->tokens);
    }
}
