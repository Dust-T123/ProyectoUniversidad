<?php
$conn = new mysqli("localhost", "root", "", "UniversidadProyecto");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST["Nombre"] ??'';
$contraseña = $_POST["Contraseña"] ??'';
$correo = $_POST['Correo'] ??'';
$telefono = $_POST['Telefono'] ??'';
$direccion = $_POST['Direccion'] ??'';
$FechaNacimiento = $_POST['FechaNacimiento'] ??'';
$edad = $_POST['Edad'] ??'';
$rol = $_POST['Rol'] ??'';

$hash = password_hash($contraseña, PASSWORD_DEFAULT);
$sql = "INSERT INTO Usuarios(Nombre, Contraseña, Correo, Telefono, Direccion, FechaNacimiento, Edad, Rol) VALUES ('$nombre', '$hash', '$correo', '$telefono', '$direccion', '$FechaNacimiento', '$edad', '$rol')";
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
    echo "<br><br><a style='background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration:none;' href='Login.html'>Iniciar Sesion</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>