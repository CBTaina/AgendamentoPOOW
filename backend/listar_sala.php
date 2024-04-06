<?php
include 'conexao.php';

$sql = "SELECT * FROM salas";
$resultado = $conn->query($sql);

$salas = array();
if ($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $salas[] = $row;
    }
}

//echo json_encode($salas);

//$conn->close();
?>
