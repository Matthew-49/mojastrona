<?php
session_start();
$error='';


// Turn off all error reporting
error_reporting(0);
if ($stmt->fetch()){
    $_SESSION['login']= $login;
    header("location: menu.php");
}

if (isset($_POST['submit'])){
    if(empty($_POST['login']) || empty($_POST['haslo'])){
        $error="Hasło lub login jest niepoprawne";
        header("location: logowanie.php");
    }
}
else{
$login= $_POST['login'];
$haslo= $_POST['haslo'];


$haslo=md5($haslo);

include_once "polacz.php";

$query="SELECT nazwa, haslo FROM user WHERE nazwa='' AND haslo=''";

$stmt= $conn->prepare($query);
$stmt-> bind_param("ss",$login,$haslo);
$stmt-> execute();
$stmt-> bind_result($login, $haslo);
$stmt-> store_result();

if ($stmt->fetch()){
    $_SESSION['login']= $login;
    header("location: menu.php");
}

mysqli_close($conn);
}
?>