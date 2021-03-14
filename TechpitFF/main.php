<?php
//クラスを作ったときなどは忘れずにrequire_once
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

$members = array();
$members[] = new Brave('クラウド');
$members[] = new WhiteMage('ティファ');
$members[] = new BlackMage('エアリス');


$enemies = array();
$enemies[] = new Enemy('ゴブリン',20);
$enemies[] = new Enemy('ボム',25);
$enemies[] = new Enemy('モルボル',30);

//$cloud = new Brave("クラウド");
//$sephiroth = new Enemy("セフィロス");


$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;

//終了条件の判定
function isFinish($objects)
{
    $deathCount = 0;
    foreach ($objects as $object){
        //1人でもHPが０を超えていたらfalseを返す
        if($object->getHitPoint() > 0){
            return false;
        }
        $deathCount++;
    }
    //仲間の死亡数と数が同じであればtrueを返す
    if ($deathCount === count($objects)){
        return true;
    }
}


while (!$isFinishFlg) {
    //仲間の表示
    $messageObj->displayStatusMessage($members);
    //敵の表示
    $messageObj->displayStatusMessage($enemies);

    //現在のターン
    echo "--- $turn ターン目 ---" . "\n\r";

    //仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);
 
    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);

     // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
     $isFinishFlg = isFinish($members);
     if ($isFinishFlg) {
         $message = "GAME OVER ....\n\n";
         break;
     }
  
     $isFinishFlg = isFinish($enemies);
     if ($isFinishFlg) {
         $message = "♪♪♪ファンファーレ♪♪♪\n\n";
         break;
     }
 

    $turn ++;
}

echo "★★★戦闘終了★★★\n\r";

// 仲間の表示
$messageObj->displayStatusMessage($members);
 
// 敵の表示
$messageObj->displayStatusMessage($enemies);

