<?php

include('./helper_functions.php');
 
if (isset($_GET)) {
    

   $sql =  "SELECT * FROM car_lot AS lot" .
             " INNER JOIN car_model AS model ON lot.model_id = model.model_id" .
             " INNER JOIN car_make AS make ON make.make_id = model.make_id ";
    
    
    $make_id =  $_GET["make_id"];
    $model_id = $_GET["model_id"];
    $condition = $_GET["condition"];
    
    // at least on query 
    if($make_id != '' || $model_id != '' || $condition != '') {
        $sql .= " WHERE ";
    }
    
    // filter by make
    if( $make_id != '') {
        $sql .= " make.make_id=$make_id";
        
        if($model_id != '' || $condition != '') {
            $sql .= " AND ";
        }
 
    }
   if($model_id != '') {
        $sql .= "  model.model_id=$model_id ";
     if($condition != '') {
            $sql .= " AND ";
        }
    }
    if( $condition != '') {
        $sql .= "  used_or_new='$condition' ";
        
    
    }
     
 
    
 
     
    // if($make_id != '' && $model_id != '' && $condition != '') {
    //     $sql .= "WHERE  used_or_new='$condition'";
    // }
    
    
    displayCars($sql);
} 
?>