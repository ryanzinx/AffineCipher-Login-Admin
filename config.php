<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'affine_db';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
