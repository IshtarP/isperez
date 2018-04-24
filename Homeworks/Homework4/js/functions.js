

var hands = ["paper.png","rock.png","scissors.png"]; // An array of the pictures used

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
 
    
 
    
    //  Way to shuffle
    
    var player1 = hands[getRandomInt(0,hands.length - 1)]
    var player2 = hands[getRandomInt(0,hands.length - 1)]
    
    while(player1 === player1prev && player2  === player2prev) {
            player1 = hands[getRandomInt(0,hands.length - 1)]
            player2 = hands[getRandomInt(0,hands.length - 1)]
    }
    
    player1prev = player1;
    player2prev = player2;


    
    var player1Hand = '<img src="./img/' + player1 + '"/>'; // Displays the image for player 1
    var player2Hand = '<img src="./img/' + player2 + '"/>'; // Displays the image for player 2
    
    
    
    
        if (player1Hand === player2Hand) {
        $("#outcome").append("<h3> Tie </h3>");  // Print a Tie
        
    } else {
        var player1Wins = false; // variable for player 1 wins is set to false
        if(player1 === 'rock.png' && player2 == 'scissors.png') { // Using images to compare 
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
    
    
    $('#playArea').append(player1Hand) //The append() method inserts the playerHand to the div with an id playArea
      $('#playArea').append(player2Hand) // The append() method inserts the playerHand to the div with an id playArea

});


