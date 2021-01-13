<?php


if (isset($_POST['submit'])){

    $subject  = $_POST['temat'];
    $name = $_POST['name'];
    $mailfrom  = $_POST['email'];
    $message  = $_POST['message'];

    $mailTo = "mateuszczerwonka97@gmail.com";
    $headers = "Od: ".$mailfrom;
    $txt = "wiadomość od".$name.".\n\n" .$massage;


    mail($mailtTo, $subject, $txt, $headers);
    header("Location; kontakt.php?wysłanowiadomość");

}



?>