<?php

include('../../dbConnection.php');

$dbConn = getDatabaseConnection("Final");

function getSuperHeroes() {
    
    global $dbConn;
    
    $sql = "SELECT DISTINCT name
            FROM superhero ORDER BY name ASC";
            
    $stmt = $dbConn->query($sql);
    
    $html = "<select id='heros' name='names'>";
    
    while($row = $stmt->fetch() ) {
        $hero = $row['name'];
        
        $html .= "<option value='$test'>$hero</option>";
    }
    
    $html .= "</select>";
    echo $html;
}




?>