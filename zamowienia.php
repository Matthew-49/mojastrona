<?php

    session_start();

    include 'Partials/Partials.php';
    $web = new Webpage;
    $web->ShowHeader();
?>
    <main role="main" class="container" >
        <?php
    global $host, $username, $password, $dbName, $conn;
    include_once "polacz.php";

    $query="SELECT p_ID, p_nazwa, p_rozmiar, p_producent, p_dostepnosc, p_cena, 
    p_typ, p_opis FROM produkt";

    

    $result = mysqli_query($conn,$query);

    ?>


    <?php
    
    if (mysqli_num_rows($result)>0){
        

        echo'<div class="table-responsive-sm ">';
        
        echo'<table class=" table table-striped table-bordered  table-sm" id="table" >';


        echo '<thead>';
        echo '<tr >';
        echo '<th>Nazwa</th>';
        echo '<th>Rozmiar</th>';
        echo '<th>Producent</th>';
        echo '<th>Dostępność</th>';
        echo '<th>Cena</th>';
        echo '<th>Typ</th>';
        echo '<th>Opis</th>';
        echo '<th>Ilość</th>';
        echo '<th>Dodaj do koszyka</th>';
        echo '</tr>';

            echo'<tbody >';
            while ($r=mysqli_fetch_assoc($result)){

                

                echo "<tr>";
           



                        echo "<td>".$r['p_nazwa']."</td>";

                        echo "<td>".$r['p_rozmiar']."</td>";

                        echo "<td>".$r['p_producent']."</td>";

                        echo "<td>".$r['p_dostepnosc']."</td>";

                        echo "<td>".$r['p_cena']."</td>";
                        
                        echo "<td>".$r['p_typ']."</td>";

                        echo "<td>".$r['p_opis']."</td>";
                        
                        echo "<td><input \"&amp;p_dostepnosc={$r['p_dostepnosc']}\"></td>";

                        echo "<td><button \"&amp;p_ID={$r['p_ID']}\" class='btn btn-dark btn-sm active ' role='button' aria-pressed='true'>wiecej</button> </td>";
      

                /* */
                

                echo "</tr>";

            }
            echo'</tbody>';
        echo'</table>';
      echo'</div>';
    }
    
    else{
        echo "Brak produktów.";
    };


    ?>
    
    </main>
<?php

$web->ShowStopka();

?>