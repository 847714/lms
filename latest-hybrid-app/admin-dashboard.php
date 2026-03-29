<?php
require_once 'config.php';
require_once 'helpers.php';

require_login();

// Ensure only admins can access this page
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Fetch all users
$stmt = $pdo->query('SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC');
$users = $stmt->fetchAll();

// Fetch all courses
$stmt = $pdo->query('
    SELECT c.id, c.title, c.price, u.name as instructor_name, c.created_at
    FROM courses c
    JOIN users u ON c.instructor_id = u.id
    ORDER BY c.created_at DESC
');
$courses = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Lumina Academy</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .admin-header h1 {
            color: #0f172a;
            font-size: 1.875rem;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        .data-table th, .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .data-table th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        .data-table tbody tr:hover {
            background-color: #f1f5f9;
        }
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-admin { background-color: #fef08a; color: #854d0e; }
        .badge-teacher { background-color: #dbeafe; color: #1e40af; }
        .badge-student { background-color: #dcfce3; color: #166534; }
        .section-title {
            margin-bottom: 1rem;
            color: #1e293b;
            font-size: 1.25rem;
        }
        .action-btn {
            color: #ef4444;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        .action-btn:hover { color: #dc2626; }
    </style>
</head>
<body class="bg-gray">
    <header class="navbar bg-white">
        <div class="nav-left">
            <a href="#" class="logo text-navy"><i class="fa-solid fa-building-columns"></i> Lumina Admin</a>
        </div>
        <div class="nav-right">
            <span style="margin-right: 1rem; font-weight: 500;">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
            <a href="logout.php" class="btn-outline-share" style="text-decoration: none; padding: 0.5rem 1rem;">Logout</a>
        </div>
    </header>

    <div class="admin-container">
        <div class="admin-header">
            <h1>System Administration</h1>
        </div>

        <h2 class="section-title">User Management</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td style="font-weight: 500; color: #0f172a;"><?php echo htmlspecialchars($user['name']); ?></td>
                    <td style="color: #64748b;"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <span class="badge badge-<?php echo $user['role']; ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td style="color: #64748b;"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></td>
                    <td>
                        <?php if($user['role'] !== 'admin'): ?>
                            <form method="POST" action="admin_action.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="action" value="delete_user">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" class="action-btn" title="Delete User"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        <?php else: ?>
                            <span style="color: #cbd5e1;"><i class="fa-solid fa-shield-halved"></i></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($users)): ?>
                <tr><td colspan="6" style="text-align: center; color: #64748b;">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2 class="section-title">Course Overview</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Title</th>
                    <th>Instructor</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo $course['id']; ?></td>
                    <td style="font-weight: 500; color: #0f172a;"><?php echo htmlspecialchars($course['title']); ?></td>
                    <td><?php echo htmlspecialchars($course['instructor_name']); ?></td>
                    <td style="color: #166534; font-weight: 600;">$<?php echo number_format($course['price'], 2); ?></td>
                    <td style="color: #64748b;"><?php echo date('M j, Y', strtotime($course['created_at'])); ?></td>
                    <td>
                        <form method="POST" action="admin_action.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this course?');">
                            <input type="hidden" name="action" value="delete_course">
                            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                            <button type="submit" class="action-btn" title="Delete Course"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($courses)): ?>
                <tr><td colspan="6" style="text-align: center; color: #64748b;">No courses available.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>