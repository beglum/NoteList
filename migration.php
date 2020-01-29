<?php
    require_once 'app/config.php';

    // Инициализируем MySQLi подключение
    $mysqli = new mysqli($host, $user, $password);

    // Создаем базу данных, с которой будем работать
    $mysqli->query("CREATE DATABASE IF NOT EXISTS notes CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;");
    $mysqli->select_db('notes');

    // Создаем таблицу записей
    $sql_create_table = "CREATE TABLE `note_list` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `description` TEXT NOT NULL,
        `username` VARCHAR(50) NOT NULL,
        `email` VARCHAR(50) NOT NULL,
        `status` BIT NOT NULL DEFAULT 0,
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(), 
    PRIMARY KEY (`id`),
        INDEX `id` (`id`)
    )";
    $mysqli->query($sql_create_table);

    // Создаем таблицу администраторов
    $sql_create_table = "CREATE TABLE `administrators` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50) NOT NULL,
        `password` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id`),
        INDEX `id` (`id`)
    )";
    $mysqli->query($sql_create_table);

    // Создаем первого администратора
    $mysqli->query("INSERT INTO `administrators` (`username`, `password`) VALUES ('admin', '". md5('123') ."')");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Готовченко. Теперь можно перейти на <a href="/">главную страницу</a></h2>
</body>
</html>