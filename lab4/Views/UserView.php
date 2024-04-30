<?php
namespace Views;

/**
 * Class UserView
 *
 * Представлення даних про користувачів.
 */
class UserView {
    /**
     * Показати дані про користувача.
     *
     * @param string $user Дані про користувача.
     */
    public function showUser($user) {
        echo "User: $user";
    }
}
?>
