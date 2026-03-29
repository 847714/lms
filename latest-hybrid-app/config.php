<?php
// config.php - Database Configuration & Application Settings

// For a production environment with 2000+ students, a robust RDBMS like MySQL or PostgreSQL is recommended.
// Here we use PDO, allowing easy switching between database engines.
// For the sandbox environment, we will use SQLite to ensure it runs out of the box.

define('DB_TYPE', 'sqlite'); // Change to 'mysql' or 'pgsql' for production
define('DB_HOST', 'localhost');
define('DB_NAME', 'scholar_sanctuary');
define('DB_USER', 'root');
define('DB_PASS', '');

// SQLite specific setting
define('SQLITE_DB_PATH', __DIR__ . '/scholar_sanctuary.sqlite');

try {
    if (DB_TYPE === 'sqlite') {
        $pdo = new PDO("sqlite:" . SQLITE_DB_PATH);
    } else {
        $dsn = DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
    }

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Fetch associative arrays by default
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Emulate prepared statements to false to use native prepared statements
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $e) {
    // In production, log the error rather than displaying it
    error_log("Connection failed: " . $e->getMessage());
    die("Database connection failed. Please try again later.");
}

// Session Configuration (for security and performance)
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS in production
session_start();
?>