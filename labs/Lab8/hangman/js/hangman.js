// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{ word:"snake", hint: "It's a reptile" },
             { word:"monkey", hint: "It's a mammal"},
             { word:"beetle", hint: "It's an insect" },
             { word:"lion", hint: "It's a mammal"},
             { word:"turtle", hint:"It's an oviparus"}];
             
// Creating an array of available letters             
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                


var count = 0

var hintGiven = false

             
// LISTENER
window.onload = startGame();

$(".letter").click( function() {
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".replayBtn").on("click", function() {
    location.reload();
});

$(".theHint").click( function () {
    console.log(Math.floor(Math.random() * 10))
    
      checkLetter($(this).attr("id"));
      $('#aHint').show()

  
    //hints($(this).attr("id"));

   
});



// Functions
function startGame() {
    pickWord(); 
    initBoard();
    createLetters();
    updateMan();
    updateBoard();

}

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

// Create the letters inside the letters div
function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button  class='btn btn-success letter' id='" + letter + "'>"  + letter +  "</button>");
    }
}


function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase(); 
    selectedHint = words[randomInt].hint;
}

// Checks to see if the selected letter exist in the selected Word
function checkLetter(letter) {
    var positions = new Array();
    
    for (var i=0; i < selectedWord.length; i++) {
        if (letter == selectedWord[i]) {
            positions.push(i);

        }
    }
    
    if (positions.length > 0) {
        count += positions.length
        updateWord(positions, letter);
    } else {
        remainingGuesses -= 1;
    }
    
    if (remainingGuesses <= 0 ) {
        endGame(false);
    }
    
    if(count === selectedWord.length)
        endGame(true)
    


    updateMan();
    
}

// Update the current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
    
    if (!board.includes('_')) {
        endGame(true);
    }
} 

function updateBoard() {
    
    $("#word").empty();
   
    for(var i=0; i < board.length; i++) {
       $("#word").append(board[i] + " ");
    
    }

    $("#word").append("<br/>");
    
    $("#word").append("<button class='theHint'> Hint </button>");
     $("#word").append("<p id='aHint' style='display: none'>" + selectedHint +  "</p>");
    

}
 
// Disables the button and changes the style to tell the user it's disabled
function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}



// Calculate and updates the image for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}


// Ends the game by hiding game divs and displaying the win or loss div
function endGame(win) {
    $("#letters").hide();
    
    if (win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
    
} 


function hints() {
    
    
    document.getElementById('.theHint').onclick = function() {
   alert("button was clicked");
};
}

   

      






