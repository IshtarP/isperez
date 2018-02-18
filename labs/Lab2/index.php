<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
        <style type="text/css">
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id ="main">
            <?php
             
            include 'inc/functions.php';
            play();
            ?>
        </div>
        
            
        <div>
            <form>
                <input type="submit" value="Spin"/>
            </form>
        </div>
        
        <image>
            <img id="buddy" src="img/buddy_verified.png" alt="Picture of the buddy badge" />
        </image>
        
        <!-- This is the footer -->
         <footer>
             <hr id="footer">
             CST336. 2017&copy; Perez <br/>
             <strong>Disclaimer:</strong>
             The information in this webpage is fictious.<br/>
             It is used for academic purposes only.
             </hr>
             <br/>
             <br>
             <img id="school" src="img/CSUMB.png" alt="Picture of Csumb logo" />
         </footer>
        
    </body>
</html>