<?php

include_once ("./conn.php");


// Datos del formulario
$nombre = "Jardinera";
$categoria = "Enlatados";
$codigo = "1";
$rutaIMG = "";
$tipoM = "entrada";
$cant = "150";
$fecha = date('Y-m-d');

// Datos del Usuario
$email = "OTTO@gmail.com";

$sql = "SELECT codigo FROM producto";
$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {
    // Si el producto existe, actualizar el stock
    $query = "CALL agregarMovimiento('$tipoM', '$cant', '$fecha', '$email', '$codigo');";
    
    if ($conn->query($query) === TRUE){
        echo "Movimiento agregado";
    } else{
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    // Si el producto no existe lo crea y agrega un movimiento
    $query = "CALL agregarProducto('$categoria', '$nombre', '$rutaIMG', '$email');";
    
    if ($conn->query($query) === TRUE){
        echo "Producto Agregado";
    } else{
        echo "Error: " . $query . "<br>" . $conn->error;
    }                                                       
}







/* switch(true) {
    case ($resultado->num_rows === 1):
        echo ("El producto existe<br>");
        $sql = "INSERT INTO movimiento (tipo, cant, fecha_mov, movimiento_id) VALUES ('$tipo', '$cant', '$fecha', '$movimientoID');";
        $sql2 = "INSERT INTO tiene (user_email, movimiento_id) VALUES ('$email', '$movimientoID');";
        $sql3 = "INSERT INTO sufre (codigo, movimiento_id) VALUES ('$codigo', '$movimientoID');";
        
        $queries = array($sql, $sql2, $sql3);

        $results = array();
        foreach ($queries as $query) {
            try {
                $result = $conn->query($query);
                
                $results[] = array(
                    'query' => $query,
                    'num_rows' => $result->num_rows,
                    'rows' => $result->fetch_all(MYSQLI_ASSOC)
                );
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "<br>";
            } 
            
        }
       
        foreach ($results as $result) {
            echo "Numero de filas afectadas: " . $result['num_rows'];
        }
        

        break; 

    default:
        echo ("Añadiendo Producto <br>");
        $sql = "INSERT INTO producto (tipo, codigo, nombre_producto, rutaIMG) VALUES ('$tipo', '$codigo', '$nombre', '$rutaIMG');";
        $sql2 = "INSERT INTO posee (user_email, codigo) VALUES ('$email', '$codigo');";
        $sql3 = "INSERT INTO sufre (codigo, movimiento_id) VALUES ('$codigo', '$movimientoID');";
        $sql4 = "INSERT INTO movimiento (tipo, cant, fecha_mov, movimiento_id) VALUES ('$tipo', '$cant', '$fecha', '$movimientoID');";
        $sql5 = "INSERT INTO tiene (user_email, movimiento_id) VALUES ('$email', '$movimientoID');";
        
        $queries = array($sql, $sql2, $sql3, $sql4, $sql5);
        
        $results = array();
        foreach ($queries as $query) {
            try {
                $result = $conn->query($query);
                $results[] = array(
                    'query' => $query,
                    'num_rows' => $result->num_rows,
                    'rows' => $result->fetch_all(MYSQLI_ASSOC)
                );
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "<br>";
            }
        }

        /*if ($conn->query() === TRUE) {
            echo ("Elemento añadido con exito <br>");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
        break;
} */

$conn->close();

?>