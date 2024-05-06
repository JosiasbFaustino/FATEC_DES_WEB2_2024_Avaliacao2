<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Bem-vindo(a) à página inicial</h1>
    <a href="cadastrar.php">Cadastrar candidato</a>
    <a href="visualizar.php">Visualizar candidatos</a>
    <a href="logout.php">Logout</a>
</body>
</html>
