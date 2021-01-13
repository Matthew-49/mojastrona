<?php

$host='localhost';
$username= 'root';
$password= '';
$dbName= 'inz';



$conn = new mysqli($host, $username, $password, $dbName);

if(!$conn)
{
	die('Błąd połączenia: '.mysql_error());
}
else
{
	//echo 'Połączenie nawiązano';
}
?>