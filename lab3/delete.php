<?php
if(isset($_POST["submit"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    // Перевірка вірності пароля (можна використовувати більш складні методи перевірки)
    if ($password === 'your_password') {
        $userFolder = 'users/' . $login;
        // Перевірка наявності папки
        if (file_exists($userFolder)) {
            // Видалення папки з вмістом
            $success = deleteDirectory($userFolder);
            if ($success) {
                echo "Папка з ім'ям \"$login\" та весь її вміст успішно видалена.";
            } else {
                echo "Сталася помилка під час видалення папки.";
            }
        } else {
            echo "Папка з ім'ям \"$login\" не знайдена.";
        }
    } else {
        echo "Неправильний пароль.";
    }
}

// Функція для видалення папки з вмістом
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
?>
