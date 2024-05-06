<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'classes.php';
    $cadastro = new Cadastro('localhost', 'vestibular.php', 'vestibular', 'fatec');
    
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    
    if ($cadastro->cadastrarCandidato($nome, $curso)) {
        echo "Candidato cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar candidato.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Candidato</title>
</head>
<body>
    <h1>Cadastrar Candidato</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome Completo:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="curso">Curso:</label><br>
        <select id="curso" name="curso">
            <option value="1">DSM</option>
            <option value="2">GE</option>
        </select><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
