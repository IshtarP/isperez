<?php

include './dbconnection.php';

$conn = getdatabaseConnection("final_project");

$car_id = $_GET["car_id"];

// This sql prevents sql injection using single qoutes
$sql = "DELETE FROM car_lot WHERE car_id = :car_id";

 $np = array();
 $np[":car_id"] = $car_id;

 $stmt = $conn->prepare($sql);
 $stmt->execute($np);
 $count = $stmt->rowCount();

 if ($count > 0) {
     echo "You have successfully deleted the car";
 }

 ?>
