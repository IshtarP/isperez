<!DOCTYPE>
<html>
    <head>
        
        
         <meta charset="utf=8">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         
         <style>
             @import url("css/styles.css");
         </style>
         
         <title>Reports</title>
        
        
    </head>
    
    
    <body id="reportBackgroundColor">
        
        <div id="box">
    
        <h1 id="theReports">Reports</h1> 
        
         <button id="reportButton"><a class="buttonColor"href="./index.php">Home</a></button>
        
        
        <?php
            include('./dbconnection.php');
            $dbConn = getDatabaseConnection("final_project");
            
            $averageCarPrice = $dbConn->query("SELECT AVG(price) FROM car_lot")->fetchColumn();
            $maxPrice = $dbConn->query("SELECT MAX(price) FROM car_lot")->fetchColumn();
            $minPrice = $dbConn->query("SELECT MIN(price) FROM car_lot")->fetchColumn();
            $totalCars = $dbConn->query("SELECT COUNT(*) FROM car_lot")->fetchColumn();
            
            echo "Averge price of a car: " . number_format($averageCarPrice) . "<br>";
            echo "Max price of car: " . number_format($maxPrice) . "<br>";
            echo "Min price of car: " . number_format($minPrice) . "<br>";
            echo "Total cars: " . $totalCars . "<br>";
            
            $carsByColor = "select LOWER(exterior_color) as color ,count(*) as how_much from car_lot group by color order by color";
            $stmt =  $dbConn->query($carsByColor);
            
            
            echo " <h2>  How many of each car by color</h2>";
            
            
            echo "<table>";
            while( $row = $stmt->fetch()) {
                
                printf("<tr><td>%s</td><td>%s</td></tr>",$row['color'],$row['how_much']);
            }
            echo "</table>";
           


         ?>
        
        </div>
    
    </body>
        
    
</html>










