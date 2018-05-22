<?php
include 'function2.php';

?>


<!DOCTYPE html>
<html>
    <head>
        <style>
            #box{
                text-align:center;
            }
        </style>
        <title>Program 2 </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </head>
    <body>
        <div id="box">
        <h1> Select Superhero:</h1>
        
        
        <!-- Dropdown Menu goes here -->
        <?php getSuperHeroes(); ?>
        
        <br>
        <!-- Search movies button goes here -->
        <button id="search"> Search Movies!</button>
        
        
        <!-- Search for movies goes here -->
        <span id="titles"></span><span id="posters"></span>
        
        
        
        
        
        <script>
            $(document).ready(function() {
                
                $("#search").click(function() {
                    
                    // Ajax call 
                    $.ajax({
                        
                        type: "GET",
                        url:"https://www.omdbapi.com/?s=thor&apikey=12215ee6",
                        dataType: "json",
                        data: { "search": $("#title").val() },
                        success: function(data,status) {
                            
                            
                            $("#titles").html(data.Title);
                            $("#posters").html(data.Poster);
                        }
                        
                        
                        
        
                    })
                    
                    
                }
                
            }
            
        </script>
        
        
        
        
        
        </div>
        <br>
        <br/>
        
        
        
        
        <br>
        
        
        
         <br>
        <br/>
        <br/>
         
   <table border="1" width="600" cellpadding="10">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The list of the superheroes in the dropdown menu is retrieved from the database (ordered alphabetically, no duplicates)<br></td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>When clicking on the "Search Movies" button, the OMDB API is used to display the list of movies (<strong>poster</strong> and <strong>title</strong>) for the superhero selected<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td> When clicking on the "Search Movies" button, the superhero selected is stored in a Session variable using AJAX<br></td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td> When clicking on the "See Search History" link, the superheroes whose movies have been searched are displayed within an iFrame</td>
      <td width="20" align="center">15</td>
    </tr>   
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td> When clicking on the "Superhero Details" button, an AJAX call is made to display all corresponding info (name, image, and pob)<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>When clicking on the "Superhero Details" button, the name and images of the superhero's enemies are displayed<br></td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>7</td>
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