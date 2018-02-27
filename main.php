<?php
/**
 * Created by PhpStorm.
 * User: n.lo piccolo
 * Date: 23/01/2018
 * Time: 11:50
 */
$usr = "root";
$pwd = "";
$servername = "localhost";
$dbname = "magazzino";
$con = null;
// Crea connessione
$con = @mysqli_connect($servername, $usr, $pwd, $dbname);

// Verifica connessione
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
} else {
    echo "Connessione effettuata<br>";
    // Variabile globale della connessione

}

function login($con,$usr){
    $sql = "SELECT * FROM user WHERE username LIKE  '".$usr."'";
    $result = mysqli_query($con, $sql);
// Verifica se la query è andata a buon fine
    if ($result->num_rows > 0) {
        controllo($result, $_POST['username'], $_POST['password']);
    } else {
        echo "<h1>utente non registrato</h1> " ;
        //mysqli_error()
    }
}


function controllo($result, $usr, $pwd)
{
    if ($result->num_rows > 0) {
        // stampo i dati che mi interessano da ogni riga
        while ($row = $result->fetch_assoc()) {
            if ($usr == $row["username"]&& $pwd ==  $row["password"]) {
                echo "<h1>Benvenuto ".$row['username']."</h1>";
            }
        }
    }
}

login($con,$_POST['username']);
