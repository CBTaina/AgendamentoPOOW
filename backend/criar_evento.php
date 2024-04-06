<?php
/* Iniciando conexão com banco de dados */
require_once "conexao.php";
/* Iniciando sessão */
session_start();

/* Verificando se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Coleta os dados do evento enviado pelo formulário */
    $sala_id = $_POST['sala_id'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $description = $_POST['description'];

    /* Conversão - data/hora do formato brasileiro para o formato do Banco de Dados */
    $data_start_conv = date("Y-m-d H:i:s", strtotime($start));
    $data_end_conv = date("Y-m-d H:i:s", strtotime($end));

    /* Define o fuso horário para o fuso de Rio Branco - AC */
    date_default_timezone_set('America/Rio_branco');

    /* Tratamento de erro - impede horários iguais, data do fim do evento menor que a data de inicio e cria um evento para antes da data atual */
    if ($data_end_conv >= $data_start_conv && $data_start_conv >= date('Y-m-d H:i:s') && $data_end_conv >= date('Y-m-d H:i:s')) {
        /* Cria um statement de criação do MySQL, prepara para execução e atribui os parâmetros coletados no formulário corretamente */
        $query = "INSERT INTO events (title, color, start, end, description, status, dataCadastro, sala_id) VALUES (?, '#FFD700', ?, ?, ?, false, now(), ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $data_start_conv, $data_end_conv, $description, $sala_id);

        /* Executa o statement de criação do MySQL e emite um alerta na tela para função realizada com sucesso ou erro */
        if ($stmt->execute()) {
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Solicitação criada com sucesso! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro na criação da solicitação. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Erro na criação da solicitação. Início e fim não podem ser a mesma data e hora ou anteriores à data e hora atual. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

    /* Redireciona de volta para a página do formulário */
    header('Location: ../index.php');
} else {
    /* Se o formulário não foi submetido, redireciona para a página inicial */
    header('Location: ../index.php');
}

/* Encerrando conexão com banco de dados */
mysqli_close($conn);
?>
