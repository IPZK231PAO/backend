<?php
namespace Models;

/**
 * Class UserModel
 *
 * Модель користувача для роботи з даними про користувачів.
 */
class UserModel {
    /**
     * Отримати дані про користувача за його ідентифікатором.
     *
     * @param int $userId Ідентифікатор користувача.
     * @return string Дані про користувача.
     */
    public function getUser($userId) {
        // Логіка отримання користувача з бази даних або іншого джерела
        return "User with ID $userId";
    }
}
?>
