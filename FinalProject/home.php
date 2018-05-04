<?php

include 'functions.php';

session_start();

if(!isset($SESSION['cart'])) {
    
    $_SESSION['cart'] = array();
}



?>


<!DOCTYPE html>
<html>
    <head>
        <meta chartset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url(css/styles.css);
        </style>
        
        <title>Final Project</title>
    </head>
    <body>
                
                
            <button onClick="window.location.pathname = 'isperez/FinalProject/login.php'" id="colorTest" type="button" class="btn btn-default">admin Login</button>
                <a href="action.php">Browse Cars</a>

        
        
        <!-- Testing the div -->
        
          
        
        <!-- Creating a carousel -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div id="fixed" class="carousel-inner">
                <div class="item active">
                    <img src="img/theNissanGTR.png" alt="nissanGTR">
                </div>
                
                <div class="item">
                    <img src="img/bmwM3.png" alt="bmwM3">
                </div>
                
                <div class="item">
                    <img src="img/honda.png" alt="honda">
                </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        </div> <!-- closing the div for the testing -->
        
        <!-- <div class="message">
              <img src="./img/Audi.png">
                    
        </div> -->
        
        

    
    </body>
</html>