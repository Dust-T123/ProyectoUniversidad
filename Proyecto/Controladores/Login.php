<?php
$conn = new mysqli("localhost", "root", "", "UniversidadProyecto");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['Nombre'];
$contraseña = $_POST['Contraseña'];

$consulta = "SELECT Nombre, Contraseña FROM usuarios WHERE Nombre = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("s", $nombre);
$stmt->execute();
$resultado = $stmt->get_result();
if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($contraseña, $usuario['Contraseña'])) {
        header("Location: ../Vista/VistasHTML/Principal.html");
        exit();
    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conn->close();
?>