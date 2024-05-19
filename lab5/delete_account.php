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

$sql = "DELETE FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
} else {
    echo "Сталася помилка. Спробуйте ще раз.";
}

$stmt->close();
$conn->close();
?>
