<?php


class Jaime extends Lannister
{
    public function sleepWith($obj){
        if ($obj instanceof Sansa)
            print ("Let's do this.".PHP_EOL);
        else if ($obj instanceof Cersei)
            print ("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
        else
            print ("Not even if I'm drunk !".PHP_EOL);
    }
}