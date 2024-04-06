<?php
include 'conexao.php';

// Receber dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$capacidade = $_POST['capacidade'];
// Outros dados, se houver

// Atualizar no banco de dados
$sql = "UPDATE salas SET nome='$nome', capacidade=$capacidade WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Sala atualizada com sucesso";
} else {
    echo "Erro ao atualizar sala: " . $conn->error;
}

$conn->close();
?>
