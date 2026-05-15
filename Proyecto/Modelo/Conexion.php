<?php
$conn = new mysqli("localhost", "root", "", "UniversidadProyecto");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>