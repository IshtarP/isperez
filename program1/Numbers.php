<?php


function contains($arr,$size,$target) {
    for($i = 0; $i < $size; $i++) {
        if($arr[$i] == $target) {
            return true;
        }
    }
    return false;
}


// Create 5 random numbers to be displayed
function numbers() {


// loop 5 times

$nums = array(0,0,0,0,0);
$size = 1;
$nums[0] = rand(1,69);
    for ($i =  1; $i < 5; $i++) {
        $num = rand(1,69);
        while(contains($nums,$size,$num)) {
            $num = rand(1,69);
        }
        
        $nums[$size] = $num;
        $size += 1;
    }
    
    for($i = 0; $i < 5; $i++) {
        echo " " . $nums[$i];
    }
    
    
}
/*for($i = 0; $i < 5; $i++ ) {
    echo " " , (rand(1,69));
    
    
    }
}*/
// Create 1 random Number
function oneNumber() {
    echo (rand(1,29));
   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lucky Numbers </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
           <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            h1, #num, #oneNum{
                text-align:center;
                font-size: 25px;
               
            }
            
            body {
                background-color: silver;
            }
            #box {
               
                text-align:center;
                padding:15px;
            }
           
            table{
                border-collapse: collapse;
                width: 50%;
                display:inline;
               
              
            }
            td, th {
                border: 1px solid black;
                text-align: center;
                padding: 8px;
                background-color:pink;
            }
           
            
            
        </style>
        
        <script>
                
                $(document).ready(function(){
                $("box").click(function(){
                //alert("The paragraph was clicked.");
            });
        });
        </script>
    </head>
        
    <body>
        <h1>Lucky Numbers</h1>
        
        <div id="num" >
        <table>
        <tr>
            <th>5 Random Numbers</th>
            <br><th> 1 Random Number</th>
            
        </tr>
        <!-- Create a table with 5 different set of random numbers -->
            <td><?php Numbers(); ?></td>
            <td><?php oneNumber(); ?></td>
        <tr>
            <td><?php Numbers(); ?></td>
            <td><?php oneNumber(); ?></td>
            
        </tr>  
        
        <tr>
            <td><?php Numbers(); ?></td>
            <td><?php oneNumber(); ?></td>
            
        </tr>
            <td><?php Numbers(); ?></td>
            <td><?php oneNumber(); ?></td>
            
        <tr>
            
        </tr>
            <td><?php Numbers(); ?></td>
            <td><?php oneNumber(); ?></td>
        
        <tr>
            
        </tr>
            
           
           
        
        <tr>

            
        </tr>
        </table>
        </div> 
        
    
        
        <form id="box">
             <button type="submit" class="btn btn-danger">New Numbers</button>
        </form>
        
    </body>
</html>