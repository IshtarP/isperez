<?php
 session_start();  
     
     
    
     
     //"username" session variable is set"
     if (isset($_SESSION['username'])) {
        echo "Testing"; 
        echo "<div>" . $_SESSION['username'] . "</div>"; 
       
    } else {
        echo 'Sorry, You are not logged in.';
        header("Location: program1.php");
    }
     
?>