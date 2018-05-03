<?php

function getDatabaseConnection($dbName) {

$host = "localhost"; /*mysql://bd39215d80e30b:c08f6a4f@us-cdbr-iron-east-05.cleardb.net/heroku_12e5c2b6117ae8a?reconnect=true*/
$dbname = $dbName;
$username = "root";
$password = "";

//checks whether the URL contains "herokuapp" (using Heroku)
if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $host = $url["host"];
   $dbname = substr($url["path"], 1);
   $username = $url["user"];
   $password = $url["pass"];
}

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

return $dbConn;

}



?>