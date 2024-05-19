<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab5";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET email=?, first_name=?, last_name=?, birthdate=?, gender=?, phone=?, address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $email, $first_name, $last_name, $birthdate, $gender, $phone, $address, $user_id);

    if ($stmt->execute()) {
        $success = "Дані успішно оновлено.";
    } else {
        $error = "Сталася помилка. Спробуйте ще раз.";
    }
    $stmt->close();
}

$sql = "SELECT username, email, first_name, last_name, birthdate, gender, phone, address FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $first_name, $last_name, $birthdate, $gender, $phone, $address);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вітаємо</title>
</head>
<body>
    <h2>Вітаємо, <?php echo htmlspecialchars($username); ?>!</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php endif; ?>
    <form action="welcome.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <label for="first_name">Ім'я:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"><br><br>
        <label for="last_name">Прізвище:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"><br><br>
        <label for="birthdate">Дата народження:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>"><br><br>
        <label for="gender">Стать:</label>
        <select id="gender" name="gender">
            <option value="male" <?php echo $gender == 'male' ? 'selected' : ''; ?>>Чоловіча</option>
            <option value="female" <?php echo $gender == 'female' ? 'selected' : ''; ?>>Жіноча</option>
            <option value="other" <?php echo $gender == 'other' ? 'selected' : ''; ?>>Інша</option>
        </select><br><br>
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br><br>
        <label for="address">Адреса:</label>
        <textarea id="address" name="address"><?php echo htmlspecialchars($address); ?></textarea><br><br>
        <input type="submit" value="Оновити дані">
    </form>
    <br>
    <a href="logout.php">Вийти</a>
    <br>
    <a href="delete_account.php">Видалити профіль</a>
</body>
</html>
