<?php

$servername = "sql111.infinityfree.com";
$username = "if0_35536988";
$password = "L8C2cnxXhMiq";
$dbname = "if0_35536988_formulario_contato";

// Tentar realizar a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida!<br>";
}

// Receber dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO formulario_contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

// Executa a consulta SQL e verifica se foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
