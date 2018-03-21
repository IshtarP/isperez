<?php

session_start(); // Starts the Session
$data = $_SESSION["customerInfo"];
$customerName = $data[0];
$address = $data[1];
$pizzaType = $data[2];
$pizzaSize = $data[3];
$crust = $data[4];
$comments = $data[5];

unset($_SESSION['customerInfo']);

?>

<html>
  <p>Thank you <?php echo $customerName ?> </p>
  <p>You ordered a <?php echo $pizzaSize . " " . $pizzaType . " with " . $crust . " crust"; ?></p>
  <p>Your pizza will be delivered to <?php echo $address . " in 20 to 30 minutes" ?> </p>
  <p><?php echo ($comments == '' ? '' : "We have taken notoe of the comment: " . $comments) ?> </p>
  <p></p>
  <a href="index.php">Click here for another order</a>
</html>