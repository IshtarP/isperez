<?php
  
include('./dbconnection.php');

$dbConn = getDatabaseConnection("final_project");

function showCars() {

    $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id order by car_id;";

    displayCars($sql);
}

function displayCars($sql) {

    global $dbConn;

    
    $stmt =  $dbConn->query($sql);
    

    
    $ranOnce = false;
    while(  $row = $stmt->fetch()) {
        
        if(!$ranOnce) {
            echo "<table id='customers'>";
            echo "<th>Picture</th><th>Make</th><th>Model</th><th>Year</th><th>Price</th><th>Exterior Color</th><th>Used/New</th>";
            $ranOnce = true;
        }
  
        $make = $row['make_name'];
        $model = $row['model_name'];
        $year = $row['year'];
        $price = number_format($row['price']);
        $picture = $row['picture'];
        $exterior_color = $row['exterior_color'];
        $used_or_new = $row['used_or_new'];
        echo "<tr>";
        printf("<td><img src='%s'/><td>%s</td><td>%s</td><td>%s</td><td>$%s</td></td><td>%s</td><td>%s</td>",$picture,$make,$model,$year,$price,$exterior_color,$used_or_new);
        
        // echo $row['make_name'] . $row['model_name'] . $row['year'] . $row['price'] ."<br>";
        
        echo "</tr>";
    }
    if($ranOnce) {
      echo "<table>";

    } else {
        echo "<h1 id='noresulst'>No results</h1>";
    }

// | make_name | model_name        | year | exterior_color | used_or_new | price |
}

function yeet() {
    echo "yeet boi";
}

function displaySelectMake() {
    
    global $dbConn;
    $sql =  "SELECT * FROM car_make  order by make_id;";
 
    $stmt =  $dbConn->query($sql);
    $html = " <select id='make' name='make'><option disabled selected value> -- select an option -- </option>";
    while( $row = $stmt->fetch() ) {
    
        
        $make_id = $row['make_id'];
        $make_name = $row['make_name'];
        $html .= "<option value='$make_id'>$make_name</option>";
  

 
    }
    
    $html .= "</select>";
    
    echo $html;
}
    


?>