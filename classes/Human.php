<?php

class Human
{
// "const" = 定数の定義【最大HPの定義】
const MAX_HITPOINT = 100;
private $name;//人間の名前
private $hitPoint = 100;//現在のHP
private $attackPoint = 20;//攻撃力

//ゲッター/セッター処理
public function __construct($name,$hitPoint = 100,$attackPoint = 20)
{
    $this->name = $name;
    $this->hitPoint = $hitPoint;
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

//攻撃メソッド

public function doAttack($enemy)
{
    echo "『". $this->getName() ."』の攻撃！" ."\n\r";
    echo "『" . $enemy->getName() . "』に " . $this->attackPoint . " のダメージ！" ."\n\r";
    $enemy->tookDamage($this->attackPoint);
}
//被ダメメソッド
public function tookDamage($damage)
{
    $this->hitPoint -= $damage;
    //HPが０未満にならないような処理
    if ($this->hitPoint < 0){
        $this->hitPoint = 0;
    }
}
}