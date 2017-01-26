<?php

namespace Game;

require 'src/helpers.php';

spl_autoload_register(function ($className){
    if (strpos($className , 'Game\\') === 0){
        $className  = str_replace('Game\\' , '' , $className);
        if (file_exists("src/$className.php")){
            require "src/$className.php";
        }
    }
});

$armor = new BronzeArmor();

$ramm = new Soldier('Ramm');

$silence = new Archer('Silence');

$silence->attack($ramm);

$ramm->setArmor(new CursedArmor());

$silence->attack($ramm);

$ramm->attack($silence);