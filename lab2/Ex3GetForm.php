<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_again = $_POST['passwordagain'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $city = $_POST['city'];
    $games = isset($_POST['WOT']) ? 'WOT ' : '';
    $games .= isset($_POST['WOW']) ? 'WOW ' : '';
    $games .= isset($_POST['CS']) ? 'CS ' : '';
    $about = $_POST['about'];
    $photo_name = $_FILES['file']['name'];
    $photo_temp = $_FILES['file']['tmp_name'];
    $photo_size = $_FILES['file']['size'];
    $photo_error = $_FILES['file']['error'];

    

    echo "<p>Логін: $login</p>";
    echo "<p>Пароль: $password</p>";
    echo "<p>Пароль (ще раз): $password_again</p>";
    echo "<p>Стать: $gender</p>";
    echo "<p>Місто: $city</p>";
    echo "<p>Ігри: $games</p>";
    if ($photo_error === 0) {
        $upload_dir = 'uploads/';
        $target_file = $upload_dir . basename($photo_name);
        move_uploaded_file($photo_temp, $target_file);
        echo "<img src='$target_file' alt='Фото'>";
    }
}

?>


</body>
</html>