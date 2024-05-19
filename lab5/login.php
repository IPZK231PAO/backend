<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab5";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Будь ласка, заповніть всі поля.";
    } else {
        $sql = "SELECT id, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                header("Location: welcome.php");
                exit();
            } else {
                $error = "Невірний пароль.";
            }
        } else {
            $error = "Користувача не знайдено.";
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
    <h2>Вхід</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
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
