<?php
include('./dbconnection.php');

$dbConn = getDatabaseConnection("final_project");



    $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id order by car_id;";

    $stmt =  $dbConn->query($sql);

    $htmlToReturn = "";

    $columns = array("Picture","Make","Model","Year","Price","Exterior Color","Condition","Delete");

    $ranOnce = false;
    while(  $row = $stmt->fetch()) {

        if(!$ranOnce) {
            $htmlToReturn .= "<table class='table table-striped'>";

            $columnHTML = "<thead class='thead-light'><tr>";
            foreach ($columns as  $column) {
              $columnHTML .= "<th scope='col'>" . $column ." </th>";
            }
            $columnHTML .= "</tr></thead>";
            $htmlToReturn .= $columnHTML;
            $htmlToReturn .=  "<tbody>";
            $ranOnce = true;
        }

        $make = $row['make_name'];
        $model = $row['model_name'];
        $year = $row['year'];
        $price = number_format($row['price']);
        $picture = $row['picture'];
        $exterior_color = $row['exterior_color'];
        $used_or_new = $row['used_or_new'];
        $htmlToReturn .= "<tr>";

        $del = "<input onClick='deleteCar(this.name)' type='button' name='" . $row['car_id']. "' value=Delete />";
        $htmlToReturn .= sprintf("<td><img class='cars' src='%s'/><td>%s</td><td>%s</td><td>%s</td><td>$%s</td></td><td>%s</td><td>%s</td><td>%s</td>",$picture,$make,$model,$year,$price,$exterior_color,$used_or_new,$del);

        // echo $row['make_name'] . $row['model_name'] . $row['year'] . $row['price'] ."<br>";

        $htmlToReturn .= "</tr>";
    }
    if($ranOnce) {
      $htmlToReturn .= "</tbody></table>";

    } else {
        $htmlToReturn .= "<h1 id='noresulst'>No results</h1>";
    }

    echo $htmlToReturn;



?>
