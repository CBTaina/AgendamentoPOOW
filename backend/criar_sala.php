<?php
include 'conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $nome = $_POST['nome'];
    $capacidade = $_POST['capacidade'];
    $recursos = $_POST['recursos_disponiveis']; // Novo atributo recursos
    $status = $_POST['status']; // Novo atributo status

    // Inserir no banco de dados
    $sql = "INSERT INTO salas (nome, capacidade, recursos_disponiveis, status) VALUES ('$nome', $capacidade, '$recursos', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "Sala criada com sucesso";
    } else {
        echo "Erro ao criar sala: " . $conn->error;
    }

    $conn->close();
} else {
    // Se o formulário não foi enviado, redirecione o usuário de volta para a página de cadastro de sala
    header("Location: gestaodesalas.php");
    exit;
}
?>
