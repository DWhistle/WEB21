<?php


class NightsWatch
{
    public function fight(){}
    public function recruit($obj)
    {
        if (!$obj instanceof MaesterAemon)
        $obj->fight();
    }
}