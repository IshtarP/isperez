<?php 

    session_start();
    
     $carMakeArray = array("NISSAN", "HONDA", "BMW", "DODGE","FORD", "CHEVROLET", "VW", "MERCEDES", "AUDI", "LEXUS", "PORSCHE", "SUBARU"); 
    
    function displayMake() {
        global $carMakeArray;
        
        foreach($carMakeArray as $make ) {
        echo "<option value= '$make'>$make</option>";
        
        }
       
    }

?>