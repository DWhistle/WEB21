<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/class/IDrawable.class.php');

class Player implements IDrawable
{
    private $ships = array();
    private $state = false;
    private $active_ship = null;
    private $name = "";
    private $icon = "";

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->name = $array['name'];
            $this->ships = $array['ships'];
            $this->icon = $array['icon'];
            if (array_key_exists('state', $array))
                $this->state = $array['state'];
        }
        else
        {
            if ($array instanceof Player) {
                $player = $array;
                $this->ships = $player->getShips();
                $this->state = $player->getState();
                $this->active_ship = $player->getActive_ship();
                $this->name = $player->getName();
                $this->icon = $player->getIcon();
            }
        }
    }

    public function addShip($ship)
    {
        if ($ship instanceof Ship)
            $this->ships[] = $ship;
    }

    public function getHtml()
    {
        $html = <<<EOF
    <div class="player">
    <div>
        <img src="{$this->getIcon()}">
    </div>
    <div>
        <p>$this->name</p>
        <p>$this->active_ship</p>
    </div>
    </div>
EOF;
        if (!empty($this->ships)) {
            foreach ($this->ships as $ship) {
                $html .= $ship->getJs();
            }
        }
        return $html;

    }
    public function draw()
    {
        echo "{$this->getHtml()}";
    }

    /**
     * @return array|mixed
     */
    public function getShips()
    {
        return $this->ships;
    }

    public function getState(){
        return $this->state;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $active_ship
     */
    public function setActiveShip($active_ship)
    {
        if ($active_ship instanceof Ship)
            $active_ship->setState('move');
        $this->active_ship = $active_ship;
    }

    /**
     * @return null
     */
    public function getActiveShip()
    {
        return $this->active_ship;
    }

    public function getCss()
    {
        // TODO: Implement getCss() method.
    }

    public function getJs()
    {
        // TODO: Implement getJs() method.
    }


    public function move($move_points, $attack_points, $repair_point)
    {
        if ($move_points + $attack_points + $repair_point == $this->active_ship->getPP()) {
            // TODO: написать вклячение систем
            return (0);
        }
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param array $ships
     */
    public function setShips($ships)
    {
        $this->ships = $ships;
    }

    /**
     * @param bool $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}


