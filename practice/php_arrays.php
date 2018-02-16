<?php

 // Creates an Empty array
 $cards = array("ace", "one", 2);
 //print_r($cards); // For debugging purposes, shows all elements in the array
 
 echo $cards[1];
 
 $cards[] = "jack"; // Adds new element at the end of the array
 array_push($cards, "queen", "king");
 
 
 
 $cards[2] ="ten";
 
 print_r($cards);
 echo "<hr>";
 
 //displayCard($cards[2]);
 
 $lastCard = array_pop($cards); // retrieves and REMOVES the last item of the array
 displayCard($lastCard);
 echo "<hr>";
 print_r($cards);
 
 
 $cards = array_values($cards); // re-index array
 echo "<hr>";
 print_r($cards);
 
 shuffle($cards);
 echo "<hr>";
 print_r($cards);
 echo "<hr>";
 
 $randomIndex = rand(0,4);
 
 function displayCard($cards) {
     
     //global $cards; // Using variable that is outside of the function
     
     echo "<img src= '../challenges2/img-2/cards/clubs/$cards.png' />";
 }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>