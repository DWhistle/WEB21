<?php


class Fighter
{
    private $name;
    public function __construct($n)
    {
        $this->name = $n;
    }
    public function getName()
    {
        return $this->name;
    }
}