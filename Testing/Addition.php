
<!DOCTYPE html>
<html>
    
    <head>
        <style>
            @import url("css/styles.css");
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title> Add Numbers </title>
        
        
        <script>
            
            $(document).ready( function() {
                
                
                $("button").click( function () {
                    
                    
                    if( $("#number1").val() === "" || ( $("#number2").val() === "") ) {
                        
                        $("#error").html("Enter a number please");
                        
                        
                    } else {
                        
                        var a = parseInt( $("#number1").val());
                        var b = parseInt( $("#number2").val());
                        var result = a + b;
                        
                        $("#result").html(result);
                    }
                    
                    
                })
                
                $("#sub").click( function()  {
                    
                        var a = parseInt( $("#number1").val());
                        var b = parseInt( $("#number2").val());
                        var result = a - b;
                        
                        $("#result").html(result);
                    
                    
                })
                
                $("#mul").click( function() {
                    
                    var a = parseInt( $("#number1").val());
                    var b = parseInt( $("#number2").val());
                    var result = a * b;
                    
                    $("#result").html(result);
                    
                 
                })
                
                $("#div").click( function() {
                    
                    var a = parseInt( $("#number1").val());
                    var b = parseInt( $("#number2").val());
                    var result = a / b;
                    
                    $("#result").html(result);
                })
            })
            
            
        </script>
    </head>
    <body>
        
            
        <h1> Numbers </h1>
        
        
        <div id="inputs">
        Enter a number:
        <input id="number1" type="text"></span>
        
        <br>
        <br/>
        
        Enter a second number:
        <input id="number2" type="text"></span>
        
        <br>
        <br/>
        
        Result: <span id="result"></span>
        <br>
        <br/>
        
        <button type="submit" name="add">Add</button><br>
        <button id="sub" type="submit" name="subtraction">Subtraction</button><br>
        <button id="mul" type="submit" name="multiplication">Multiplication</button><br>
        <button id="div" type="submit" name="division">Division</button>
        
        <br>
        
        <span id="error"></span>
        
        
        </div>
        
        
        
            
            
       
        
        

    </body>
</html>