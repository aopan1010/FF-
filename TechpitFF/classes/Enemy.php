<?php

class Enemy
{
    const MAX_HITPOINT = 50; // 最大HPの定義 定数
    private $name; // 敵の名前
    private $hitPoint = 50; // 現在のHP
    private $attackPoint = 10; // 攻撃力


    public function __construct($name,$attackPoint)
    {
        $this->name = $name;
        $this->attackPoint = $attackPoint;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }

    public function doAttack($humans)
    {
        if ($this->hitPoint <= 0) {
            return false;
        }
        $humanIndex = rand(0, count($humans) - 1); // 添字は0から始まるので、-1する
        $human = $humans[$humanIndex];

        echo "『".$this->getName()."』の攻撃！"."\n\r";
        echo "『".$human->getName()."』に" . $this->attackPoint . "のダメージ！"."\n\r";
        $human->tookDamage($this->attackPoint);
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        //HPが0にならない処理
        if ($this->hitPoint < 0){
            $this->hitPoint = 0;
        }
    }
}