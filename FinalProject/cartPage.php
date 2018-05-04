<?php

    // Start the session
    session_start();
    // Will include the functions.php file here
    
    if(isset($_POST['removeId'])) {
        
        foreach($_SESSION['cart'] as $itemKey => $item) {
            
            if($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    if(isset($_POST['itemId'])) {
        
        foreach($_SESSION['cart'] as $item) {
            
            if($item['id'] == $_POST['itemId']) {
                
                $item['quantity'] = $_post['update'];
            }
        }
    }
    
    if(isset($_GET['emptyCart'])) {
        
        unset($_SESSION['cart']);
    }

?>






<!DOCTYPE>
<html>
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <body>
            <div class='container'>
                <div class='text-center'>
                    
                    
                    <!-- Bootstrap Navigation Bar -->
                     <nav class='navbar navbar-inverse - navbar-fixed-top'>
                    <div class='container-fluid'>
                        <div class='navbar-header'>
                            <a class='navbar-brand' href='#'>The Fast Shop</a>
                        </div>
                        <ul class='nav navbar-nav'>
                            <li><a href='home.php'>Home</a></li>
                            <li><a href='scart.php'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'>
                            </span>Cart: <?php displayCartCount(); ?> </a></li>
                        </ul>
                    </div>
                </nav>
                <br /> <br /> <br />
                
                <h2>Car Cart</h2>
                <form method="get">
                    <input type="submit" name="emptyCart" value="Empty Cart"/>
                </form>
                <!-- Cart Items -->
                
                <!-- FUNCTION tha needs to be updated -->
                <?php
                    
                    displayCart();
                ?>
                    
                </div>
            </div>
        </body>
    </head>
</html>