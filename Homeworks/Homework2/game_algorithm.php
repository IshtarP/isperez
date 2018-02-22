<?php 
$player1 = rand(0,2); //  [0,1,2]
$player2 = rand(0,2); 
$rock = 0;
$paper = 1;
$scissor = 2;


$player1Wins = false;
if($player1 == $rock ) {
    if($player2 == $scissor) {
        $player1Wins = true;
    }
} else if($player1 == $paper) {
    if($player2 == $rock) {
        $player1Wins = true;
    }
} else {
    if($player2 == $paper) {
        $player1Wins = true;
    }
}

if($player1Wins) {
    echo "Player 1 wins";
} else {
    echo "Player 2 wins";
}
?>