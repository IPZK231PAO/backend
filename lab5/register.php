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
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Будь ласка, заповніть всі поля.";
    } elseif ($password !== $confirm_password) {
        $error = "Паролі не співпадають.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Користувач з таким логіном вже існує.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password, email, first_name, last_name, birthdate, gender, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $username, $hashed_password, $email, $first_name, $last_name, $birthdate, $gender, $phone, $address);

            if ($stmt->execute()) {
                $success = "Реєстрація пройшла успішно. Тепер ви можете увійти.";
            } else {
                $error = "Сталася помилка. Спробуйте ще раз.";
            }
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
    <title>Реєстрація</title>
</head>
<body>
    <h2>Реєстрація</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form action="register.php" method="post">
        <label for="username">Логін:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="confirm_password">Підтвердіть пароль:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="first_name">Ім'я:</label>
        <input type="text" id="first_name" name="first_name"><br><br>
        <label for="last_name">Прізвище:</label>
        <input type="text" id="last_name" name="last_name"><br><br>
        <label for="birthdate">Дата народження:</label>
        <input type="date" id="birthdate" name="birthdate"><br><br>
        <label for="gender">Стать:</label>
        <select id="gender" name="gender">
            <option value="male">Чоловіча</option>
            <option value="female">Жіноча</option>
            <option value="other">Інша</option>
        </select><br><br>
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="address">Адреса:</label>
        <textarea id="address" name="address"></textarea><br><br>
        <input type="submit" value="Зареєструватись">
    </form>
</body>
</html>
