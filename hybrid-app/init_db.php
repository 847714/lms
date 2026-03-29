<?php
// init_db.php - Database Initialization Script for 2000+ concurrent students

require_once 'config.php';

echo "Initializing database...<br>";

// We use SQLite for this environment but the structure is designed for scalability
$sql_users = "
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'student', -- 'student' or 'teacher' or 'admin'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
";

// Create index on email for fast lookups during login
$sql_users_idx = "CREATE INDEX IF NOT EXISTS idx_users_email ON users(email);";

$sql_courses = "
CREATE TABLE IF NOT EXISTS courses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    instructor_id INTEGER NOT NULL,
    price DECIMAL(10,2) DEFAULT 0.00,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(instructor_id) REFERENCES users(id)
);
";

$sql_enrollments = "
CREATE TABLE IF NOT EXISTS enrollments (
    user_id INTEGER NOT NULL,
    course_id INTEGER NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id, course_id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(course_id) REFERENCES courses(id)
);
";

$sql_progress = "
CREATE TABLE IF NOT EXISTS progress (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    course_id INTEGER NOT NULL,
    module_name VARCHAR(255) NOT NULL,
    status VARCHAR(50) DEFAULT 'not_started', -- 'not_started', 'in_progress', 'completed'
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(course_id) REFERENCES courses(id)
);
";
// Create index for fast retrieval of a student's progress
$sql_progress_idx = "CREATE INDEX IF NOT EXISTS idx_progress_user_course ON progress(user_id, course_id);";

try {
    $pdo->exec($sql_users);
    $pdo->exec($sql_users_idx);
    echo "Table 'users' initialized successfully.<br>";

    $pdo->exec($sql_courses);
    echo "Table 'courses' initialized successfully.<br>";

    $pdo->exec($sql_enrollments);
    echo "Table 'enrollments' initialized successfully.<br>";

    $pdo->exec($sql_progress);
    $pdo->exec($sql_progress_idx);
    echo "Table 'progress' initialized successfully.<br>";

    // Insert dummy data for testing (1 teacher, 1 student)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        // Create teacher
        $teacher_hash = password_hash('password123', PASSWORD_DEFAULT);
        $pdo->exec("INSERT INTO users (name, email, password_hash, role) VALUES ('Dr. Alistair Vance', 'alistair@example.com', '$teacher_hash', 'teacher')");

        // Create student
        $student_hash = password_hash('password123', PASSWORD_DEFAULT);
        $pdo->exec("INSERT INTO users (name, email, password_hash, role) VALUES ('Julian Sterling', 'julian@example.com', '$student_hash', 'student')");

        echo "Dummy users inserted (passwords: 'password123').<br>";
    }

    echo "Database initialization complete.<br>";
} catch (PDOException $e) {
    die("Database Initialization Error: " . $e->getMessage());
}
?>