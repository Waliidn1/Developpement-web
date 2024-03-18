<?php 

$mysqli = new mysqli('localhost', 'root', '', 'dataweb');

if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

?>