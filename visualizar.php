<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

require_once 'classes.php';
$cadastro = new Cadastro('localhost', 'vestibular.php', 'vestibular', 'fatec');
$candidatos = $cadastro->lerTodosCandidatos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Candidatos</title>
</head>
<body>
    <h1>Candidatos Cadastrados</h1>
    <table border="1">
        <tr>
            <th>Nome Completo</th>
            <th>Curso</th>
        </tr>
        <?php foreach ($candidatos as $candidato): ?>
            <tr>
                <td><?php echo $candidato['nome']; ?></td>
                <td><?php echo ($candidato['curso'] == 1) ? 'DSM' : 'GE'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
