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


echo "<h2>How many of each car by color</h2>";
echo "<table>";
while( $row = $stmt->fetch()) {
    
    printf("<tr><td>%s</td><td>%s</td></tr>",$row['color'],$row['how_much']);
}
echo "</table>"




?>