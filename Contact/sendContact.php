<?php

session_start();

if(isset($_SESSION['username'])){
    header("location: ../index.php");
}

if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['topic']) || !isset($_POST['question'])){
    $_SESSION['kontakt'] = "1 lub więcej wartości nie została podana";
    header("location: ../kontakt.php");
} else {
    include("../Credentials/polacz.php");
    $con = new mysqli($host, $username, $password, $dbName);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $question = $_POST['question'];

    $con->query("INSERT INTO contactData VALUES (NULL, '$name', '$email', '$topic', '$question', DEFAULT)");
    if($con->affected_rows != "-1"){
        $con->close();
        $_SESSION['ContactSuccess'] = true;
        header('Location: ../index.php');
    } else {
        print_r($con);
        $con->close();
        $_SESSION['kontakt'] = "Wygląda na to, że napotkaliśmy na błąd bazy danych, za utrudnienia przepraszamy";
        header("location: ../kontakt.php");
    }
}
?>



