<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        
        <?php
        
        function displaySymbol1($randomValue) {
            
            //$randomValue = rand(0,2);
            echo $randomValue;
            
            if ($randomValue == 0) {
                $symbol = "seven";
            
            } else if ($randomValue == 1) {
                
                $symbol = "orange";
            } else {
                $symbol = "cherry";
            }
        
            
            echo "<img src='img/$symbol.png' width='70 alt='$symbol' title='$symbol' />"; // Image 
            
        }
        
        $randomValue1 = rand(0,2);
        displaySymbol1($randomValue1);
        $randomValue2 = rand(0,2);
        displaySymbol1($randomValue2);
        $randomValue3 = rand(0,2);
        displaySymbol1($randomValue3);
        
        // Can also use a for loop which makes the code look cleaner 
        //
        //for ($i=0; $i < 3; $i++) {
        //    displaySymbol();
       // }
        
        //displaySymbol();
        //displaySymbol();
        //displaySymbol();
           
        
        ?>
        
 <!--   <img src="img/lemon.png" width="70" alt="Lemon" title="Lemon" />
        <img src="img/cherry.png" width="70" alt="Cherry" title="Cherry" />
        <img src="img/orange.png" width="70" alt="Orange" title="Oreange" />
        
-->
    </body>
</html>