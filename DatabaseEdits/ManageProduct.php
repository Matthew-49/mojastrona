<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location: ../index.php");
}

if(!isset($_POST['id']) || !isset($_POST['edit'])){
    header("location: ../edytujprodukty.php");
} else {
    if($_POST['edit'] == "edit"){
        $_SESSION['DataFromProducts'] = true;
        $_SESSION['IdFromProducts'] = $_POST['id'];
        $_SESSION['Options'] = $_POST['edit'];
        header("location: ../edytujprodukty.php");
    } else if($_POST['edit'] == "editData") {
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

        if(strlen($id) == 0 || strlen($nazwa) == 0 || strlen($rozmiar) == 0 || strlen($producent) == 0 || strlen($dostepnosc) == 0 || strlen($cena) == 0 || strlen($typ) == 0 || strlen($opis) == 0){
            $_SESSION['EditSuccess'] = "1 lub więcej wartości są puste";
            header("location: ../edytujprodukty.php");
        } else {
            $connection = $con->query("UPDATE `produkt` SET `nazwa` = '$nazwa', rozmiar = '$rozmiar', producent = '$producent', dostepnosc = '$dostepnosc', cena = '$cena', typ = '$typ', opis = '$opis' WHERE `produkt`.`id` = $id;");
            $Amount = $con->affected_rows;
            if($Amount != -1){
                $_SESSION['EditSuccess'] = true;
                header("location: ../edytujprodukty.php");
            } else {
                $_SESSION['EditSuccess'] = "Błąd";
                header("location: ../edytujprodukty.php");
            }
        }
    }
}





