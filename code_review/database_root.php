<?php
//Group 9
//Sunnie Qu: chang.qu@vanderbilt.edu
//Chuyun Sun: chuyun.sun@vanderbilt.edu
//Chang Guo: chang.guo@vanderbilt.edu
//Homework 3



$dbhost = '127.0.0.1';
$dbuname = 'root';
$dbpass = 'root';
$dbname = 'MakerSiteDB';


$dbo = new PDO('mysql:host=' . $dbhost . ';port=3306;dbname=' . $dbname, $dbuname, $dbpass);

?>
