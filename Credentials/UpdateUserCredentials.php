<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

if (!isset($_POST['miejscowosc']) || !isset($_POST['street']) || !isset($_POST['buildingnumber']) || !isset($_POST['postcode'])) {
    header("location: ../profil.php");
} else {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);

    $id = $_SESSION['id'];
    $city = $_POST['miejscowosc'];
    $street = $_POST['street'];
    $number = $_POST['buildingnumber'];
    $postcode = $_POST['postcode'];

    $con->query("SELECT id FROM zamowieniaAddons WHERE userid='$id'");
    print_r($con);
    $Amount = $con->affected_rows;
    $query = '';
    if ($Amount > 0){
        $query = "Update `zamowieniaAddons` SET `miejscowosc` = '$city', street = '$street', buildingnumber = '$number', postcode = '$postcode' where userid = $id";
    } else {
        $query = "INSERT INTO zamowieniaAddons VALUES (null, '$id', '$city', '$street', '$number', '$postcode')";
    }

    $con->query($query);
    print_r($con);
    echo "Banana";
    if ($con->affected_rows != "-1") {
        $con->close();
        header('Location: ../profil.php');
    } else {
        $con->close();
        header("location: ../profil.php");
    }
}