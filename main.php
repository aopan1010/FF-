<?php
//クラスを作ったときなどは忘れずにrequire_once
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

$cloud = new Brave("クラウド");
$sephiroth = new Enemy("セフィロス");


$turn = 1;

while ($cloud->getHitPoint() > 0 && $sephiroth->getHitPoint() > 0) {
    //現在のターン
    echo "--- $turn ターン目 ---" . "\n\r";
    //現在のお互いのHP
    echo $cloud->getName() . ":" . $cloud->getHitPoint(). "/" . $cloud::MAX_HITPOINT."\n\r";
    echo $sephiroth->getName() . ":" . $sephiroth->getHitPoint(). "/" . $sephiroth::MAX_HITPOINT."\n\n";

    //攻撃
    $cloud->doAttack($sephiroth);
    echo "\n";
    $sephiroth->doAttack($cloud);
    echo "\n";

    $turn ++;
}

echo "★★★戦闘終了★★★\n\r";
echo $cloud->getName() . ":". $cloud->getHitPoint()."/". $cloud::MAX_HITPOINT."\n\r";
echo $sephiroth->getName() . ":" . $sephiroth->getHitPoint()."/". $sephiroth::MAX_HITPOINT."\n\r";


