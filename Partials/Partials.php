<?php

class Webpage
{
    public function ShowHeader()
    {
        echo
        '
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta charset="utf-8" />
            <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <meta name="description" content="Web site created using create-react-app"/>
        
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            
            <link rel="stylesheet" href="style/style.css">
        
             <title>Hurtownia</title>
          </head>
          <body>
        ';
    }
    public function ShowNavLogged()
    {
        echo "
        
        ";
    }
    public function ShowNavNotLogged()
    {
        echo "
            <nav class=\"navbar navbar-expand-md navbar-dark bg-dark mb-4\">
                <div class=\"col text-white center mb-4 pt-3\"><h1>Hurtownia<h1></div>
            </nav>
        ";
    }
    public function ShowStopka()
    {

        echo "
        
        ";
    }
}
?>