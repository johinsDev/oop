<?php

class Person {
    //protected los geters y setters vuelven un variable casi q publica peros si la propiedad es proteted o private y no le hago getter no va a poder cambiable

    protected $firstName; // public, protected <-> private
    protected $lastName;
    protected $nickname;
    protected $changedNickname = 0;
    //protected $num_characters = 2;
    protected $birth_date = '';

    public function __construct($firstName, $lastName, $birth_date)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birth_date = $birth_date;
    }

    public function getAge()
    {
        list($Y,$m,$d) = explode("-",$this->birth_date);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    private function numCharacters()
    {
        return property_exists($this , 'num_characters') ? $this->num_characters : 2;
    }

    private function hasMoreThatTwoCharacters($value)
    {
        return strlen($value) >= $this->numCharacters();
    }

    public function setNickname($nickname)
    {
        if (! $this->hasMoreThatTwoCharacters($nickname)){
            throw new Exception(
                "You can't change a nickname more than 2 characters"
            );
        };

        if ($this->changedNickname >= 2) {
            throw new Exception(
                "You can't change a nickname more than 2 times"
            );
        }

        $this->nickname = $nickname;

        $this->changedNickname++;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
$person1 = new Person('Duilio', 'Palacios' , date('1974-05-02'));
$person1->setNickname('Silence');
$person1->setNickname('Sileence');
echo $person1->getAge();
//exit($person1->getNickname());
//echo $person1->age();

/**
 * Clase Telefono
 */
/*
class Phone
{
    var $model;
    var $color;
    var $company;

    function __construct($model, $color, $company)
    {
        $this->model   = $model;
        $this->color   = $color;
        $this->company = $company;
    }

    function call()
    {
        return 'Estoy llamando a otro móvil';
    }

    function sms()
    {
        return "Estoy enviando un mensaje de texto";
    }
}

$nokia = new Phone('Nokia', 'Blanco', 'Movistar');

echo "{$nokia->sms()}";
*/