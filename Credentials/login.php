<?php
session_start();

if(!isset($_POST['login']) || !isset($_POST['password']) || isset($_SESSION['username'])){
    header("location: ../index.php");
}

include("polacz.php");
$con = new mysqli($host, $username, $password, $dbName);

if(!$con) {
    die('Błąd połączenia: '.mysqli_connect_error());
}

$login = $_POST['login'];
$password = $_POST['password'];

if(strlen($_POST['password']) < 7) {
    $_SESSION['login'] = "Login lub hasło są niepoprawne";
    $con->close();
    header("location: ../logowanie.php");
} else {
    if(!preg_match("/^[a-zA-Z0-9_.]{4,15}$/", $_POST['login']) || strlen($_POST['login']) < 4 || strlen($_POST['login']) > 15) {
        $_SESSION['login'] = "Login lub hasło są niepoprawne";
        $con->close();
        header("location: ../logowanie.php");
    } else {
        $con->query("SELECT id FROM user WHERE nazwa='$login'");
        $Amount = $con->affected_rows;
        if($Amount == 0 || $Amount == "-1") {
            $_SESSION['login'] = "Login lub hasło są niepoprawne";
            $con->close();
            header("location: ../logowanie.php");
        } else {
            $connection = $con->query("SELECT id, haslo, role FROM user WHERE nazwa='$login'");
            $data = $connection->fetch_assoc();
            $id = $data['id'];
            $role = $data['role'];
            if(password_verify($password, $data['haslo'])) {
                $_SESSION['username'] = $login;
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $role;
                $_SESSION['LoggedIn'] = true;
                header("location: ../index.php");
            } else {
                $_SESSION['login'] = "Login lub hasło są niepoprawne";
                $con->close();
                header("location: ../logowanie.php");
            }
        }
    }
}