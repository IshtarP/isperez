<?php
session_start();

// print_r($_SESSION); // Displays the content of any array

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <h2>My favorite class is <?=$_SESSION['course']?></h2>

    </body>
</html>