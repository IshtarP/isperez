<?php

include('./helper_functions.php');

if (isset($_GET)) {
    
    global $dbConn;
    

     
     $year = $_GET['year'];
     $price = $_GET['price'];
     $picture = $_GET['picture'];
     $exterior_color = $_GET['color'];
     $used_or_new = $_GET['condition'];
     $car_id = $_GET['car_id'];


   $sql =  "UPDATE car_lot SET " .
             "  year = :year, price = :price, exterior_color = :exterior_color, used_or_new = :used_or_new, picture = :picture " .
             " WHERE car_id = :car_id";



    
   
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array('year' => $year, 'price' => $price, 'picture' => $picture, 'exterior_color' => $exterior_color, 
                        'used_or_new' => $used_or_new, 'car_id' => $car_id));
    header('Content-type: application/json');

    echo json_encode(array("success"));

}

?>