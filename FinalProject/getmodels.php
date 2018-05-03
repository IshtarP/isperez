<?php

include('./dbconnection.php');

if (isset($_GET)) {
    
    $dbConn = getDatabaseConnection("final_project");

    $make_id = $_GET["make_id"];

    $sql =  "SELECT * FROM car_model WHERE make_id=" . $make_id;
    
    
    $stmt =  $dbConn->query($sql);

    $result = array();
    while($row = $stmt->fetch() ) {
        $temp = array("model_id" => $row['model_id'], "model_name" => $row['model_name']);
        array_push($result,$temp);
        // echo $row['model_name'] . "<br/>";

    }    
    header('Content-type: application/json');
    echo json_encode($result);
} 
?>