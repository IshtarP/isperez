<!DOCTYPE html>
<html>
    <head>
        <title>Homework 2 </title>
        <meta charset="utf-8" />
        <style type="text/css">
            @import url("css/styles.css");
            
        </style>
    </head>
    
    <body>
        <header>
            <h1>Rock Paper & Scissors</h1>
        </header>
        
        <div id="main">
            <h2 id="fixed" >
            Player 1 choice || Player 2 choice
            </h2>
            
            
           <?php
            include 'inc/functions.php';
            drawing();
            ?>
            
        </div>
        
        <div>
            
            <form>
                
                <input type="submit" value="click me" />
            </form>
        <div>
        
        <!-- This is the footer -->
        <footer>
            <hr>
            CST336. 2017&copy; Perez <br/>
            <strong>Disclaimer:</strong>
            The information in this webpage is fictious.<br/>
            It is used for academic purposes only.
            </hr>
            <br/>
             <img id="school" src="img/CSUMB.png" alt="Csumb logo"/>
            
        </footer>
    </body>
</html>