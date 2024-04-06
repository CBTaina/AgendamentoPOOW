<?php
// Inclua o arquivo de conexão com o banco de dados e outras dependências, se necessário
include 'conexao.php';
include 'editar_sala.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $capacidade = $_POST['capacidade'];
    $recursos = $_POST['recursos'];
    $status = $_POST['status'];

    // Atualizar os dados da sala no banco de dados
    $sql = "UPDATE salas SET nome='$nome', capacidade=$capacidade, recursos='$recursos', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para a página de gestão de salas com uma mensagem de sucesso
        header("Location: editar_sala.php?message=success");
        exit();
    } else {
        // Se houver um erro, exibir uma mensagem de erro
        echo "Erro ao atualizar sala: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    // Se o formulário não foi submetido, redirecionar de volta para a página de gestão de salas
    header("Location: GestaodeSalas.php");
    exit();
}
?>
