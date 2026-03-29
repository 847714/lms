<?php
require_once 'config.php';
require_once 'helpers.php';

require_login();

if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'delete_user') {
            $user_id = intval($_POST['user_id'] ?? 0);
            if ($user_id && $user_id !== $_SESSION['user_id']) {
                $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
                $stmt->execute([$user_id]);
            }
        } elseif ($action === 'delete_course') {
            $course_id = intval($_POST['course_id'] ?? 0);
            if ($course_id) {
                $stmt = $pdo->prepare('DELETE FROM courses WHERE id = ?');
                $stmt->execute([$course_id]);
            }
        }
    } catch (PDOException $e) {
        error_log("Admin action failed: " . $e->getMessage());
        // Simple error handling for prototype
        echo "Error: " . $e->getMessage();
        exit;
    }

    header('Location: admin-dashboard.php');
    exit;
}
?>