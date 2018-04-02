<?php

    session_start();

    //print_r($_POST) // Displays values passed in the form
    
    include '../../dbconnection.php'; 
    
    $conn = getDatabaseConnection("ottermart");
    
    $username = $_POST['username']; 
    $password = sha1($_POST['password']);
    
    $sql = "SELECT *
            FROM om_admin
            WHERE username = '$username'
            AND password = '$password'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); // expecting one single record
    
    if(empty($record)) {
        
        echo "Wrong username or password";
    }else {
        
        //echo $record['firstName'] . " " . $record['lastName'];
        $_SESSION['adminName'] = $record['firstName'] . " " . ['lastName'];
        
        header("location:admin.php");
    }
    
    
?>
