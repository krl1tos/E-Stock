<?php

include_once ("./conn.php");

$datosProducto = file_get_contents('php://input');
$datosjson = json_decode("$datosProducto");

// Datos del formulario
$nombre = $datosjson->nombre;
$categoria = $datosjson->tipo;
$codProdNuevo = "0";
$rutaIMG = $datosjson->rutaimg;
$tipoM = $datosjson->TipoMov;
$cant = $datosjson->cantidad;
$fecha = date('Y-m-d');

// Datos del Usuario
$email = "OTTO@gmail.com";

$sql = "SELECT count(*) as conteo FROM producto WHERE codigo=?";
$sentencia = $conn->prepare($sql);
$sentencia->bind_param("i",$codigo);
$sentencia->execute();

$resultado = $sentencia->get_result();


if ($resultado->num_rows > 0) {
    $cantProds = 0;
    foreach($resultadoBD as $fila){
        $cantProds = $fila["conteo"];
    }

    if ($cantProds > 0) {
        // Si el producto existe, actualizar el stock

        //$query = "CALL agregarMovimiento('$tipoM', '$cant', '$fecha', '$email', '$codigo');";
        
        $resultado = movimientoAgregar($conn, $tipoM, $cant, $fecha, $email, $codigo);

        if ($resultado > 0){
            echo "Movimiento agregado";
        } else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }   
    } else {
        // Si el producto no existe lo crea y agrega un movimiento
        $codProdNuevo = productoAgregar($conn, $categoria, $nombre, $rutaIMG);

        if ($resultado > 0){
            echo "Producto Agregado";
        } else{
            echo "Error: " . $query . "<br>" . $conn->error;
        }
        
    }
    
} else {
                                                           
}


$conn->close();





//Funciones

function movimientoAgregar($conn, $tipoM, $cant, $fecha, $email, $codigo){

    $res = 0;
    $query = "CALL agregarMovimiento(?, ?, ?, ?, ?);";
        $sentencia2 = $conn->prepare($query);
        $sentencia2->bind_param("sissi", "$tipoM", "$cant", "$fecha", "$email", "$codigo");
        $sentencia2->execute();
        $resultado = $sentencia2->get_result();        
    $res = $resultado->num_rows;
    return $res;
}

function productoAgregar($conn, $categoria, $nombre, $rutaIMG, $email){

    $res = 0;
    $query = "CALL agregarProducto(?, ?, ?, ?);";
    $sentencia3 = $conn->prepare($query);
    $sentencia3->bind_param("ssss", "$categoria", "$nombre", "$rutaIMG", "$email");
    $sentencia3->execute();
    $resultado = $sentencia3->get_result();
    
    if ($resultado->num_rows > 0) {
        
        foreach($resultadoBD as $fila){
            $res = $fila["codigo"];
        }
    }
    return $res;
}
?>