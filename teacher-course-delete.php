<?php
require_once 'config.php';
require_once 'helpers.php';

require_login();

// Only teachers can delete their own courses
if ($_SESSION['role'] !== 'teacher') {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = intval($_POST['course_id'] ?? 0);
    if ($course_id) {
        $stmt = $pdo->prepare('DELETE FROM courses WHERE id = ? AND instructor_id = ?');
        $stmt->execute([$course_id, $_SESSION['user_id']]);
    }
}

header('Location: teacher-dashboard.php');
exit;
?>