<?php
// Conectar ao banco de dados (substitua com suas próprias informações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contato_db";

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

// Inserir dados no banco de dados
$sql = "INSERT INTO formulario_contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

// Executar a consulta SQL e verificar se foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
