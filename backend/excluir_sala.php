<?php
include 'conexao.php';

// Verificar se o ID da sala foi enviado via POST
if (isset($_POST['id'])) {
    // Receber o ID da sala
    $id = $_POST['id'];

    // Query para excluir a sala do banco de dados
    $sql = "DELETE FROM salas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Se a exclusão for bem-sucedida, retorne um status de sucesso
        http_response_code(200);
        exit;
    } else {
        // Se houver um erro, retorne um status de erro e uma mensagem de erro
        http_response_code(500);
        echo "Erro ao excluir a sala: " . $conn->error;
        exit;
    }
} else {
    // Se o ID da sala não foi enviado, retorne um status de erro
    http_response_code(400);
    echo "ID da sala não fornecido";
    exit;
}
?>
