<?php
include_once ('./conexion.php');

// Datos del formulario
$nombre = "Jardinera";
$categoria = "Enlatados";
$codigo = "655";
$rutaIMG = "";
$tipo = "entrada";
$cant = "150";
$fecha = date('Y-m-d');
$movimientoID = mt_rand(1, 999999);

$chequear_query = "SELECT movimiento_id FROM movimiento WHERE movimiento_id = '$movimientoID'";
$result = $conn->query($chequear_query);


if ($result->num_rows > 0) {
    // Si ya existe, genera uno nuevo o maneja la situación según tus necesidades.
    // Puedes usar el enfoque del bucle como se muestra en el primer ejemplo.
}

// Datos del Usuario
$email = "OTTO@gmail.com";

// Buscar el producto en la base de datos
$sql = "SELECT * FROM producto WHERE codigo = '$codigo'";
$resultado = $conn->query($sql);

if ($resultado->num_rows === 1){
    echo ("El producto existe");
    $sql = "INSERT INTO movimiento (tipo, cant, fecha_mov, movimiento_id) VALUES ('$tipo', '$cant', '$fecha', '$movimientoID');";
    $sql2 = "INSERT INTO tiene (user_email, movimiento_id) VALUES ('$email', '$movimientoID');";
    $sql3 = "INSERT INTO sufre (codigo, movimiento_id) VALUES ('$codigo', '$movimientoID');";
    if ($conn->query($sql) === TRUE){
        echo ("Elemento añadido con exito <br>");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo ("Añadiendo Producto <br>");
    $sql = "INSERT INTO producto (tipo, codigo, nombre_producto, rutaIMG) VALUES ('$tipo', '$codigo', '$nombre', '$rutaIMG');";
    $sql2 = "INSERT INTO posee (user_email, codigo) VALUES ('$email', '$codigo');";
    $sql3 = "INSERT INTO sufre (codigo, movimiento_id) VALUES ('$codigo', '$movimientoID');";
    $sql4 = "INSERT INTO movimiento (tipo, cant, fecha_mov, movimiento_id) VALUES ('$tipo', '$cant', '$fecha', '$movimientoID');";
    $sql5 = "INSERT INTO tiene (user_email, movimiento_id) VALUES ('$email', '$movimientoID');";
    if ($conn->query($sql) === TRUE) {
        echo ("Movimiento realizado correctamente");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>