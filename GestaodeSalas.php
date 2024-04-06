<?php
/* Iniciando conexão com banco de dados */
include './backend/conexao.php';
include 'backend/listar_sala.php'; // Inclua o arquivo que busca as salas
//include 'backend/listar_eventos.php'; // Inclua o arquivo que busca os eventos
/* Iniciando sessão */
session_start();
/* Verificação de login | se não existe o redireciona a página de login */
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Administrativo - Sistema de Agendamentos </title>
    <!-- Required meta tags -->
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- FullCalendar CSS -->
    <link href='./css/core.css' rel='stylesheet'/>
    <link href='./css/daygrid.css' rel='stylesheet'/>
    <link href='./css/daygrid.css' rel='stylesheet'/>
    <link href='./css/list.css' rel='stylesheet'/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Formatação personalizada usando CSS -->
    <link href='./css/personalizado.css' rel='stylesheet'>
</head>

<body>
<!-- Embrulha os objetos do website para que interajam corretamente -->
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <!--                    <img id="logo" src="resources/" alt="logo">-->
            <br>
            <h3>Agendamento de espaços</h3>
            <br>
            <h2 style="font-weight: bold;"> Administrativo </h2>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="index_aut.php"><i class="fa fa-home"></i> Página Inicial</a>
            </li>
            <li>
                <a href="GestaodeSalas.php"><i class="fa fa-home"></i> Gerenciar Salas</a>
            </li>

            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-map"></i> Espaços</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="index_aut.php?cod=1"> Áreas para eventos/convenções</a>
                    </li>

                    <li>
                        <a href="index_aut.php?cod=2"> Áreas para esportes</a>
                    </li>

                    <li>
                        <a href="index_aut.php?cod=3"> Laboratórios</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="sobre.php"><i class="fas fa-info-circle"></i> Sobre</a>
            </li>

            <li id="logout">
                <a href="./backend/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <div class="container">
            <h1>Gestão de Salas de Reuniões</h1>
            <a href="criar_sala.php" class="btn btn-primary">Cadastrar Nova Sala</a>
            <div class="row">
                <div class="col-md-12">
                    <h2>Lista de Salas</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome da Sala</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Loop para listar as salas -->
                        <?php foreach ($salas as $sala): ?>
                            <tr>
                                <td><?php echo $sala['nome']; ?></td>
                                <td>     <?php
                                    if ($sala['status'] == 1) {
                                        echo 'Disponível';
                                    } else {
                                        echo 'Indisponível';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="backend/editar_sala.php?id=<?php echo $sala['id']; ?>"
                                       class="btn btn-primary">Editar</a>

                                    <button class="btn btn-danger"
                                            onclick="confirmarExclusao(<?php echo $sala['id']; ?>)">Excluir
                                    </button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--            <a href="index.html" class="'btn btn-primary">Voltar para Página Inicial</a>-->
        </div>
    </div>
</div>
</div>
<!-- FullCalendar Scripts -->
<script src='./js/core.js'></script>
<script src='./js/interaction.js'></script>
<script src='./js/daygrid.js'></script>
<script src='./js/timegrid.js'></script>
<script src='./js/list.js'></script>
<script src='./js/locales-all.js'></script>
<!-- JQuery Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Popper Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<!-- Bootstrap Script -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<!-- JQuerry Scroller Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- FontAwesome Scripts -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
<!-- Scripts personalizados -->
<script src="js/personalizado.js"></script>
<script>
    // Função para confirmar a exclusão da sala
    function confirmarExclusao(id) {
        if (confirm('Tem certeza que deseja excluir esta sala?')) {
            // Enviar uma solicitação AJAX para o backend para excluir a sala
            $.ajax({
                url: 'backend/excluir_sala.php',
                type: 'POST',
                data: {id: id},
                success: function (response) {
                    // Se a exclusão for bem-sucedida, recarregar a página para atualizar a lista de salas
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // Se houver um erro, exibir uma mensagem de erro
                    console.error(xhr.responseText);
                    alert('Erro ao excluir a sala. Por favor, tente novamente.');
                }
            });
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* Instruções javascript - carregamento personalizado do calendário */
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-br',
            plugins: ['interaction', 'dayGrid', 'list', 'timegrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listYear'
            },
            selectable: true,
            eventLimit: true,
            /* Filtragem da escolha de visualização dos eventos */
            <?php
            if (!isset($_GET['cod']) or $_GET['cod'] > 3)
            {
            ?>
            events: './backend/listar_eventos.php',
            <?php
            }elseif ($_GET['cod'] == 1)
            {
            ?>
            events: './backend/listar_eventos-1.php',
            <?php
            }elseif ($_GET['cod'] == 2)
            {
            ?>
            events: './backend/listar_eventos-2.php',
            <?php
            }elseif ($_GET['cod'] == 3)
            {
            ?>
            events: './backend/listar_eventos-3.php',
            <?php
            }
            ?>
            /* Tratamento de erros */
            extraParams: function () {
                return {
                    cachebuster: new Date().valueOf()
                };
            },
            /* Instruções javascript - tratamento e recebimento das informações do banco de dados do evento */
            select: function (info) {
                $('#cadastrar #start').val(info.start.toLocaleString());
                $('#cadastrar #end').val(info.end.toLocaleString());
                $('#cadastrar').modal('show');
            },
            eventClick: function (info) {
                info.jsEvent.preventDefault();
                $("#apagar_evento").attr("href", "./backend/deletar_evento.php?id=" + info.event.id);
                $('#visualizar #id').text(info.event.id);
                $('#visualizar #id').val(info.event.id);
                $('#visualizar #title').text(info.event.title);
                $('#visualizar #title').val(info.event.title);
                $('#visualizar #start').text(info.event.start.toLocaleString());
                $('#visualizar #start').val(info.event.start.toLocaleString());
                $('#visualizar #end').text(info.event.end.toLocaleString());
                $('#visualizar #end').val(info.event.end.toLocaleString());
                $('#visualizar #description').text(info.event.extendedProps.description);
                $('#visualizar #description').val(info.event.extendedProps.description);
                $('#visualizar #color').val(info.event.backgroundColor);
                $('#visualizar').modal('show');
            },
        });
        /* Renderização do calendario */
        calendar.render();
    });
</script>
</body>

</html>

<?php
/* Encerrando conexão com banco de dados */
mysqli_close($conn);
?>

