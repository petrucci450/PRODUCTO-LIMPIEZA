<?php
// Conectarse a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "myDB";

$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

// Recibir los datos del formulario
$nombre_producto = $_POST["nombre_producto"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];

// Insertar los datos en la tabla "productos"
$sql = "INSERT INTO productos (nombre_producto, cantidad, precio)
VALUES ('$nombre_producto', '$cantidad', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
