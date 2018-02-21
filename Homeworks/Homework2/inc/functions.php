<?php

/*function handSigns($randomValue, $signs) {
    
    do {
    
    switch($randomValue) {
        case 0: $hand = "rock";
                break;
        case 1: $hand = "paper";
                break;
        case 2: $hand = "scissors";
                break;
        
    }
    echo "<img id='the$signs' src='img/$hand.png' alt='$hand' title='". ucfirst($hand) . "'width='70'>";
    
}while(keepPlaying == true);

}*/

//$handSign1 ['0'] ="rock";
//$handSign2 ['1'] ="paper";
//$handSign3 ['2'] = "scissors";

function handSigns($randomValue) {
    switch($randomValue) {
        case 0: $rock = "rock";
                break;
        case 1: $paper = "paper";
                break;
        case 2: $scissors = "scissors";
                break;
    }
   // echo "<img  src='img/$hand.png' alt='$hand' title='" . ucfirst($hand) . "'width='70'>";
    
    echo "<img src='img/$rock.png' alt='$rock' title='" . ucfirst($rock) . "width='70 >";
    echo "<img src='img/$paper.png' alt='$paper' title='" . ucfirst($paper) . "width='70 >";
    echo "<img src='img/$scissors.png' alt='$scissors' title='" . ucfirst($scissors) . "width='70 >";
}

// Will add the player one and player two to the parameters

//function displayHands($rock, $paper, $scissors) {
function displayHands($player1, $player2) {
    echo "<div id= 'output'>";
    if($player1 == $rock && $player2 == $paper) {
        echo "<h2> Player 2 Wins!! </h2>";
    }else if($player1 == $rock && $player2 == $scissors) {
        echo "<h2> Player 1 Wins!! </h2> ";
    }else if($player1 == $scissors && $player2 == $paper) { 
        echo "<h2> Player 1 Wins!! </h2>";
    }else {
        echo "<h3> Tie </h3>";
    }
    
}

function drawing() {
    echo "<div id='test'>";
    for ($i=0; $i < 2; $i++) {
        ${"randomValue1" . $i} = rand(0,2);
        Handsigns(${"randomValue1" . $i}, $i);
    }
    displayHands($rock, $paper, $scissors);
    
}
?>