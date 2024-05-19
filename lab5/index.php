<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Головна сторінка</title>
</head>
<body>
    <h2>Вхід</h2>
    <form action="login.php" method="post">
        <label for="username">Логін:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Увійти">
    </form>
    <br>
    <a href="register.php">Реєстрація</a>
</body>
</html>
