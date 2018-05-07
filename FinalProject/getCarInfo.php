<?php

include('./helper_functions.php');

if (isset($_GET)) {
    
    global $dbConn;
    


   $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id WHERE car_id = :car_id";


    $car_id =  $_GET["car_id"];

    
   
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array('car_id' => $car_id));
    $row = $stmt->fetch();
        header('Content-type: application/json');

    echo json_encode($row);

}

?>