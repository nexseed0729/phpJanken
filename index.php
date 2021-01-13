<?php

const STONE = 0;
const PAPER = 1;
const SCISSORS = 2;

const HAND_TYPE = [
    STONE => "グー",
    PAPER => "チョキ",
    SCISSORS => "パー",
];

const YES = "yes";
const NO = "no";


echo gameStart() .PHP_EOL;

function gameStart() {
    echo "グー、チョキ、パーを入力して下さい" .PHP_EOL;
    $myhand = getMyHand();
    $comhand = getComHand();
    $result = judge($myhand, $comhand);
    if ($result === STONE) {
        echo "あ〜いこで〜!!" .PHP_EOL;
        return gameStart();
    }
    if ($result === PAPER) {
        $gameResult = "LOSE..";
    }
    if ($result === SCISSORS ) {
        $gameResult= "WIN!";
    }
    echo $gameResult .PHP_EOL;
    echo "continue!?" .PHP_EOL;
    echo "yes or no" .PHP_EOL;

    $restart = inputRestart();
    if ($restart === YES) {
        return gameStart();
    } 
    if ($restart === NO) {
        echo "また勝負しましょうね！" .PHP_EOL;
        return exit;
    } 
}

function check($check) {
    if (!($check === YES || $check === NO)) {
        echo "正しく入力して下さい" .PHP_EOL;
        return false;
    }
    return true;
}
function getMyHand() {
    $myHand = rtrim(fgets(STDIN));
    if ($myHand === HAND_TYPE[STONE]) {
        return STONE;
    } elseif ($myHand === HAND_TYPE[PAPER]) {
        return PAPER;
    } elseif ($myHand === HAND_TYPE[SCISSORS]) {
        return SCISSORS;
    } else {
        echo "正しく入力して下さい" .PHP_EOL;
        return getMyHand();
    }
}
function getComHand() {
    $comHand = array_rand(HAND_TYPE);
    return $comHand;
}
function judge($player, $com) {
    $judge = ($player - $com + 3) % 3;
    return $judge;
}
function inputRestart() {
    $restart = rtrim(fgets(STDIN));
    $check = check($restart);
    if (!$check) {
        return inputRestart();
    }
    if ($check) {
        return $restart;
    }
}

?>
