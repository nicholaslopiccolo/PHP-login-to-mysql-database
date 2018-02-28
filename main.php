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
}

function login($con,$usr,$pwd){
    $sql = "SELECT * FROM user WHERE username LIKE  '".$usr."' "."AND password LIKE '".$pwd."'";
    $result = mysqli_query($con, $sql);

// Verifica se la query è andata a buon fine
    if ($result->num_rows > 0) {
        echo "ok";
    } else {
        echo "utente non registrato" ;
        //mysqli_error()
    }
}

login($con,$_POST['username'],$_POST['password']);
