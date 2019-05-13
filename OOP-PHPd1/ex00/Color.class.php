<?php


class Color
{
    public static $verbose;
    public $red;
    public $green;
    public $blue;
    /**
     * Color constructor.
     */
    public function __construct($colors)
    {
        if (array_key_exists('rgb', $colors)) {
            $color = intval($colors['rgb']);
            $this->red = $color >> 16;
            $this->green = $color >> 8&255;
            $this->blue = $color&255;
        }
        else if (array_key_exists('red', $colors) && array_key_exists('green', $colors) && array_key_exists('blue', $colors))
        {
            $this->red = intval($colors['red']);
            $this->green = intval($colors['green']);
            $this->blue = intval($colors['blue']);
        }
        if (Color::$verbose == true){
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green,$this->blue);
    }

    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        if (Color::$verbose == true) {
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
        }
    }

    public static function doc(){
        $file = fopen("Color.doc.txt", "r");
        echo "\n";
        while ($str = fgets($file))
        {
            echo $str;
        }
    }
    public function __toString()
    {
            // TODO: Implement __toString() method.
        return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green,$this->blue)));

    }
    public function add($Color)
    {
        return new Color(array('red' => $Color->red + $this->red, 'green' => $Color->green + $this->green, 'blue' => $Color->blue + $this->blue));
    }
    public function sub($Color)
    {
        return new Color(array('red' => -$Color->red + $this->red, 'green' => -$Color->green + $this->green, 'blue' => -$Color->blue + $this->blue));
    }
    public function mult($flt)
    {
        return new Color(array('red' => $flt * $this->red, 'green' => $flt * $this->green, 'blue' => $flt * $this->blue));
    }
}
