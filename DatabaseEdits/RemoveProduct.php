<?php

session_start();

if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}

if(!isset($_POST['id'])){
    header("location: ../edytujprodukty.php");
} else {
    RemoveItem();
}

function RemoveItem() {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $id = $_POST['id'];

    $con->query("DELETE FROM `produkt` WHERE id = $id");

    if($con->affected_rows != "-1"){
        $con->close();
        header("location: ../edytujprodukty.php");
    } else {
        $con->close();
        header("location: ../edytujprodukty.php");
    }
}