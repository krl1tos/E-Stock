<?php

$servername = "localhost";
$usuarioBDD = "root";
$Contra = "";
$nomBDD = "estock";

// Create connection
$conn = new mysqli($servername, $usuarioBDD, $Contra, $nomBDD);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Todu Bem";


?>