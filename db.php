<?php

$db = mysqli_connect('localhost', 'root', '', 'data_base');

if (!$db) {
    echo 'Ошибка: ' . mysqli_connect_errno() . ':' . mysqli_connect_error();
    return;
}

session_start();

?>