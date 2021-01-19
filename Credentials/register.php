<?php

session_start();

if(isset($_SESSION['username'])){
    header("location: ../index.php");
}

include("polacz.php");
$con = new mysqli($host, $username, $password, $dbName);

if(!$con)
{
    die('Błąd połączenia: '.mysqli_connect_error());
}

    function TestData($con){
        if(!isset($_POST['login']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password2'])){
            echo "Data was not provided";
        } else {
            $_SESSION['loginData'] = $_POST['login'];
            $_SESSION['emailData'] = $_POST['email'];
            if(!preg_match("/^[a-zA-Z0-9_.]{4,15}$/", $_POST['login']) || strlen($_POST['login']) < 4 || strlen($_POST['login']) > 15){
                $_SESSION['login'] = "Login użytkownika musi mieć od 4 do 15 znaków i może zawierać jedynie znaki alfabetu łacińskiego oraz cyfry i znaki podkreślenia.";
                header("location: ../rejestracja.php");
            } else {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    if(strlen($_POST['password']) < 7){
                        $_SESSION['password'] = "Hasło jest zbyt któtkie. Minimalna długość hasła to 7 znaków";
                        header("location: ../rejestracja.php");
                    } else {
                        if($_POST['password'] != $_POST['password2']){
                            $_SESSION['password'] = "Hasła nie są jednakowe";
                            header("location: ../rejestracja.php");
                        } else {
                            $email = $_POST['email'];
                            $con->query("SELECT id FROM user WHERE email='$email'");
                            $Amount = $con->affected_rows;
                            if($Amount > 0){
                                $_SESSION['email'] = "Wygląda na to, że podany email jest już zarejestrowany.";
                                $con->close();
                                header("location: ../rejestracja.php");
                            } else {
                                require_once("polacz.php");
                                $login = $_POST['login'];
                                $con->query("SELECT id FROM user WHERE nazwa='$login'");
                                $Amount = $con->affected_rows;
                                if($Amount > 0) {
                                    $_SESSION['login'] = "Wygląda na to, że podany nick już istnieje. Wybierz inny.";
                                    $con->close();
                                    header("location: ../rejestracja.php");
                                } else {
                                    InsertData($con);
                                }
                            }
                        }
                    }
                } else {
                    $_SESSION['email'] = "Email jest błędny";
                    header("location: ../rejestracja.php");
                }
            }
        }
    }

    function InsertData($con){
        include("polacz.php");

        $login = $_POST['login'];
        $haslo = $_POST['password'];
        $email = $_POST['email'];

        $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

        $con->query("INSERT INTO user VALUES (NULL, '$login', '$haslo_hash', '$email')");

        if($con->affected_rows != "-1"){
            $con->close();
            $_SESSION['LoginDone'] = true;
            header('Location: ../logowanie.php');
        } else {
            $_SESSION['login'] = "Wygląda na to, że napotkaliśmy błąd z bazą danych. Przerszamy za utrudnienia";
            $con->close();
            header("location: ../rejestracja.php");
        }
    }

TestData($con);