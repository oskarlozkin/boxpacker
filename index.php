<?php
// Если файл уже загружен, показываем ссылку
if (isset($_GET['link'])) {
    echo "Файл загружен! Ссылка для скачивания: <a href='download.php?file=" . htmlspecialchars($_GET['link']) . "'>СКАЧАТЬ</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Файлообменник с паролем</title>
</head>
<body>
    <h1>BoxPacker</h1>
    <h4>Pack your files to boxes for free!</h4>
    <h1>Загрузить файл</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required><br>
        <input type="text" name="login" placeholder="Логин (необязательно)"><br>
        <input type="password" name="password" placeholder="Пароль" required><br>
        <button type="submit">Загрузить</button>
    </form>
</body>
</html>