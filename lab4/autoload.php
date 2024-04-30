<?php
/**
 * Функція для автопідключення класів з неймспейсами.
 *
 * @param string $className Повне ім'я класу, який потрібно підключити.
 */
function autoload($className) {
    // Розділяємо ім'я класу на неймспейс та ім'я класу
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    // Підключаємо файл класу, якщо він існує
    if (file_exists($fileName)) {
        require_once $fileName;
    }
}

// Реєстрація функції autoload для автопідключення класів з неймспейсами
spl_autoload_register('autoload');

// Створення екземплярів класів та виклик методів для перевірки
$userController = new \Controllers\UserController();
$userController->showUser(1);

$userView = new \Views\UserView();
$userView->showUser("John Doe");
?>
