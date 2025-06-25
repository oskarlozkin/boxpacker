<?php
// Папки для хранения файлов и паролей
$uploadDir = 'files/';
$passwordsDir = 'passwords/';

// Создаём папки, если их нет
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
if (!is_dir($passwordsDir)) mkdir($passwordsDir, 0755, true);

// Получаем данные из формы
$file = $_FILES['file'];
$login = $_POST['login'] ?? 'default';
$password = $_POST['password'];

// Генерируем уникальное имя файла
$filename = uniqid() . '_' . basename($file['name']);
$filepath = $uploadDir . $filename;

// Сохраняем файл
if (move_uploaded_file($file['tmp_name'], $filepath)) {
    // Сохраняем пароль в виде хеша (sha256)
    $passwordHash = hash('sha256', $password);
    file_put_contents($passwordsDir . $filename . '.pass', $passwordHash);

    // Перенаправляем на страницу с ссылкой
    header("Location: index.php?link=" . urlencode($filename));
} else {
    die("Ошибка загрузки файла!");
}
?>