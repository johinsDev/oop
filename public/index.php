<?php

namespace Game;

use Game\Armors\BronzeArmor;
use Game\Armors\CursedArmor;

require '../vendor/autoload.php';

$armor = new BronzeArmor();

$ramm = new Soldier('Ramm');

$silence = new Archer('Silence');

$silence->attack($ramm);

$ramm->setArmor(new CursedArmor());

$silence->attack($ramm);

$ramm->attack($silence);