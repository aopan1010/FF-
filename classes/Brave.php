<?php

class Brave extends Human
{
    const MAX_HITPOINT = 120;
    public $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;

    public function __construct($name)
    {
        parent::__construct($name,$this->hitPoint,$this->attackPoint);
    }

    public function doAttack($enemy)
    {   //rand(x,y)===1 =XからYの間で１の確率で乱数を起こす
        if (rand(1,3) === 1){
         echo "『". $this->getName() ."』のスキルが発動した！\n";
         echo "『凶斬り』!! \n";
         echo $enemy->getName() . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
        $enemy->tookDamage($this->attackPoint * 1.5);
        
    } elseif(rand(1,10) === 1) {
        echo "『".$this->getName()."』のスキルが発動した！\n";
        echo "『超級武神覇斬』!! \n";
        echo $enemy->getName() . "に" . $this->attackPoint * 2 . "のダメージ!\n";
       $enemy->tookDamage($this->attackPoint * 2);
    }else{
        parent::doAttack($enemy);
    }
    return true;
    }
}