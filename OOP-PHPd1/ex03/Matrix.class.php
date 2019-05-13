<?php

class Matrix
{
    const IDENTITY      = "IDENTITY";
    const TRANSLATION   = "TRANSLATION preset";
    const SCALE         = "SCALE preset";
    const RX            = "Ox ROTATION preset";
    const RY            = "Oy ROTATION preset";
    const RZ            = "Oz ROTATION preset";
    const PROJECTION    = "PROJECTION preset";
    private $_scale;
    private $_identity;
    private $_vtc;
    private $_angle;
    private $_projection;
    public $_matrix;
    private $_preset;
    public static $verbose = false;
    function __construct($matrix)
    {
        $this->_preset = $matrix["preset"];
        $this->_matrix =    array(  array(1, 0, 0, 0),
            array(0, 1, 0, 0),
            array(0, 0, 1, 0),
            array(0, 0, 0, 1));

            if ($this->_preset == Matrix::TRANSLATION) {
                $this->_vtc = $matrix["vtc"];
                $this->_matrix[0][3] = $this->_vtc->getX();
                $this->_matrix[1][3] = $this->_vtc->getY();
                $this->_matrix[2][3] = $this->_vtc->getZ();
            }
            else if ( $this->_preset == Matrix::SCALE) {
                $this->_scale = $matrix["scale"];
                $this->_matrix[0][0] *= $this->_scale;
                $this->_matrix[1][1] *= $this->_scale;
                $this->_matrix[2][2] *= $this->_scale;
            }
            else if ($this->_preset == Matrix::RX) {
                $this->_angle = $matrix["angle"];
                $this->_matrix[1][1] = cos($this->_angle);
                $this->_matrix[1][2] = -sin($this->_angle);
                $this->_matrix[2][1] = sin($this->_angle);
                $this->_matrix[2][2] = cos($this->_angle);
            }
            else if ($this->_preset == Matrix::RY) {
                $this->_angle = $matrix["angle"];
                $this->_matrix[0][0] = cos($this->_angle);
                $this->_matrix[0][2] = sin($this->_angle);
                $this->_matrix[2][0] = -sin($this->_angle);
                $this->_matrix[2][2] = cos($this->_angle);
            }
            else if ($this->_preset == Matrix::RZ) {
                $this->_angle = $matrix["angle"];
                $this->_matrix[0][0] = cos($this->_angle);
                $this->_matrix[0][1] = -sin($this->_angle);
                $this->_matrix[1][0] = sin($this->_angle);
                $this->_matrix[1][1] = cos($this->_angle);
            }
            else if ($this->_preset == Matrix::PROJECTION) {
                $this->_fov = deg2rad($matrix["fov"]);
                $this->_ratio = $matrix["ratio"];
                $this->_near = $matrix["near"];
                $this->_far = $matrix["far"];
                $this->_matrix[0][0] = 1 / ($this->_ratio * tan($this->_fov / 2));
                $this->_matrix[1][1] = 1 / (tan($this->_fov / 2));
                $this->_matrix[2][2] = ($this->_near + $this->_far) / ($this->_near - $this->_far);
                $this->_matrix[3][2] = -1;
                $this->_matrix[2][3] = 2 * ($this->_near * $this->_far) / ($this->_near - $this->_far);
                $this->_matrix[3][3] = 0;
    }
        if  (Matrix::$verbose)
            echo ("Matrix ".$this->getPreset()." instance constructed".PHP_EOL);
    }
    function    __destruct()
    {
        if  (Matrix::$verbose)
            echo "Matrix instance destructed".PHP_EOL;
    }
    function    getPreset()
    {
        return($this->_preset);
    }
    public static function doc()
    {
        echo file_get_contents("Matrix.doc.txt").PHP_EOL;
    }
    public function mult(Matrix $rhs)
    {
        $ret = clone($rhs);
        $ret->_matrix = array(  array(0, 0, 0, 0),
            array(0, 0, 0, 0),
            array(0, 0, 0, 0),
            array(0, 0, 0, 0));
        for($i = 0; $i < 4; $i++)
        {
            for($j = 0; $j < 4; $j++)
            {
                for($k = 0;$k < 4;$k++)
                {
                    $ret->_matrix[$i][$j] += $this->_matrix[$i][$k] * $rhs->_matrix[$k][$j];

                }
            }
        }
        return($ret);
    }
    public function transformVertex(Vertex $vert)
    {
        $x =  $vert->getX()*$this->_matrix[0][0] + $vert->getY()*$this->_matrix[0][1] + $vert->getZ()*$this->_matrix[0][2]+ $vert->getW()*$this->_matrix[0][3];
        $y =  $vert->getX()*$this->_matrix[1][0] + $vert->getY()*$this->_matrix[1][1] + $vert->getZ()*$this->_matrix[1][2]+ $vert->getW()*$this->_matrix[1][3];
        $z =  $vert->getX()*$this->_matrix[2][0] + $vert->getY()*$this->_matrix[2][1] + $vert->getZ()*$this->_matrix[2][2]+ $vert->getW()*$this->_matrix[2][3];
        $w =  $vert->getX()*$this->_matrix[3][0] + $vert->getY()*$this->_matrix[3][1] + $vert->getZ()*$this->_matrix[3][2]+ $vert->getW()*$this->_matrix[3][3];

        return(new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z, 'w'=>$w)));
    }
    public function __toString()
    {
        return(vsprintf( "M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %.2f | %.2f | %.2f | %.2f\ny | %.2f | %.2f | %.2f | %.2f\nz | %.2f | %.2f | %.2f | %.2f\nw | %.2f | %.2f | %.2f | %.2f",
            array($this->_matrix[0][0],$this->_matrix[0][1],$this->_matrix[0][2],$this->_matrix[0][3],
            $this->_matrix[1][0],$this->_matrix[1][1],$this->_matrix[1][2],$this->_matrix[1][3],
            $this->_matrix[2][0],$this->_matrix[2][1],$this->_matrix[2][2],$this->_matrix[2][3],
            $this->_matrix[3][0],$this->_matrix[3][1],$this->_matrix[3][2],$this->_matrix[3][3]
        )));
    }
}
?>