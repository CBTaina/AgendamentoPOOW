<?php
/* FRED SERVER 
    $host = 'localhost';
    $user = 'root';
    $password = 'fred123456';
    $db_name = 'projetoDois';
    $port = 21022;
*/
/* SERVER LOCAL */
    $host = 'localhost';
    $user = 'root';
    $password = 'Rn94c1r)1i/fGf.0';
    $db_name = 'agendamentobd';
    $port = 3306;

    $conn = mysqli_connect($host, $user, $password, $db_name, $port);

    if (mysqli_connect_errno()) {
        printf("Falha de conexão: %s\n", mysqli_connect_error());
        exit();
    }
?>