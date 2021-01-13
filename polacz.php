<?php

$host='localhost';
$username= 'Virus299';
$password= 'Rosja11111';
$dbName= 'Mateusz';



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