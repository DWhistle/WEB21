<?php
$link = mysqli_connect('192.168.99.100', "root", "test");
mysqli_query($link, "CREATE DATABASE IF NOT EXISTS shop");
$link = mysqli_connect('192.168.99.100', "root", "test", "shop");
$user = mysqli_query($link, "CREATE TABLE IF NOT EXISTS user(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name CHAR(255) NOT NULL,
passwd VARCHAR(255) NOT NULL,
per INT(11) NOT NULL,
phone TEXT,
mail TEXT,
Address TEXT
)");
$passwd = hash('Whirlpool', 1);
mysqli_query($link,"INSERT INTO `user` IF NOT EXISTS (`id`, `name`, `passwd`, `per`, `phone`, `mail`, `address`) VALUES
    (NULL, 'root', '$passwd', '2', '', '', '')");
$category = mysqli_query($link, "CREATE TABLE IF NOT EXISTS category(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL
)");
$product = mysqli_query($link, "CREATE TABLE IF NOT EXISTS product(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
img TEXT NOT NULL,
desck TEXT NOT NULL,
price INT(11) NOT NULL,
name VARCHAR(255) NOT NULL,
category INT(11) NOT NULL
)");
?>