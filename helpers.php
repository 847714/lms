<?php
// helpers.php - Reusable functions for authentication and session management

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function get_logged_in_user($pdo) {
    if (is_logged_in()) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch();
    }
    return null;
}

function logout() {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
?>