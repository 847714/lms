<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarly Leaderboard - Lumina Academy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray">
    <header class="navbar bg-white">
        <div class="nav-left">
            <a href="index.php" class="logo text-navy">Lumina Academy</a>
        </div>
        <div class="nav-center">
            <nav class="nav-links">
                <a href="#">Dashboard</a>
                <a href="#">Courses</a>
                <a href="#">Library</a>
                <a href="leaderboard.php" class="active border-bottom-blue">Leaderboard</a>
            </nav>
        </div>
        <div class="nav-right">
            <i class="fa-solid fa-bell icon-action"></i>
            <i class="fa-solid fa-gear icon-action"></i>
            <div class="profile-pic">
                 <img src="https://i.pravatar.cc/150?img=11" alt="Profile" style="width:100%; height:100%; border-radius:50%;">
            </div>
        </div>
    </header>

    <div class="container mt-4">
        <div class="leaderboard-header-section">
            <div class="leaderboard-title">
                <h1>Scholarly Leaderboard</h1>
                <p>Celebrating intellectual excellence and consistent curiosity. Honor the pursuit of knowledge across our global sanctuary.</p>
            </div>
            <div class="my-standing-card bg-white shadow-sm">
                <div class="standing-profile">
                    <img src="https://i.pravatar.cc/150?img=11" alt="My Profile">
                    <span class="status-badge bg-green text-white">YOU</span>
                </div>
                <div class="standing-info">
                    <div class="standing-label">MY STANDING</div>
                    <div class="standing-rank text-navy">Rank #42</div>
                </div>
                <div class="standing-points">
                    <div class="points-value text-green"><i class="fa-solid fa-circle-up"></i> 1,240</div>
                    <div class="points-subtext">210 pts to Rank #41</div>
                </div>
            </div>
        </div>

        <div class="filters-section mt-4 bg-white shadow-sm">
            <div class="filter-group">
                <button class="btn btn-navy">Global Rankings</button>
                <div class="dropdown">
                    <button class="btn btn-outline-gray dropdown-toggle">Quantum Philosophy <i class="fa-solid fa-chevron-down"></i></button>
                </div>
            </div>
            <div class="time-toggle bg-gray-light">
                <button class="toggle-btn">Today</button>
                <button class="toggle-btn active">This Month</button>
                <button class="toggle-btn">All Time</button>
            </div>
        </div>

        <div class="podium-section mt-5">
            <!-- Rank 2 -->
            <div class="podium-card rank-2 bg-white shadow-sm">
                <div class="podium-avatar">
                    <img src="https://i.pravatar.cc/150?img=5" alt="Dr. Elena Vance">
                    <span class="rank-badge bg-gray-light text-navy">2</span>
                </div>
                <h3>Dr. Elena Vance</h3>
                <p class="text-gray">Master of Rhetoric</p>
                <div class="podium-points bg-gray-light text-navy">
                    <i class="fa-solid fa-circle-up text-green"></i> 4,890 pts
                </div>
            </div>

            <!-- Rank 1 -->
            <div class="podium-card rank-1 bg-white shadow-lg border-navy">
                <div class="premier-label text-green">
                    <i class="fa-solid fa-award"></i> PREMIER SCHOLAR
                </div>
                <div class="podium-avatar premier">
                    <img src="https://i.pravatar.cc/150?img=12" alt="Julian Thorne">
                    <span class="rank-badge bg-green text-white">1</span>
                </div>
                <h2 class="text-navy">Julian Thorne</h2>
                <p class="text-gray">Quantum Physics Lead</p>
                <div class="podium-points bg-green-light text-green border-green">
                    <i class="fa-solid fa-circle-up text-green"></i> 5,240 pts
                </div>
            </div>

            <!-- Rank 3 -->
            <div class="podium-card rank-3 bg-white shadow-sm">
                <div class="podium-avatar">
                    <img src="https://i.pravatar.cc/150?img=9" alt="Saffron Lee">
                    <span class="rank-badge bg-orange-light text-orange">3</span>
                </div>
                <h3>Saffron Lee</h3>
                <p class="text-gray">Ethics Researcher</p>
                <div class="podium-points bg-gray-light text-navy">
                    <i class="fa-solid fa-circle-up text-green"></i> 4,620 pts
                </div>
            </div>
        </div>

        <div class="leaderboard-table mt-5 bg-white shadow-sm">
            <div class="table-header bg-gray-light text-navy font-semibold">
                <div class="col-rank">Rank</div>
                <div class="col-name">Scholar Name</div>
                <div class="col-points">Points</div>
                <div class="col-accuracy">Accuracy %</div>
                <div class="col-streak">Weekly Streak</div>
                <div class="col-badges">Badges</div>
            </div>

            <div class="table-row">
                <div class="col-rank text-navy font-semibold">#4</div>
                <div class="col-name">
                    <img src="https://i.pravatar.cc/150?img=8" alt="Marcus Aurel" class="row-avatar">
                    <span class="font-medium">Marcus Aurel</span>
                </div>
                <div class="col-points font-semibold"><i class="fa-solid fa-circle-up text-green"></i> 4,100</div>
                <div class="col-accuracy">98.2%</div>
                <div class="col-streak text-orange font-medium"><i class="fa-solid fa-fire"></i> 12</div>
                <div class="col-badges">
                    <i class="fa-solid fa-magnifying-glass text-green badge-icon"></i>
                    <i class="fa-solid fa-book-open text-navy badge-icon"></i>
                </div>
            </div>

            <div class="table-row">
                <div class="col-rank text-navy font-semibold">#5</div>
                <div class="col-name">
                    <img src="https://i.pravatar.cc/150?img=42" alt="Amara Okafor" class="row-avatar">
                    <span class="font-medium">Amara Okafor</span>
                </div>
                <div class="col-points font-semibold"><i class="fa-solid fa-circle-up text-green"></i> 3,950</div>
                <div class="col-accuracy">96.5%</div>
                <div class="col-streak text-orange font-medium"><i class="fa-solid fa-fire"></i> 8</div>
                <div class="col-badges">
                    <i class="fa-solid fa-medal text-teal badge-icon"></i>
                    <i class="fa-solid fa-bolt text-green badge-icon"></i>
                </div>
            </div>

            <div class="table-row highlight-me bg-green-light-50">
                <div class="col-rank text-navy font-semibold">#42</div>
                <div class="col-name">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Me" class="row-avatar">
                    <span class="font-medium text-navy">Me (Scholar Name)</span>
                </div>
                <div class="col-points font-semibold text-green"><i class="fa-solid fa-circle-up"></i> 1,240</div>
                <div class="col-accuracy">92.1%</div>
                <div class="col-streak text-orange font-medium"><i class="fa-solid fa-fire"></i> 5</div>
                <div class="col-badges">
                    <i class="fa-solid fa-graduation-cap text-gray badge-icon"></i>
                </div>
            </div>

            <div class="table-footer text-center mt-3">
                <a href="#" class="view-all-link text-navy font-medium">View All Rankings</a>
            </div>
        </div>
    </div>

    <footer class="footer-simple mt-5 border-top">
        <div class="container footer-content">
            <div class="footer-left">
                <a href="index.php" class="logo text-navy font-semibold">Lumina Academy</a>
                <span class="text-gray ml-4">&copy; 2024 Lumina Academy. Cultivating Intellectual Excellence.</span>
            </div>
            <div class="footer-right">
                <a href="#">Institutional Privacy</a>
                <a href="#">Academic Integrity</a>
                <a href="#">Support</a>
                <a href="#">Faculty Portal</a>
            </div>
        </div>
    </footer>

    <script src="app.js"></script>
</body>
</html>
