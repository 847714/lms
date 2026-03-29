<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hybrid Web/Mobile App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
</head>
<body>
    <header>
        <h1>Hybrid App</h1>
    </header>
    <main>
        <section id="content">
            <h2>Welcome to the App!</h2>
            <p>This is a simple hybrid web and mobile application.</p>

            <div class="php-demo">
                <h3>Server-side Info:</h3>
                <?php
                    echo "<p>Current Server Time: " . date("Y-m-d H:i:s") . "</p>";
                    echo "<p>PHP Version: " . phpversion() . "</p>";
                ?>
            </div>

            <button id="action-btn">Click Me!</button>
        </section>
    </main>
    <script src="app.js"></script>
</body>
</html>
