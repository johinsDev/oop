<?php

abstract class Unit{

    protected $hp = 40;
    protected $name;

    public function __construct($name)
    {
        $this->name =$name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    private function setHp($points)
    {
        $this->hp = $points;
        $this->show("{$this->name} ahora tiene {$this->getHp()} puntos de vida");
    }

    public function show($message)
    {
        echo "<p>{$message}</p>";
    }

    public function died()
    {
        $this->show("{$this->name} muere");
    }

    public function takeDamage($damage)
    {
        //$this->hp = $this->hp - $damage;
        $this->setHp($this->hp - $damage);
        if ($this->hp <=0 ){
            $this->died();
        }
    }

    abstract public function attack(Unit $opponent);

    abstract public function move($direction);
}


class Soldier extends  Unit{

    protected $damage = 40;

    public function move($direction)
    {
       $this->show("{$this->name} corre a hacia el  $direction");
    }

    public function attack(Unit  $opponent)
    {
        $this->show("{$this->name} corta a {$opponent->getName()} en dos");
        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        parent::takeDamage($damage / 2);
    }
}

class Archer extends  Unit{

    protected $damage = 20;

    public function move($direction)
    {
        echo "<p>{$this->name} camina a hacia el  $direction</p>";
    }

    public function attack(Unit $opponent)
    {
        echo "<p>{$this->name} diapara a {$opponent->getName()} con una flecha</p>";

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0 ,1))
            parent::takeDamage($damage);
    }
}

$soldier  = new Soldier('Johan');
$ramm = new Archer('ramm');
$soldier->move('Norte');
$ramm->attack($soldier);
$soldier->attack($ramm);
