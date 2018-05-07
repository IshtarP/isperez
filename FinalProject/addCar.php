<?php
include('./dbconnection.php');

$dbConn = getDatabaseConnection("final_project");


if (isset($_GET)) {
    
    
    
    $model_id = $_GET['model_id'];
 
    $year = $_GET['year'];
    $price = $_GET['price'];
    $exterior_color = $_GET['exterior_color'];
    $used_or_new = $_GET['used_or_new'];
    $picture = $_GET['picture'];
    
    
   
    $stmt = $dbConn->prepare('INSERT INTO car_lot (model_id, year, price, exterior_color, used_or_new,picture) VALUES (:model_id, :year, :price, :exterior_color,:used_or_new, :picture)');
    $stmt->execute(array('model_id' => $model_id,'year' => $year, 'price' => $price, 'exterior_color' => $exterior_color, 'used_or_new' => $used_or_new, 'picture' => $picture ));

    echo json_encode(array("success"));

}

?>