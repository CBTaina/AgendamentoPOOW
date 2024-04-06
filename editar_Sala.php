<?php
include 'backend/editar_sala.php'; // Inclua o arquivo que busca as salas

// Restante do código...
//?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
</head>
<body>

<h1>Editar Sala</h1>

<form action="backend/editar_sala.php" method="post">
    <input type="hidden" name="id" value="<?php echo $sala['id']; ?>">

    <label for="nome">Nome da Sala:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $sala['nome']; ?>" required><br>

    <label for="capacidade">Capacidade:</label><br>
    <input type="number" id="capacidade" name="capacidade" value="<?php echo $sala['capacidade']; ?>" required><br>

    <label for="recursos">Recursos Disponíveis:</label><br>
    <textarea id="recursos" name="recursos" rows="4" cols="50"><?php echo $sala['recursos']; ?></textarea><br>

    <label for="status">Status:</label><br>
    <select id="status" name="status">
        <option value="disponivel" <?php if ($sala['status'] == 'disponivel') echo 'selected'; ?>>Disponível</option>
        <option value="ocupada" <?php if ($sala['status'] == 'ocupada') echo 'selected'; ?>>Ocupada</option>
    </select><br>

    <input type="submit" value="Salvar Alterações">
</form>

</body>
</html>
