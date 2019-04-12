// Variables
var selectedWord = ""; // Set to empty string
var selectedHint = ""; // Set to empty string
var board = []; // Empty array 
var remainingGuesses = 6; // Setting the remaining guesses to 6
var words = [{ word:"snake", hint: "It's a reptile" }, // An array with key values
             { word:"monkey", hint: "It's a mammal"},
             { word:"beetle", hint: "It's an insect" },
             { word:"lion", hint: "It's a mammal"},
             { word:"turtle", hint:"It's an oviparus"}];
             
// Creating an array of available letters             
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                

// Set the count to 0
var count = 0

// the given hint is set to false
var hintGiven = false

             
// LISTENER
// check the visitor's browser type and browser version, and load the proper version of the web page based on the information.
//The onload event can also be used to deal with cookies
window.onload = startGame();

// The function is executed when the user clicks on the HTML element.
$(".letters").click( function() {
    checkLetter($(this).attr("id")); //method is used to get attribute values
    disableButton($(this));
});

// The reload() method is used to reload the current document.
//The reload() method does the same as the reload button in your browser.
$(".replayBtn").on("click", function() {
    location.reload();  //The location object contains information about the current URL.
});

$(".theHint").click( function () {
    console.log(Math.floor(Math.random() * 10)) // Random hints
    
      checkLetter($(this).attr("id")); // check for a hint 
      $('#aHint').show()

  
    //hints($(this).attr("id"));

   
});



// Functions
// That calls every other function
function startGame() {
    pickWord(); 
    initBoard();
    createLetters();
    updateMan();
    updateBoard();

}

// it inititates the borard that shows the underscores
function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

// Create the letters inside the letters div
// Letters are display in green as it is the color of the btn-success 
function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button  class='btn btn-success letter' id='" + letter + "'>"  + letter +  "</button>");
    }
}


// function that picks word 
function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length); // randomize the words
    selectedWord = words[randomInt].word.toUpperCase(); // upper case the words
    selectedHint = words[randomInt].hint; // randomize the hint as well 
}

// Checks to see if the selected letter exist in the selected Word
function checkLetter(letter) {
    var positions = new Array(); // create a new array called positions
    
    for (var i=0; i < selectedWord.length; i++) { // loop over the length of the selected words
        if (letter == selectedWord[i]) { // if the letter is equal to the selected word then push[i]
            positions.push(i);

        }
    }
    
    if (positions.length > 0) { // if the lenght of the position is greater than 0 then add to the count the length of the position
        count += positions.length
        updateWord(positions, letter); // update the positions and letter
    } else {
        remainingGuesses -= 1; // else take away a guess
    }
    
    if (remainingGuesses <= 0 ) { // if remaining guesses is less than or equal to 0
        endGame(false); // we end the game
    }
    
    if(count === selectedWord.length) // if the count is equal to the selected word lenght then 
        endGame(true) // continue the game
    


    updateMan(); // calling update the man function
}

// Update the current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter; // for pos in posotion board position will equal the letter
    }
    
    updateBoard(); // update the board
    
    if (!board.includes('_')) { // if not equal to reaminibg _ then 
        endGame(true);
    }
} 

function updateBoard() {
    
    $("#word").empty();
   
    for(var i=0; i < board.length; i++) { // for loop that goes over the lenght of the board
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

   

      






