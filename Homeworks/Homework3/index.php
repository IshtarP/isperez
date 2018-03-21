<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = array($_POST["customer_name"], $_POST["address"], $_POST["pizzaType"],
                  $_POST["size"], $_POST["crust"], $_POST["comments"]);

    $msg = "";
    if(!isset($_POST["customer_name"]) || empty($_POST["customer_name"])) {
      $msg .= "Customer field cannot be empty<br>";
    }

    if(!isset($_POST["address"]) || empty($_POST["address"])) {
      $msg .= "Customer address field cannot be empty <br>";
    }

    if(!isset($_POST["pizzaType"]) || empty($_POST["pizzaType"])) {
      $msg .= "Pizza Type  field cannot be empty <br>";
    }

    if(!isset($_POST["size"]) || empty($_POST["size"])) {
      $msg .= "Size must be selected <br>";
    }

    if(!isset($_POST["crust"]) || empty($_POST["crust"])) {
      $msg .= "Crust must be selected <br>";
    }

    if($msg != "") {
      echo $msg;
    }
    else {
      //You need to redirect
      session_start();
       $_SESSION["customerInfo"] = $data;
      header("Location: process.php"); /* Redirect browser */

    }

}
?>



<html>
    <head>
        <title>Homework 3</title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
    </head>
   <body>
      <!--<center>-->
         <div id ="box">
         <h1>Ishtar's Pizzeria</h1>
      <!--</center>-->
      
      <form action="index.php" method="POST">
         <b>Customer name:</b><br>
         <input type="text" name="customer_name" value='<?php echo $data[0] ?>'  >
         <br><br>
         <b>Customer Address:</b><br>
         <input type="text" name="address" value='<?php echo $data[1] ?>'>
         <br><br>
         <b>Pizza Type</b><br>
         <input type="radio" name="pizzaType" value="pepperoni" <?php echo ($data[2]=='pepperoni')?'checked':'' ?>>Pepperoni<br>
         <input type="radio" name="pizzaType" value="combination" <?php echo ($data[2]=='combination')?'checked':'' ?> >Combination<br>
         <input type="radio" name="pizzaType" value="hawaiian" <?php echo ($data[2]=='hawaiian')?'checked':'' ?> >Hawaiin <br><br>
         <b>Pizza size</b><br>
         <input type="radio" name="size" value="small" <?php echo ($data[3]=='small')?'checked':'' ?> > Small<br>
         <input type="radio" name="size" value="medium" <?php echo ($data[3]=='medium')?'checked':'' ?> > Medium<br>
         <input type="radio" name="size" value="large" <?php echo ($data[3]=='large')?'checked':'' ?> > Large <br><br>
         <b>Crust type</b>
         <select name="crust">
            <option value="Normal">Normal</option>
            <option value="Thick">Thick</option>
            <option value="Thin">Thin</option>
         </select>
         <br><br>
         Comments (optional)<br>
         <textarea name="Comments"  rows="4" cols="50"><?php echo ($data[5] == '' ? '' : $data[5]) ?></textarea>

</textarea>
         <br>
         </select>
         <input type="submit" value="Submit">
      </form>
      </div>
      
      
     
   </body>
   
</html>

