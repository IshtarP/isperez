<?php
include('./dbconnection.php');
$dbConn = getDatabaseConnection("final_project");
function showCars() {
    $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id order by car_id;";
    displayCars($sql);
}


function displayCarsForAdmin($sql) {
     global $dbConn;

    $stmt =  $dbConn->query($sql);
    $columns = array("Picture","Make","Model","Year","Price","Exterior Color","Condition","Edit","Delete");
    $ranOnce = false;
    
    while(  $row = $stmt->fetch()) {
        if(!$ranOnce) {
            echo "<table class='table table-striped'>";
            $columnHTML = "<thead class='thead-light'><tr>";
            foreach ($columns as  $column) {
              $columnHTML .= "<th scope='col'>" . $column ." </th>";
            }
            $columnHTML .= "</tr></thead>";
            echo $columnHTML;
            echo "<tbody>";
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
        $del = "<input onClick='deleteCar(this.name)' type='button' name='" . $row['car_id']. "' value=Delete />";
        $edit = "<input onClick='editCar(this.name)' type='button' name='" . $row['car_id']. "' value=Edit   />";

        printf("<td><img class='cars' src='%s'/><td>%s</td><td>%s</td><td>%s</td><td>$%s</td></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>",$picture,$make,$model,$year,$price,$exterior_color,$used_or_new,$edit,$del);
        // echo $row['make_name'] . $row['model_name'] . $row['year'] . $row['price'] ."<br>";
        echo "</tr>";
    }
    if($ranOnce) {
      echo "</tbody></table>";
    } else {
        echo "<h1 id='noresulst'>No results</h1>";
    }
   
}


function displayCars($sql) {
    global $dbConn;
    $stmt =  $dbConn->query($sql);
    $columns = array("Picture","Make","Model","Year","Price","Exterior Color","Condition");
    $ranOnce = false;
    $htmlToReturn = "";
    while(  $row = $stmt->fetch()) {
        if(!$ranOnce) {
            $htmlToReturn .= "<table class='table table-striped'>";
            $columnHTML = "<thead class='thead-light'><tr>";
            foreach ($columns as  $column) {
              $columnHTML .= "<th scope='col'>" . $column ." </th>";
            }
            $columnHTML .= "</tr></thead>";
            $htmlToReturn .= $columnHTML;
            $htmlToReturn .= "<tbody>";
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
         $htmlToReturn .=  sprintf("<td><img class='cars' src='%s'/><td>%s</td><td>%s</td><td>%s</td><td>$%s</td></td><td>%s</td><td>%s</td>",$picture,$make,$model,$year,$price,$exterior_color,$used_or_new);
        // echo $row['make_name'] . $row['model_name'] . $row['year'] . $row['price'] ."<br>";
        $htmlToReturn .= "</tr>";
    }
    if($ranOnce) {
      $htmlToReturn .= "</tbody></table>";
    } else {
        $htmlToReturn .= "<h1 id='noresulst'>No results</h1>";
    }
    echo $htmlToReturn;
// | make_name | model_name        | year | exterior_color | used_or_new | price |
}
function yeet() {
    echo "yeet boi";
}
function displaySelectMake() {
    global $dbConn;
    $sql =  "SELECT * FROM car_make  order by make_id;";
    $stmt =  $dbConn->query($sql);
    $html = " <select class='selectpicker' id='make' name='make'><option disabled selected value> -- select an option -- </option>";
    while( $row = $stmt->fetch() ) {
        $make_id = $row['make_id'];
        $make_name = $row['make_name'];
        $html .= "<option value='$make_id'>$make_name</option>";
    }
    $html .= "</select>";
    echo $html;
}

function displaySelectMakeSecond() {
    global $dbConn;
    $sql =  "SELECT * FROM car_make  order by make_id;";
    $stmt =  $dbConn->query($sql);
    $html = " <select class='selectpicker' id='makeSearch' name='makeSearch'><option disabled selected value> -- select an option -- </option>";
    while( $row = $stmt->fetch() ) {
        $make_id = $row['make_id'];
        $make_name = $row['make_name'];
        $html .= "<option value='$make_id'>$make_name</option>";
    }
    $html .= "</select>";
    echo $html;
}
function adminDisplay() {
    $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id order by car_id;";
    
    displayCarsForAdmin($sql);
}


function displaySelectMakeThird() {
    global $dbConn;
    $sql =  "SELECT * FROM car_make  order by make_id;";
    $stmt =  $dbConn->query($sql);
    $html = " <select class='selectpicker' id='addMake' name='addMake'><option disabled selected value> -- select an option -- </option>";
    while( $row = $stmt->fetch() ) {
        $make_id = $row['make_id'];
        $make_name = $row['make_name'];
        $html .= "<option value='$make_id'>$make_name</option>";
    }
    $html .= "</select>";
    echo $html;
}




?>