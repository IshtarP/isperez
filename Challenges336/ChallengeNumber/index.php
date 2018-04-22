<?php
    
    session_start();
    
    if(!isset($_GET['enter']) || isset($_GET['playAgain'])) {
        
        $_SESSION["number"] =  rand(1,100); /* Random numbers from 1-10*/
        $_SESSION["attempts"] = 0;
    }
    
    $_SESSION['numbers'] = array();
    $_SESSION['tries'] = array();
   

    echo $_SESSION["number"];
    
    function checkGuess($guess, $number){
        
        if($guess > $number) {
              echo "Your guess needs to be lower.";
            
        }
        
        elseif($guess <  $number) {
            
            echo "Your guess needs to be higher";
            
            
        }
        
        elseif($guess == $number) {
            echo "You've guessed the number!";
        
            
        }
        
    }
    
    
    function displayHistory() {
        
        for($i = 0; $i < count($_SESSION['history']); $i++) {
            
            echo "You guessed the number " . $_SESSION['history'][$i];
        }
    }
    
   
    
    if(isset($_GET['enter'])) {
        
        $_SESSION["attempts"]++;
    }
    
    if(isset($_GET['giveUp'])) {
        
        echo "The number was " . $_SESSION["number"];
    }
    
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Guess a Number</title>
        <style>
            .wrong {
                color:green;
            }
            
        </style>
    </head>
    <body>
        
        <h1> Guess a Number between 1 and 100!</h1>
        
        <form>
            
            Guess: <input type="text" name="guess"/>
            </br></br>
            
            <input type="submit" name="enter" value="Guess Number"/>
            </br></br>
            
            <input type="submit" name="giveUp" value="Give Up"/>
            <input type="submit" name="playAgain" value="Play Again"/>
            <br/>
            <?php
                
                if(isset($_GET["enter"])) {
                    
                     echo "Number of tries: " . $_SESSION["attempts"];
                     echo "<br>";
                     checkGuess($_GET["guess"], $_SESSION["number"]);
                }
            ?>
        </form>
    </body>
</html>