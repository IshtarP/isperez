<?php 
if (!empty($_GET)) { 
echo $_GET["make"]. "<br/>";
echo $_GET["model"] . "<br/>";
echo $_GET["condition"] . "<br/>";

} 
?>

<html>
    
     <head>
<link rel="stylesheet" type="text/css" href="./css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 

<body>
<?php
 
 include('./helper_functions.php');


?>    

 Make:
 <?php displaySelectMake() ?>



 Model:
<select name="model" id="model">
<option disabled selected value> -- select an option -- </option>


</select>


Condition: 
<select id='condition' name="condition">
<option disabled selected value> -- select an option -- </option>
  <option value="new">New</option>
  <option value="used">Used</option>

</select>

<button type="button" onclick="handleSubmit()">Search</button>

<div id="cars"></div>

</body>
<script>

function handleSubmit() {
    make = $('#make').val() === null ? '' :  $('#make').val();
    model = $('#model').val() === null ? '' :  $('#model').val();
    condition = $('#condition').val() === null ? '' : $('#condition').val() ;

    var param = {
        'make_id': make, 
        'model_id': model,
    
        'condition': condition
    
    };
     // ajax call
       $.ajax({url: "./getcars.php",data: param,success: function(result){
        

        $('#cars').empty();
        $('#cars').append(result);
            
        }});    

}


 $("#make").on("change",function(){
     
       car_id = $('#make').val();
       
       // ajax call
       $.ajax({url: "./getmodels.php?make_id=" + car_id, success: function(result){
        
        $('#model').empty();
        $('#model').append('<option disabled selected value> -- select an option -- </option>');
        for (var i=0; i<result.length; i++) {
            
            car_model = result[i];
            
            $('#model').append($('<option>', {
                value: car_model.model_id,
                text: car_model.model_name
            }));
        }           
            
        }});
  
  });  
</script>
</html>

