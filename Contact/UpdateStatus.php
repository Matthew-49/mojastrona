<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin'){
    header("location: ../index.php");
}

if (!isset($_POST['answered']) || !isset($_POST['id'])) {
    $_SESSION['kontakt'] = "1 lub więcej wartości nie została podana";
    header("location: ../kontakt.php");
} else {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);

    $answered = $_POST['answered'];
    $id = $_POST['id'];

    $con->query("UPDATE `contactData` SET `answered` = !$answered where id = $id");
    if ($con->affected_rows != "-1") {
        $con->close();
        header('Location: ../kontakt.php');
    } else {
        $con->close();
        $_SESSION['kontakt'] = "Wygląda na to, że napotkaliśmy błąd bazy danych. Za utrudnienia, przepraszamy";
        header("location: ../kontakt.php");
    }
}