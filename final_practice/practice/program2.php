

<!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                text-align:center;
            }
            
            #answer1 {
                display:inline;
                color:red;
            }
            
            #answer2 {
                display:inline;
                color:red;
            }
            
            #attempScore, #lastAttemptScore, #numberOfAttempts{
                color:red;
            }
            
            
            
            
            
        </style>
        <title>Program 2 </title>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         
        
        
        
    </head>
    <body>
        
        <h1> Online Quiz</h1>
        
        <!-- Email display here -->
        Email: <input id="email" type="text">

        
        <br>
        <br/>
        
        <!-- Question 1 goes here -->
        Question 1:  What is 2 + 2?
        
        <input id="q1" type="text">
        
        <div id="answer1"></div>
        
        <br>
        <br/>
        
      

        <!-- Question 2 goes here -->
        Question 2: What is 10 x 10?
        
        <input id="q2" type="text">
        
        <div id="answer2"></div>
        <br>
        <br/>
        
        
        
        
        Attemps Score:
         
        <span id="attempScore"></span>
        
        
        Last Attempt Score:
        
        <span id="lastAttemptScore"></span>
        
        Number of attempts: 
        
        <span id="numberOfAttempts"></span>
        
         
        
        
        <!-- Submit button goes here -->
        <button id="yeet" type="button"> Submit Quiz </button>
        
        <br>
        
        
        
        
    <script>
            
            $(document).ready( function() { 
                

                $("#yeet").click( function(){
                    
                if($("#email").val() === '') {
                    return;
                }
          
                    var score = 0;

                var lastScore;
                var attemps;
             // ajax request
                var data = {
                    'email' : $("#email").val(),
                    
                }
                
                $.ajax({url: "updateQuiz.php", data :  data,success: function(result){
                    lastScore = result.lastScore == -1 ? "NA" : parseInt(result.lastScore);
                    attemps = parseInt(result.attemps);
                    $("#lastAttemptScore").html(lastScore);
                    $("#numberOfAttempts").html(attemps);
                    
                    
                   
                
                
                
                
                    if( $("#q1").val() == "4") {
                        
                        $("#answer1").html("Correct");
                        
                        score += 5;
                    } else {
                        
                        $("#answer1").html("Incorrect");
                        
                        
                    }
                    
                    if($("#q2").val() == "100") {
                        
                        $("#answer2").html("Correct");
                        score += 5;
                        
                    } else {
                        
                        $("#answer2").html("Incorrect");
                    }
                    
                    
                    $("#attempScore").html(score);
                
                
                       data = {
                    'email' : $("#email").val(),
                    'lastScore' : score,
                    'attemps' : attemps + 1
                }
                
                
                // update the records
                  $.ajax({url: "updateQuiz.php", data :  data,success: function(result){
                    

                     }});


                }});
       
                    
                })
                
                
                
              
                
                
            }) 
            
           
            
            
            
            
            
            
        </script>   
        
    
     <br>
     <br/>
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The HTML form is properly created, including all elements</td>
      <td width="20" align="center">5</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td> Feedback per question (correct/incorrect) is displayed using jQuery, when submitting the quiz</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>The current attempt score is displayed when the quiz is submitted, using Javascript/jQuery</td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td>An AJAX call inserts/updates a record in the database, storing the last score and the number of attempts</td>
       <td align="center">15</td>
     </tr>
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The Previous Attempt Score is properly displayed next to the Current Attempt Score</td>
      <td width="20" align="center">15</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>The Total Number of Attempts is properly displayed</td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    



    </body>
</html>