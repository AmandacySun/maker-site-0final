<?php
//Group 9
//Sunnie Qu: chang.qu@vanderbilt.edu
//Chuyun Sun: chuyun.sun@vanderbilt.edu
//Chang Guo: chang.guo@vanderbilt.edu
//Homework 3


$servername = "127.0.0.1";
$username = "username";
$password = "password";
$dbname = "MakerSiteDB";


// Create connection
$conn = new mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection Failure Message: " . mysqli_connect_error());
}
echo "Connected successfully";

// Check tables
$test = "SHOW TABLES FROM $dbname";
$result = mysql_query($test);

// Show results
$count = 0;
while($table = mysql_fetch_array($result)) {
  $count+=1;
}

if (!$count) {
  echo "No tables in the database<br />\n";
} else {
  echo "There are $count tables<br />\n";
}