<?php


class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_Color;
    public static $verbose;
    /**
     * Vertex constructor.
     */
    public function __construct($array)
    {
        $this->_x = $array['x'];
        $this->_y = $array['y'];
        $this->_z = $array['z'];
        if (array_key_exists('w', $array))
            $this->_w = $array['w'];
        else
            $this->_w = 1.0;
        if (array_key_exists('color', $array) && $array['color'] instanceof Color)
            $this->_Color = $array['color'];
        else
            $this->_Color = new Color(array('red' => '255','green' => '255','blue' => '255'));
        if (Vertex::$verbose == true) {
            printf( "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n",
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_Color->red, $this->_Color->green,$this->_Color->blue);
        }
    }
    public function __toString()
    {
        if (Self::$verbose)
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )",
                array($this->_x, $this->_y, $this->_z, $this->_w, $this->_Color->red, $this->_Color->green, $this->_Color->blue)));
        return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        if (Vertex::$verbose == true) {
            printf( "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n",
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_Color->red, $this->_Color->green,$this->_Color->blue);
        }
    }
    public static function doc(){
        $file = fopen("Vertex.doc.txt", "r");
        echo "\n";
        while ($str = fgets($file))
        {
            echo $str;
        }
    }

    /**
     * @param Color $Color
     */
    public function setColor($Color)
    {
        $this->_Color = $Color;
    }

    /**
     * @param float $w
     */
    public function setW($w)
    {
        $this->_w = $w;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->_x = $x;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->_y = $y;
    }

    /**
     * @param mixed $z
     */
    public function setZ($z)
    {
        $this->_z = $z;
    }

    /**
     * @return float
     */
    public function getW()
    {
        return $this->_w;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->_x;
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
    public function getZ()
    {
        return $this->_z;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->_Color;
    }
}