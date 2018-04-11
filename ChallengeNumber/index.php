<?php
    
    session_start();
    
    $number= rand(1,10); /* Random numbers from 1-10*/
    
   

    $_SESSION["number"];
    
    echo $_SESSION["number"];
    
    if(isset($_GET['submit'])) {
        
        $guess = $_GET['guess'];
        
        if($guess == $number) {
            
            echo "<You've guessed the number!</div>";
        }
        
        elseif($guess < $number) {
            
            echo "<div class='wrong'>Your guess needs to be higher.</div>";
            
            
        }
        
        else {
            
            echo "<div class='wrong'>Your guess needs to be lower.</div>";
            
        }
    }
    
    echo "Number of tries: " . $_SESSION["attempts"];
    echo "<br>";
    
    if ($_SESSION["attempts"] == null) 
    {
    $_SESSION["attempts"] ++;
    }
    else{
    $_SESSION["attempts"]++; 
    }
    
    if(isset($_GET['giveUp'])) {
        
        echo "The number was " . $number;
    }
    
    if(isset($_GET['playAgain'])) {
        
        session_unset();
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
            
            <input type="submit" name="submit" value="Guess Number"/>
            </br></br>
            
            <input type="submit" name="giveUp" value="Give Up"/>
            <input type="submit" name="playAgain" value="Play Again"/>
            
        </form>
    </body>
</html>