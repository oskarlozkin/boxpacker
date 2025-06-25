<?php
$uploadDir = 'files/';
$passwordsDir = 'passwords/';

// Проверяем, передан ли файл и пароль
if (!isset($_GET['file']) || !isset($_POST['password'])) {
    die("Файл или пароль не указаны!");
}

$filename = basename($_GET['file']);
$filepath = $uploadDir . $filename;
$passwordFile = $passwordsDir . $filename . '.pass';

// Проверяем, существует ли файл и его пароль
if (!file_exists($filepath) || !file_exists($passwordFile)) {
    die("Файл не найден или пароль не установлен!");
}

// Проверяем пароль
$passwordHash = file_get_contents($passwordFile);
$inputHash = hash('sha256', $_POST['password']);

if ($inputHash === $passwordHash) {
    // Отдаём файл на скачивание
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    readfile($filepath);
} else {
    die("Неверный пароль!");
}
?>