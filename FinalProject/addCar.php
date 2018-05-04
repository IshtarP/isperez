<?php

    // start sessions
    session_start();
    if(!isset($_SESSION['adminName'])) {
        
        header("Location:index.php");
        
    }
    
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("final_project");
    
    function getCategories() {
        global $conn;
        
        $sql = "SELECT car_id, exterior_color from car_lot ORDER BY exterior_color";
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        for each ($records as $record) {
            echo "<option value='".$record["car_id"] . "'>". $record['car_lot'] ."</option>";
        }
    }
    
    if(isset($_GET['submitCar'])) {
        $carItem = $_GET['carModel']
    }
    

?>