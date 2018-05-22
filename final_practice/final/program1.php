<?php

include 'functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            #align{
                text-align:center;
            }
            #errorMessage {
                background-color:pink;
                font-size:30px;
            }
            
        </style>
        <title> Final </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        
    </head>
    <body>
        
        <div id="align">
        <h1> Superhero Quiz</h1>
        
        <!-- Question goes here -->
        <h3> What is the real name of the following superhero? </h3>
        
        <br>
        <br/>
        
        <!-- Random image goes here 
        Image:
        
        
        <!-- Dropdown Menu goes here -->
        
        Dropdown Menu:
        <?php getNames(); ?>
        
        <button id="checkAnswer"> Check Answer</button>
        
        <br>
        <br/>
        
        <div id="correct"></div>
        
        
        <div id="errorMessage"></div>
        
        </div>
        
        <script>
            
            // Error message displays if the user click on the button witout selecting anything.
            
            $(document).ready(function() {
                
                $("#checkAnswer").click(function() {
                    
                    if($("#checkAnswer").val() === "") {
                        
                        
                        $("#errorMessage").html("Please select a name!");
                        return;
                    
                    } 
                    
                    

                var correctly;
                var incorrectly;
                
             // ajax request

                
                
                $.ajax({url: "functions.php", data :  data,success: function(result){
                    lastScore = result.lastScore == -1 ? "NA" : parseInt(result.lastScore);
                    attemps = parseInt(result.attemps);
                    $("#correct").html(lastScore);
                    $("#incorrect").html(attemps);
                    
                    
                   
                
                
                
                
                        
                        
                }
                
                
                // update the records
                  $.ajax({url: "updateQuiz.php", data :  data,success: function(result){
                    

                     }});


                }});
       
                    
                })
                
                
                
              
                
                
            }) 
            
                    
                    
                })
                
                
            })
            
            
        </script>
        
        
        
        
        
        
           
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:#99E999">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
        

    </body>
</html>