

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
            @import url(css/styles.css);
        </style>
    </head>
    <body id="box">

        <h1> OtterMart - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            <strong class="big">Username</strong>: <input type="text" name="username"/> <br />
            <strong class="big">Password</strong>: <input type="password" name="password"/> <br />
            
            <input type="submit" name="submitForm" value="Login!" />
            
        </form>

    </body>
</html>