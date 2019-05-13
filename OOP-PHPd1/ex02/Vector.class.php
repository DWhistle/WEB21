<?php

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0;
    public static $verbose = false;
    public static function doc(){
        $file = fopen("Vector.doc.txt", "r");
        echo "\n";
        while ($str = fgets($file))
        {
            echo $str;
        }
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
    }
    function __destruct()
    {
        if (Vector::$verbose)
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }
    public function __construct($array)
    {
        if (!array_key_exists('orig', $array) && $array['dest'] instanceof Vertex)
        {
            $array['orig'] = new Vertex(array('x' => '0', 'y' => '0', 'z' => '0'));
        }
        if (array_key_exists('dest', $array)) {
            $this->_x = $array['dest']->getX() - $array['orig']->getX();
            $this->_y = $array['dest']->getY() - $array['orig']->getY();
            $this->_z = $array['dest']->getZ() - $array['orig']->getZ();
            $this->_w = 0.0;
        }
        if (Vector::$verbose)
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }
    public function magnitude(){
        return(sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2));
    }
    public function normalize(){
        $len = $this->magnitude();
        if ($len == 1)
            return clone $this;
        return new Vector(array('dest' => new Vertex(array('x' => ($this->_x / $len), 'y' => ($this->_y / $len), 'z' => ($this->_z / $len)))));
    }
    function add(Vector $rhs){
        return new Vector(array('dest' => new Vertex((array('x' => ($this->_x + $rhs->getX()), 'y' => ($this->_y + $rhs->getY()),
            'z' => ($this->_z + $rhs->getZ()))))));
    }
    function sub(Vector $rhs){
        return new Vector(array('dest' => new Vertex((array('x' => ($this->_x - $rhs->getX()), 'y' => ($this->_y - $rhs->getY()),
           'z' => ($this->_z - $rhs->getZ()))))));
    }
    function opposite(){
        return new Vector(array('dest' => new Vertex((array('x' => ($this->_x * -1), 'y' => ($this->_y * -1),
            'z' => ($this->_z * -1))))));
    }
    function dotProduct(Vector $rhs){
        return floatval($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
    }
    function cos(Vector $rhs){
        return floatval($this->dotProduct($rhs) / $this->magnitude() / $rhs->magnitude());
    }
    function crossProduct(Vector $rhs){
        $xcross = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
        $ycross = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
        $zcross = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
        return new Vector(array('dest' => new Vertex(array('x' => $xcross, 'y' => $ycross, 'z' => $zcross))));
    }
    public function scalarProduct($k)
    {
        return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
    }
    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->_z;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->_y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->_x;
    }

}
