<?php
require_once 'config.php';
require_once 'helpers.php';

require_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile - Lumina Academy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" href="icon-192.png">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-profile {
            background-color: #f8f9fc;
            border-radius: 1.5rem;
            padding: 3rem;
            display: flex;
            gap: 4rem;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        .hero-profile::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background-color: #e2e8f0;
            border-radius: 50%;
            transform: translate(30%, -30%);
            opacity: 0.5;
        }
        .profile-img-container {
            flex-shrink: 0;
            width: 300px;
            height: 300px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: rotate(-3deg);
            background-color: #cbd5e1;
        }
        .profile-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: rotate(3deg) scale(1.05);
        }
        .profile-info {
            flex-grow: 1;
            z-index: 1;
        }
        .profile-badge {
            display: inline-block;
            background-color: #dcfce7;
            color: #166534;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }
        .profile-name {
            font-size: 3.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }
        .profile-title {
            font-size: 1.5rem;
            color: #475569;
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        .profile-tags {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .profile-tag {
            background-color: white;
            border: 1px solid #e2e8f0;
            color: #334155;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .profile-quote {
            border-left: 4px solid #cbd5e1;
            padding-left: 1.5rem;
            margin-bottom: 2.5rem;
            font-size: 1.125rem;
            color: #475569;
            font-style: italic;
            line-height: 1.6;
        }
        .profile-actions {
            display: flex;
            gap: 1rem;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        .stat-card {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
        }
        .stat-icon {
            font-size: 1.5rem;
            color: #0f172a;
            margin-bottom: 1rem;
        }
        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }
        .stat-label {
            color: #64748b;
            font-size: 0.875rem;
        }

        .content-columns {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0f172a;
        }

        .course-card {
            display: flex;
            background-color: white;
            border-radius: 1rem;
            padding: 1rem;
            gap: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            margin-bottom: 1.5rem;
            align-items: stretch;
        }
        .course-img {
            width: 180px;
            border-radius: 0.75rem;
            object-fit: cover;
            background-color: #f1f5f9;
        }
        .course-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0.5rem 0;
        }
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 0.5rem;
        }
        .course-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f172a;
            max-width: 80%;
        }
        .course-badge {
            background-color: #f1f5f9;
            color: #475569;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .course-badge.active {
            background-color: #dcfce7;
            color: #166534;
        }
        .course-badge.new {
            background-color: #f0fdf4;
            color: #166534;
        }
        .course-desc {
            color: #475569;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }
        .course-meta {
            display: flex;
            gap: 1.5rem;
            color: #0f172a;
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: auto;
        }
        .course-meta span {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        .course-meta i {
            color: #166534;
        }

        .review-card {
            background-color: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .review-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 1.5rem;
            bottom: 1.5rem;
            width: 4px;
            background-color: #166534;
            border-radius: 0 4px 4px 0;
        }
        .review-text {
            color: #475569;
            font-size: 0.9375rem;
            font-style: italic;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }
        .review-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .review-author-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e2e8f0;
            object-fit: cover;
        }
        .review-author-info {
            display: flex;
            flex-direction: column;
        }
        .review-author-name {
            font-weight: 600;
            color: #0f172a;
            font-size: 0.875rem;
        }
        .review-author-title {
            color: #64748b;
            font-size: 0.75rem;
        }

        .library-card {
            background-color: #0f172a;
            border-radius: 1rem;
            padding: 2rem;
            color: white;
        }
        .library-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .library-desc {
            color: #cbd5e1;
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }
        .library-links {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .library-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .library-link i {
            color: #4ade80;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            color: #0f172a;
            font-weight: 600;
        }
        .btn-outline:hover {
            background-color: #f8f9fa;
        }

        /* Sidebar Overrides for this layout */
        .sidebar {
            width: 250px;
            flex-shrink: 0;
            border-right: 1px solid #e2e8f0;
            background-color: #f8f9fc;
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: sticky;
            top: 0;
        }
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        .main-content {
            flex-grow: 1;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
        }
        .header {
            padding: 1.5rem 2.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        .nav-links a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
        }
        .nav-links a:hover {
            color: #0f172a;
        }
        .content-area {
            padding: 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .btn-green {
            background-color: #166534;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-green:hover {
            background-color: #14532d;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div style="padding: 1.5rem 1.5rem 0.5rem;">
                <h1 style="color: #0f172a; font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem;">Academic Workspace</h1>
                <p style="color: #64748b; font-size: 0.75rem;">Lumina Academy</p>
            </div>

            <nav class="sidebar-nav" style="margin-top: 1.5rem; flex-grow: 1;">
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 0.5rem; padding: 0 1rem;">
                        <a href="teacher-profile.php" class="active" style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; background-color: white; border-radius: 0.5rem; color: #0f172a; text-decoration: none; font-weight: 600; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                            <i class="fa-solid fa-user" style="color: #1e3a8a;"></i> My Profile
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem; padding: 0 1rem;">
                        <a href="#" style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: #64748b; text-decoration: none; font-weight: 500;">
                            <i class="fa-solid fa-book-open"></i> Learning Path
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem; padding: 0 1rem;">
                        <a href="certificate.php" style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: #64748b; text-decoration: none; font-weight: 500;">
                            <i class="fa-solid fa-award"></i> Certificates
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem; padding: 0 1rem;">
                        <a href="#" style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: #64748b; text-decoration: none; font-weight: 500;">
                            <i class="fa-solid fa-envelope"></i> Messages
                        </a>
                    </li>
                    <li style="margin-bottom: 0.5rem; padding: 0 1rem;">
                        <a href="#" style="display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: #64748b; text-decoration: none; font-weight: 500;">
                            <i class="fa-solid fa-book"></i> Library
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer" style="padding: 1.5rem;">
                <button class="btn btn-primary" style="width: 100%; margin-bottom: 1.5rem; background-color: #0f172a;">Upgrade to Pro</button>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="#" style="color: #64748b; text-decoration: none; font-size: 0.875rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-regular fa-circle-question"></i> Help Center
                    </a>
                    <a href="#" style="color: #64748b; text-decoration: none; font-size: 0.875rem; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
                        <header class="header">
                <h2 style="font-size: 1.25rem; font-weight: 700; color: #1e3a8a;">Lumina Academy</h2>
                <div class="nav-links">
                    <a href="teacher-dashboard.php">Dashboard</a>
                    <a href="index.php">Courses</a>
                    <a href="#">Resources</a>
                    <a href="leaderboard.php">Community</a>
                </div>
                <div class="header-actions" style="display: flex; align-items: center; gap: 1.5rem;">
                    <i class="fa-solid fa-bell" style="color: #475569;"></i>
                    <span style="margin: 0 1rem; font-weight: 500;"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                    <a href="logout.php" class="btn" style="background-color: transparent; border: 1px solid #cbd5e1; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; color: #0f172a; font-weight: 500; font-size: 0.875rem;">Logout</a>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="content-area">

                <!-- Hero Section -->
                <div class="hero-profile">
                    <div class="profile-img-container">
                        <img src="https://i.pravatar.cc/300?img=5" alt="Dr. Elena Vance">
                    </div>
                    <div class="profile-info">
                        <span class="profile-badge">Distinguished Faculty</span>
                        <h1 class="profile-name">Dr. Elena Vance</h1>
                        <p class="profile-title">Master of Rhetoric</p>

                        <div class="profile-tags">
                            <span class="profile-tag"><i class="fa-solid fa-graduation-cap"></i> PhD in Classical Studies</span>
                            <span class="profile-tag"><i class="fa-solid fa-award"></i> Oxford Senior Fellow</span>
                        </div>

                        <blockquote class="profile-quote">
                            "Dedicated to cultivating critical thinking in the digital age, where the clarity of thought remains our most vital compass."
                        </blockquote>

                        <div class="profile-actions">
                            <button class="btn btn-primary" style="background-color: #0f172a;">Follow Research</button>
                            <button class="btn btn-outline">Contact Professor</button>
                        </div>
                    </div>
                </div>

                <!-- Stats Row -->
                <div class="stats-row">
                    <div class="stat-card">
                        <i class="fa-solid fa-users stat-icon"></i>
                        <div class="stat-value">12,450+</div>
                        <div class="stat-label">Total Students Taught</div>
                    </div>
                    <div class="stat-card">
                        <i class="fa-solid fa-folder stat-icon" style="color: #16a34a;"></i>
                        <div class="stat-value">842</div>
                        <div class="stat-label">Resources Shared</div>
                    </div>
                    <div class="stat-card">
                        <i class="fa-solid fa-star stat-icon" style="color: #1e3a8a;"></i>
                        <div class="stat-value">4.9/5.0</div>
                        <div class="stat-label">Average Instructor Rating</div>
                    </div>
                </div>

                <!-- Content Columns -->
                <div class="content-columns">
                    <!-- Left Column -->
                    <div>
                        <div class="section-header">
                            <h3 class="section-title">Courses Taught</h3>
                            <a href="#" style="color: #166534; font-weight: 600; text-decoration: none; font-size: 0.875rem;">View All Curriculum</a>
                        </div>

                        <!-- Course 1 -->
                        <div class="course-card">
                            <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=300&q=80" alt="Classical Rhetoric" class="course-img">
                            <div class="course-info">
                                <div class="course-header">
                                    <h4 class="course-title">Classical Rhetoric in the Modern Age</h4>
                                    <span class="course-badge active">Active</span>
                                </div>
                                <p class="course-desc">Exploring the foundations of persuasive speech and its application in contemporary digital media.</p>
                                <div class="course-meta">
                                    <span><i class="fa-solid fa-user"></i> 3,240 Enrolled</span>
                                    <span><i class="fa-solid fa-star"></i> 4.9 (1.2k reviews)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Course 2 -->
                        <div class="course-card">
                            <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=300&q=80" alt="Socratic Inquiry" class="course-img">
                            <div class="course-info">
                                <div class="course-header">
                                    <h4 class="course-title">The Art of Socratic Inquiry</h4>
                                    <span class="course-badge new" style="background-color: #f1f5f9; color: #475569;">New Batch</span>
                                </div>
                                <p class="course-desc">A deep dive into questioning techniques to uncover deeper truths in philosophy and daily life.</p>
                                <div class="course-meta">
                                    <span><i class="fa-solid fa-user"></i> 1,890 Enrolled</span>
                                    <span><i class="fa-solid fa-star"></i> 5.0 (420 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="section-header">
                            <h3 class="section-title">Student Reviews</h3>
                            <button class="btn-green"><i class="fa-regular fa-calendar-check"></i> Book Consultation</button>
                        </div>

                        <!-- Review 1 -->
                        <div class="review-card">
                            <p class="review-text">"Dr. Vance changed the way I look at every news article I read. Her emphasis on checking the rhetorical foundation is a superpower in today's world."</p>
                            <div class="review-author">
                                <img src="https://i.pravatar.cc/100?img=11" alt="Marcus Thorne" class="review-author-img">
                                <div class="review-author-info">
                                    <span class="review-author-name">Marcus Thorne</span>
                                    <span class="review-author-title">Masters in Journalism</span>
                                </div>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="review-card">
                            <p class="review-text">"The most rigorous but rewarding course I've taken at Lumina. Elena's feedback is precise, scholarly, and deeply encouraging."</p>
                            <div class="review-author">
                                <img src="https://i.pravatar.cc/100?img=5" alt="Elena Rodriguez" class="review-author-img">
                                <div class="review-author-info">
                                    <span class="review-author-name">Elena Rodriguez</span>
                                    <span class="review-author-title">Philosophy Scholar</span>
                                </div>
                            </div>
                        </div>

                        <!-- Professor's Library -->
                        <div class="library-card">
                            <h3 class="library-title">Professor's Library</h3>
                            <p class="library-desc">Access exclusive reading lists and research papers curated by Dr. Vance.</p>
                            <div class="library-links">
                                <a href="#" class="library-link">
                                    <i class="fa-solid fa-file-pdf"></i> Ethical Rhetoric (PDF)
                                </a>
                                <a href="#" class="library-link">
                                    <i class="fa-solid fa-file-pdf"></i> Digital Stoicism Guide
                                </a>
                            </div>
                            <button class="btn" style="width: 100%; background-color: white; color: #0f172a; border: none; padding: 0.75rem; border-radius: 0.5rem; font-weight: 600;">Access All Resources</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="app.js"></script>
</body>
</html>
