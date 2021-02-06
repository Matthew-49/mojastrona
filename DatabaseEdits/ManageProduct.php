<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location: ../index.php");
}

if(!isset($_POST['edit'])){
    header("location: ../index.php");
} else if(!isset($_POST['id'])){
     if($_POST['edit'] == 'addData'){
        AddData();
    }
} else {
    if($_POST['edit'] == "edit"){
        $_SESSION['DataFromProducts'] = true;
        $_SESSION['IdFromProducts'] = $_POST['id'];
        $_SESSION['Options'] = $_POST['edit'];
        header("location: ../edytujprodukty.php");
    } else if($_POST['edit'] == "editData"){
        EditFile();
    }
}

function EditFile(){
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $id = $_POST['id'];
    $nazwa = $_POST['nazwa'];
    $rozmiar = $_POST['rozmiar'];
    $producent = $_POST['producent'];
    $dostepnosc = $_POST['dostepnosc'];
    $cena = $_POST['cena'];
    $typ = $_POST['typ'];
    $opis = $_POST['opis'];

    $con->query("UPDATE `produkt` SET `nazwa` = '$nazwa', rozmiar = '$rozmiar', producent = '$producent', dostepnosc = '$dostepnosc', cena = '$cena', typ = '$typ', opis = '$opis' WHERE `produkt`.`id` = $id");
    $_SESSION['EditSuccess'] = "Produkt zaktualizowany";
    $con->close();
    header("location: ../edytujprodukty.php");
}

function AddData(){
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);
    if(!$con) {
        die('Błąd połączenia: '.mysqli_connect_error());
    }

    $nazwa = $_POST['nazwa'];
    $rozmiar = $_POST['rozmiar'];
    $producent = $_POST['producent'];
    $dostepnosc = $_POST['dostepnosc'];
    $cena = $_POST['cena'];
    $typ = $_POST['typ'];
    $opis = $_POST['opis'];

    $con->query("INSERT INTO `produkt` VALUES (null, '$nazwa', '$rozmiar', '$producent', '$dostepnosc', '$cena', '$typ', '$opis')");

    if($con->affected_rows != "-1"){
        $_SESSION['EditSuccess'] = "Produkt dodany";
        $con->close();
        header("location: ../edytujprodukty.php");
    } else {
        $_SESSION['EditSuccess'] = "Błąd";
        $con->close();
        header("location: ../edytujprodukty.php");
    }
}