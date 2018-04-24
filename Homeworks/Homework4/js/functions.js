

hands = ["paper.png","rock.png","scissors.png"]

function getRandomInt(min, max) {
         return Math.floor(Math.random() * (max - min + 1) + min);
}

var player1prev = hands[getRandomInt(0,hands.length - 1)]
var player2prev =hands[getRandomInt(0,hands.length - 1)]



// LISTENERS
$("#button").click( function()  {
    

    

    
    // delete the previous
    $('#playArea').empty()
    $('#outcome').empty()
 
    
 
    
    // ghetto way to shuffle
    
    player1 = hands[getRandomInt(0,hands.length - 1)]
    player2 = hands[getRandomInt(0,hands.length - 1)]
    
    while(player1 === player1prev && player2  === player2prev) {
            player1 = hands[getRandomInt(0,hands.length - 1)]
            player2 = hands[getRandomInt(0,hands.length - 1)]
    }
    
    player1prev = player1
    player2prev = player2


    
    player1Hand = '<img src="./img/' + player1 + '"/>'
    player2Hand = '<img src="./img/' + player2 + '"/>'
    
    
    
    
        if (player1Hand === player2Hand) {
        $("#outcome").append("<h3> Tie </h3>"); 
        
    } else {
        var player1Wins = false; // variable for player 1 wins is set to false
        if(player1 === 'rock.png' && player2 == 'scissors.png') {
            player1Wins = true;
        } else if (player1 === 'paper.png' && player2 === 'rock.png') {
            player1Wins = true;
        } else if (player1 === 'scissors.png' && player2 === 'paper.png') {
            player1Wins = true;
        }
        
        if(player1Wins) {
            $("#outcome").append("<h2> Player 1 Wins!! </h2> ");
        } else {
            $("#outcome").append("<h2> Player 2 Wins!! <h2> ");
        }
    }
    
    
    $('#playArea').append(player1Hand)
      $('#playArea').append(player2Hand)

});


/*



function handSigns(randomValue) {
    
    var fileName = "";
    switch (randomValue) {
        case 0: 
            fileName = "rock";
                break;
        case 1: 
            fileName = "paper";
                break;
                
        case 2:
            fileName = "scissors";
                break;
        
        default:
            // code
    }
    // Diplay image
}

function displayHands(player1, player2) {
    var rock = 0;
    var paper = 1;
    var scissors = 2;
    
    document.getElementById("div").innerHTML;
    
    if (player1 == player2) {
        $("#tie").append("<h3> Tie </h3>"); // Outputs if it is a tie
        
    } else {
        var player1Wins = false; // variable for player 1 wins is set to false
        if(player1 == rock && player2 == scissors) {
            player1Wins = true;
        } else if (player1 == paper && player2 == rock) {
            player1Wins = true;
        } else if (player1 == scissors && player2 == paper) {
            player1Wins = true;
        }
        
        if(player1Wins) {
            $("#wins").append("<h2> Player 1 Wins!! </h2> ");
        } else {
            $("#wins").append("<h2> Player 2 Wins!! <h2> ");
        }
    }
    
}

function drawing() {
    var players = new Array(); // Creates a new array
    
   for (var i =0; i < 2; i++) {
       var randomChoice = Math.floor(Math.random() * 4);
       
       handSigns()
       players.push(players, randomChoice);
       
       
   }
   
   displayHands(players[0], players[1]);        
    
    
}

*/