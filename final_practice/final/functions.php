<?php

include('../../dbConnection.php');



$dbConn = getDatabaseConnection("Final");

/*function getImage() {
    
    global $dbConn;

    $sql = "SELECT image
            FROM superhero;";
            
            
    $stmt = $dbConn->query($sql);
    
   // $np = array();
    //$np[":image"] = $image;
    
    /*$stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // Expecting a single record
    
    return $record; 
    
    while($testing = $stmt->fetch() ) {
        $superHero = $testing['image'];
    }
    
    $html .="<img id='pic' src= $superHero>";
    
    //$superHero = rand($np);
    //$html = "<h4>Testing this out</h4>";
}
   
   echo $html; */




// Get the names from the database

function getNames() {
    
    global $dbConn;
    
    $sql = "SELECT DISTINCT firstName, lastName
            FROM superhero ORDER BY firstName, lastName DESC";
            
    $stmt = $dbConn->query($sql);
    
  
    $html = "<select id='dropDownMenu' name='names'><option disabled selected value> -- Select One-- </option>";
    
    while($row = $stmt->fetch() ) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        
        $html .= "<option value='$names'>$firstName $lastName</option>";
    }
    
    $html .= "</select>";
    echo $html;
    
    
    
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    global $conn;
    
    if(isNewUser($email)) {
        
        $sql = 'INSERT INTO  (correct, incorrect) values(:correct, :incorrect)';


        $np = array();
        $np[":email"] = $email;
        $np[":correct"] = 1;
        $np[":incorrect"] = 1;

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
        header('Content-Type: application/json');
        
        
    } else {
        
        if(!isset($_GET['correct']) && !isset($_GET['incorrect'])) {
                  header('Content-Type: application/json');
        echo json_encode(getUser($email));
        }
        else {
        // update exiting user
            $sql = "UPDATE superhero SET correct = :correct, incorrect = :incorrect";
                    
                    
            $np = array();
            $np[":email"] = $email;
            $np[":lastScore"] = $_GET["lastScore"];
            $np[":attemps"] = $_GET["attemps"];
    
            $stmt = $conn->prepare($sql);
            $stmt->execute($np);
    
      header('Content-Type: application/json');
        echo json_encode(getUser($email));
        }
        
    }
         
}



?>