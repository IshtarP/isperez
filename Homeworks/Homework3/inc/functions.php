<?php


 function randomQuestion($firstNum,$secondNum) {

    echo "<h2> What is $firstNum + $secondNum  ?</h2>";
 }


function displayOptions($firstNum,$secondNum){
 $r = rand(0,2);
  $result = "";
   for($i = 0; $i < 3; $i++)
     {
       if($i == $r) {
        $answer = $firstNum + $secondNum;
      $result .= "<input type=\"radio\" name=\"answer\"  value=\"$answer\"/> $answer <br/>";
       }
       else {
        
        $randomAnswer = rand(100,200);
           $result .= "<input type=\"radio\" name=\"answer\"  value=\"$randomAnswer\"/> $randomAnswer <br/>";
       }
     }
     
     return $result;
}


?>