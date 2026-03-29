<?php
require_once 'config.php';
require_once 'helpers.php';

require_login();

// Ensure only teachers can access this page
if ($_SESSION['role'] !== 'teacher') {
    header('Location: index.php');
    exit;
}

$course_id = isset($_GET['id']) ? intval($_GET['id']) : null;
$course = [
    'title' => '',
    'description' => '',
    'price' => '0.00',
    'image_url' => ''
];
$error = '';
$success = '';

// If editing, fetch course
if ($course_id) {
    $stmt = $pdo->prepare('SELECT * FROM courses WHERE id = ? AND instructor_id = ?');
    $stmt->execute([$course_id, $_SESSION['user_id']]);
    $existing = $stmt->fetch();
    if ($existing) {
        $course = $existing;
    } else {
        header('Location: teacher-dashboard.php');
        exit;
    }
}

// Handle save
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    $image_url = trim($_POST['image_url'] ?? '');

    if (empty($title)) {
        $error = "Title is required.";
    } else {
        if ($course_id) {
            $stmt = $pdo->prepare('UPDATE courses SET title = ?, description = ?, price = ?, image_url = ? WHERE id = ? AND instructor_id = ?');
            $stmt->execute([$title, $description, $price, $image_url, $course_id, $_SESSION['user_id']]);
            $success = "Course updated successfully.";
            $course = array_merge($course, compact('title', 'description', 'price', 'image_url'));
        } else {
            $stmt = $pdo->prepare('INSERT INTO courses (title, description, price, image_url, instructor_id) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$title, $description, $price, $image_url, $_SESSION['user_id']]);
            $course_id = $pdo->lastInsertId();
            $success = "Course created successfully.";
            header("Location: teacher-course-edit.php?id=$course_id&success=1");
            exit;
        }
    }
}

if (isset($_GET['success'])) {
    $success = "Course created successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course - Lumina Academy</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .edit-container { max-width: 800px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; margin-bottom: 0.5rem; font-weight: 500; color: #334155; }
        .form-control { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-family: 'Inter', sans-serif; box-sizing: border-box; }
        .form-control:focus { outline: none; border-color: #0ea5e9; }
        .btn-save { background: #0f172a; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer; }
        .btn-save:hover { background: #1e293b; }
        .alert { padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; }
        .alert-error { background: #fee2e2; color: #b91c1c; }
        .alert-success { background: #dcfce3; color: #166534; }
    </style>
</head>
<body class="bg-gray">
    <header class="navbar bg-white">
        <div class="nav-left">
            <a href="teacher-dashboard.php" class="logo text-navy"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
        </div>
        <div class="nav-right">
            <span style="margin-right: 1rem; font-weight: 500;">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
        </div>
    </header>

    <div class="edit-container">
        <h1 style="color: #0f172a; margin-bottom: 2rem; font-size: 1.5rem;">
            <?php echo $course_id ? 'Edit Course' : 'Create New Course'; ?>
        </h1>

        <?php if ($error): ?><div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
        <?php if ($success): ?><div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div><?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($course['title']); ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="5"><?php echo htmlspecialchars($course['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Price ($)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($course['price']); ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Image URL</label>
                <input type="url" name="image_url" class="form-control" placeholder="https://example.com/image.jpg" value="<?php echo htmlspecialchars($course['image_url']); ?>">
            </div>

            <button type="submit" class="btn-save"><?php echo $course_id ? 'Save Changes' : 'Create Course'; ?></button>
        </form>
    </div>
</body>
</html>