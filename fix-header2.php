<?php
$content = file_get_contents('teacher-profile.php');
// The issue is a duplicated block from the sed command gone wrong. Let's fix the header.
$fixed_header = '            <header class="header">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1e3a8a;">Lumina Academy</h2>
                <div class="nav-links">
                    <a href="teacher-dashboard.php">Dashboard</a>
                    <a href="index.php">Courses</a>
                    <a href="#">Resources</a>
                    <a href="leaderboard.php">Community</a>
                </div>
                <div class="header-actions" style="display: flex; align-items: center; gap: 1.5rem;">
                    <i class="fa-solid fa-bell" style="color: #475569;"></i>
                    <i class="fa-solid fa-gear" style="color: #475569;"></i>
                    <div class="user-avatar" style="width: 32px; height: 32px; border-radius: 50%; background-color: #0ea5e9; overflow: hidden; border: 2px solid white; outline: 1px solid #e2e8f0;">
                        <img src="https://i.pravatar.cc/150?img=33" alt="User" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </header>';

// Replace everything between <header> and </header>
$content = preg_replace('/<header class="header">.*?<\/header>/s', $fixed_header, $content);
file_put_contents('teacher-profile.php', $content);
?>
