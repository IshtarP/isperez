<?php

function handSigns($randomValue) {
    
    $filename = "";
    switch($randomValue) {
        case 0: $filename = "rock";
                break;
        case 1: $filename = "paper";
                
                break;
        case 2: $filename = "scissors";
                
                break;
    }
    echo "<img src='img/$filename.png' alt='$filename' title='" . ucfirst($filename) . "width='70' >";
}


function displayHands($player1, $player2) {
    $rock = 0;
    $paper = 1;
    $scissors = 2;
    echo "<div id= 'output'>";
    
    if($player1 == $player2) {
        echo "<h3> Tie </h3>";
    } else {
        $player1Wins = false;
        if($player1 == $rock && $player2 == $scissors) {
                $player1Wins = true;
        } else if($player1 == $paper && $player2 == $rock) {
                $player1Wins = true;
        } else if($player1 == $scissors && $player2 == $paper) {
            $player1Wins = true;
        }
        
        if($player1Wins) {
           echo "<h2> Player 1 Wins!! </h2>";
        } else {
            echo "<h2> Player 2 Wins!! </h2>";
        }
    }
}

function drawing() {
    $players=array();
     
    echo "<div id='test'>";
    for ($i=0; $i < 2; $i++) {
        $randomChoice = rand(0,2);
        ${"randomValue1" . $i} = $randomChoice;
        Handsigns(${"randomValue1" . $i}, $i);
        array_push($players,$randomChoice);
    }
    // 3 paremters
    
    displayHands($players[0], $players[1]);
}
?>