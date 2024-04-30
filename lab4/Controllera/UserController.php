<?php
namespace Controllers;

require_once __DIR__ . '/../Models/UserModel.php';

/**
 * Class UserController
 *
 * Контролер користувача для обробки запитів, пов'язаних з користувачами.
 */
class UserController {
    /**
     * @var \Models\UserModel Модель користувача.
     */
    private $userModel;

    /**
     * Конструктор класу.
     */
    public function __construct() {
        $this->userModel = new \Models\UserModel();
    }

    /**
     * Показати дані про користувача.
     *
     * @param int $userId Ідентифікатор користувача.
     */
    public function showUser($userId) {
        $user = $this->userModel->getUser($userId);
        echo "User: $user";
    }
}
?>
