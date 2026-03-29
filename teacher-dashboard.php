<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - The Scholar Sanctuary</title>
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
            <a href="#" class="logo text-navy" style="font-family: 'Inter', sans-serif; font-weight: 700;">The Scholar Sanctuary</a>
        </div>
        <div class="nav-center">
            <nav class="nav-links">
                <a href="teacher-dashboard.php" class="active border-bottom-blue">Dashboard</a>
                <a href="#">Resources</a>
                <a href="#">Community</a>
            </nav>
        </div>
        <div class="nav-right">
            <i class="fa-solid fa-bell icon-action"></i>
            <i class="fa-solid fa-circle-question icon-action"></i>
            <div class="profile-pic">
                 <img src="https://i.pravatar.cc/150?img=11" alt="Profile" style="width:100%; height:100%; border-radius:50%;">
            </div>
        </div>
    </header>

    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar bg-white" style="display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div class="sidebar-header" style="text-align: left; padding: 1.5rem 1.5rem 0.5rem;">
                    <h2 class="text-navy" style="font-size: 1.2rem; margin-bottom: 0.2rem;">Teacher Suite</h2>
                    <p style="font-size: 0.7rem; font-weight: 600; color: var(--gray-dark); letter-spacing: 1px;">ACADEMIC MANAGEMENT</p>
                </div>
                <nav class="sidebar-nav" style="margin-top: 1rem;">
                    <a href="#" class="sidebar-link active-sidebar">
                        <i class="fa-solid fa-border-all"></i> Overview
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-book-open"></i> My Courses
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-chart-line"></i> Student Progress
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-clipboard-list"></i> Assignments
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i> Settings
                    </a>
                </nav>
            </div>

            <div class="sidebar-bottom" style="padding: 1.5rem;">
                <button class="btn btn-navy w-100" style="margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem; border-radius: 8px;">
                    <i class="fa-solid fa-plus-circle"></i> Create New Course
                </button>
                <nav class="sidebar-nav">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-circle-question"></i> Support
                    </a>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content" style="padding: 2.5rem;">
            <div class="content-header" style="margin-bottom: 2rem; display: block;">
                <h1 class="text-navy" style="font-size: 2.2rem; margin-bottom: 0.5rem;">Welcome back, Professor</h1>
                <p style="color: var(--gray-dark); font-size: 1.05rem; max-width: 800px;">Here is what is happening across your scholarly domain today. Deep focus leads to brilliant outcomes.</p>
            </div>

            <!-- Stats Row -->
            <div class="stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="stat-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px;">
                    <p class="stat-label" style="font-size: 0.75rem; font-weight: 700; color: var(--gray-dark); letter-spacing: 1px; margin-bottom: 0.5rem;">TOTAL STUDENTS</p>
                    <h2 class="stat-value text-navy" style="font-size: 2.5rem; margin-bottom: 1rem;">1,248</h2>
                    <div style="display: flex; justify-content: space-between; align-items: flex-end;">
                        <div style="font-size: 0.8rem; color: var(--green); font-weight: 600;"><i class="fa-solid fa-arrow-trend-up"></i> +12%<br><span style="color: var(--gray-dark); font-weight: 400; font-size: 0.75rem;">vs last month</span></div>
                        <div class="mini-chart" style="width: 60px; height: 30px;"><svg viewBox="0 0 100 30" preserveAspectRatio="none"><path d="M0,20 Q10,25 20,15 T40,25 T60,5 T80,25 T100,10" fill="none" stroke="var(--green)" stroke-width="2"/></svg></div>
                    </div>
                </div>

                <div class="stat-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px;">
                    <p class="stat-label" style="font-size: 0.75rem; font-weight: 700; color: var(--gray-dark); letter-spacing: 1px; margin-bottom: 0.5rem;">ACTIVE COURSES</p>
                    <h2 class="stat-value text-navy" style="font-size: 2.5rem; margin-bottom: 1rem;">08</h2>
                    <div class="progress-container" style="margin-bottom: 0.5rem; display: flex; gap: 4px;">
                        <div style="height: 6px; flex: 1; background: var(--green); border-radius: 3px;"></div>
                        <div style="height: 6px; flex: 1; background: var(--green); border-radius: 3px;"></div>
                        <div style="height: 6px; flex: 1; background: var(--gray-medium); border-radius: 3px;"></div>
                        <div style="height: 6px; flex: 1; background: var(--gray-medium); border-radius: 3px;"></div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--gray-dark);">2 finishing this week</p>
                </div>

                <div class="stat-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px;">
                    <p class="stat-label" style="font-size: 0.75rem; font-weight: 700; color: var(--gray-dark); letter-spacing: 1px; margin-bottom: 0.5rem;">AVG. COMPLETION</p>
                    <h2 class="stat-value text-navy" style="font-size: 2.5rem; margin-bottom: 1rem;">94.2%</h2>
                    <div class="progress-bar-bg" style="height: 6px; background: var(--gray-light); border-radius: 3px; margin-bottom: 0.5rem;">
                        <div class="progress-bar-fill" style="height: 100%; width: 94.2%; background: #86efac; border-radius: 3px;"></div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--gray-dark);">Exceeding platform average</p>
                </div>

                <div class="stat-card shadow" style="padding: 1.5rem; border-radius: 12px; background-color: var(--navy); color: white;">
                    <p class="stat-label" style="font-size: 0.75rem; font-weight: 700; color: #cbd5e1; letter-spacing: 1px; margin-bottom: 0.5rem;">TO GRADE</p>
                    <h2 class="stat-value" style="font-size: 2.5rem; margin-bottom: 0.5rem; color: white;">24</h2>
                    <p style="font-size: 0.85rem; color: #cbd5e1; font-style: italic; margin-bottom: 1rem;">Across 3 courses</p>
                    <div class="avatar-group" style="display: flex; align-items: center;">
                        <img src="https://i.pravatar.cc/150?img=1" style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid var(--navy); margin-left: -0px;">
                        <img src="https://i.pravatar.cc/150?img=2" style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid var(--navy); margin-left: -8px;">
                        <img src="https://i.pravatar.cc/150?img=3" style="width: 28px; height: 28px; border-radius: 50%; border: 2px solid var(--navy); margin-left: -8px;">
                        <div style="width: 28px; height: 28px; border-radius: 50%; background: #3b82f6; color: white; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; font-weight: bold; border: 2px solid var(--navy); margin-left: -8px;">+21</div>
                    </div>
                </div>
            </div>

            <div class="dashboard-columns" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">

                <!-- Left Column -->
                <div class="left-col">

                    <!-- Quick Actions -->
                    <div class="section-title" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <i class="fa-solid fa-bolt text-navy" style="font-size: 1.2rem;"></i>
                        <h3 class="text-navy" style="font-size: 1.2rem;">Quick Actions</h3>
                    </div>

                    <div class="quick-actions-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2.5rem;">
                        <div class="action-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px; text-align: center; cursor: pointer;">
                            <div class="action-icon" style="width: 48px; height: 48px; border-radius: 50%; background: #e0e7ff; color: var(--navy); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.2rem;">
                                <i class="fa-solid fa-plus-square"></i>
                            </div>
                            <h4 class="text-navy" style="font-size: 0.95rem;">Create New Course</h4>
                        </div>
                        <div class="action-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px; text-align: center; cursor: pointer;">
                            <div class="action-icon" style="width: 48px; height: 48px; border-radius: 50%; background: #e0f2fe; color: #0284c7; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.2rem;">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <h4 class="text-navy" style="font-size: 0.95rem;">Upload Resources</h4>
                        </div>
                        <div class="action-card bg-white shadow" style="padding: 1.5rem; border-radius: 12px; text-align: center; cursor: pointer;">
                            <div class="action-icon" style="width: 48px; height: 48px; border-radius: 50%; background: #dcfce7; color: var(--green); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.2rem;">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <h4 class="text-navy" style="font-size: 0.95rem;">Send Announcement</h4>
                        </div>
                    </div>

                    <!-- Active Courses -->
                    <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 class="text-navy" style="font-size: 1.2rem;">Active Courses</h3>
                        <a href="#" style="color: var(--navy); font-size: 0.9rem; font-weight: 600; text-decoration: none;">View All Courses</a>
                    </div>

                    <div class="active-courses-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 2.5rem;">

                        <!-- Course Card 1 -->
                        <div class="course-card bg-white shadow" style="border-radius: 12px; overflow: hidden;">
                            <div class="course-img" style="height: 140px; background: url('https://images.unsplash.com/photo-1555448248-2571daf6344b?auto=format&fit=crop&q=80&w=800') center/cover; position: relative; display:flex; align-items:flex-end; padding: 1rem;">
                                <span class="badge" style="background: #bbf7d0; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">IN PROGRESS</span>
                            </div>
                            <div class="course-info" style="padding: 1.5rem;">
                                <h4 class="text-navy" style="font-size: 1.1rem; margin-bottom: 0.8rem;">Advanced UX Research</h4>
                                <div style="display: flex; gap: 1.5rem; font-size: 0.85rem; color: var(--gray-dark); margin-bottom: 1.5rem;">
                                    <span><i class="fa-solid fa-users"></i> 245 Students</span>
                                    <span><i class="fa-solid fa-star"></i> 4.9 Rating</span>
                                </div>
                                <div>
                                    <div style="display: flex; justify-content: space-between; font-size: 0.75rem; font-weight: 600; color: var(--gray-dark); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <span>Course Progress</span>
                                        <span>75%</span>
                                    </div>
                                    <div class="progress-bar-bg" style="height: 6px; background: var(--gray-light); border-radius: 3px;">
                                        <div class="progress-bar-fill" style="height: 100%; width: 75%; background: var(--green); border-radius: 3px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course Card 2 -->
                        <div class="course-card bg-white shadow" style="border-radius: 12px; overflow: hidden;">
                            <div class="course-img" style="height: 140px; background: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=800') center/cover; position: relative; display:flex; align-items:flex-end; padding: 1rem;">
                                <span class="badge" style="background: #bbf7d0; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.5px;">IN PROGRESS</span>
                            </div>
                            <div class="course-info" style="padding: 1.5rem;">
                                <h4 class="text-navy" style="font-size: 1.1rem; margin-bottom: 0.8rem;">Cognitive Psychology in Design</h4>
                                <div style="display: flex; gap: 1.5rem; font-size: 0.85rem; color: var(--gray-dark); margin-bottom: 1.5rem;">
                                    <span><i class="fa-solid fa-users"></i> 182 Students</span>
                                    <span><i class="fa-solid fa-star"></i> 4.7 Rating</span>
                                </div>
                                <div>
                                    <div style="display: flex; justify-content: space-between; font-size: 0.75rem; font-weight: 600; color: var(--gray-dark); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <span>Course Progress</span>
                                        <span>42%</span>
                                    </div>
                                    <div class="progress-bar-bg" style="height: 6px; background: var(--gray-light); border-radius: 3px;">
                                        <div class="progress-bar-fill" style="height: 100%; width: 42%; background: var(--green); border-radius: 3px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Recent Student Activity -->
                    <div class="section-title" style="margin-bottom: 1rem;">
                        <h3 class="text-navy" style="font-size: 1.2rem;">Recent Student Activity</h3>
                    </div>

                    <div class="activity-table bg-white shadow" style="border-radius: 12px; overflow: hidden;">
                        <div style="display: grid; grid-template-columns: 1.5fr 2fr 1.5fr 1fr; padding: 1rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: var(--gray-dark); text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid var(--gray-light);">
                            <div>STUDENT</div>
                            <div>ACTION</div>
                            <div>COURSE</div>
                            <div style="text-align: right;">TIME</div>
                        </div>

                        <div class="table-row" style="display: grid; grid-template-columns: 1.5fr 2fr 1.5fr 1fr; padding: 1.2rem 1.5rem; align-items: center; border-bottom: 1px solid var(--gray-light);">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <img src="https://i.pravatar.cc/150?img=5" style="width: 36px; height: 36px; border-radius: 50%;">
                                <span class="text-navy" style="font-weight: 600; font-size: 0.9rem;">Sarah M.</span>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--navy);">Submitted <strong>Assignment 4</strong></div>
                            <div style="font-size: 0.85rem; color: var(--gray-dark); font-style: italic;">UX Research</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark); text-align: right;">2m ago</div>
                        </div>

                        <div class="table-row" style="display: grid; grid-template-columns: 1.5fr 2fr 1.5fr 1fr; padding: 1.2rem 1.5rem; align-items: center; border-bottom: 1px solid var(--gray-light);">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <img src="https://i.pravatar.cc/150?img=8" style="width: 36px; height: 36px; border-radius: 50%;">
                                <span class="text-navy" style="font-weight: 600; font-size: 0.9rem;">David K.</span>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--navy);">Completed <strong>Module 2</strong></div>
                            <div style="font-size: 0.85rem; color: var(--gray-dark); font-style: italic;">Cognitive Psychology</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark); text-align: right;">14m ago</div>
                        </div>

                        <div class="table-row" style="display: grid; grid-template-columns: 1.5fr 2fr 1.5fr 1fr; padding: 1.2rem 1.5rem; align-items: center;">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <img src="https://i.pravatar.cc/150?img=9" style="width: 36px; height: 36px; border-radius: 50%;">
                                <span class="text-navy" style="font-weight: 600; font-size: 0.9rem;">Elena R.</span>
                            </div>
                            <div style="font-size: 0.9rem; color: var(--navy);">Posted a <strong>Question</strong> in forum</div>
                            <div style="font-size: 0.85rem; color: var(--gray-dark); font-style: italic;">UX Research</div>
                            <div style="font-size: 0.8rem; color: var(--gray-dark); text-align: right;">1h ago</div>
                        </div>
                    </div>

                </div>

                <!-- Right Column -->
                <div class="right-col">

                    <div class="section-title" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 class="text-navy" style="font-size: 1.2rem;">Upcoming Deadlines</h3>
                        <i class="fa-regular fa-calendar" style="color: var(--gray-dark); font-size: 1.2rem;"></i>
                    </div>

                    <div class="deadlines-list" style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">

                        <!-- Deadline 1 -->
                        <div class="deadline-card bg-white shadow" style="border-radius: 12px; border-left: 4px solid var(--green); padding: 1.2rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.7rem; font-weight: 700; color: var(--green); letter-spacing: 0.5px;">
                                <span>LIVE SESSION</span>
                                <span style="color: var(--gray-dark);">TODAY</span>
                            </div>
                            <h4 class="text-navy" style="font-size: 1rem; margin-bottom: 0.3rem;">Q&A: User Empathy Maps</h4>
                            <p style="font-size: 0.85rem; color: var(--gray-dark); margin-bottom: 1rem;">4:00 PM - 5:00 PM EST</p>
                            <button class="btn w-100" style="background: #e6fffa; color: #047857; border: none; font-size: 0.9rem;">Join Room</button>
                        </div>

                        <!-- Deadline 2 -->
                        <div class="deadline-card bg-white shadow" style="border-radius: 12px; border-left: 4px solid var(--navy); padding: 1.2rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.7rem; font-weight: 700; color: var(--navy); letter-spacing: 0.5px;">
                                <span>GRADING</span>
                                <span style="color: var(--gray-dark);">TOMORROW</span>
                            </div>
                            <h4 class="text-navy" style="font-size: 1rem; margin-bottom: 0.3rem;">Case Study Submissions</h4>
                            <p style="font-size: 0.85rem; color: var(--gray-dark); margin-bottom: 1rem;">Advanced UX Research</p>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div class="progress-bar-bg" style="height: 4px; flex: 1; background: var(--gray-light); border-radius: 2px;">
                                    <div class="progress-bar-fill" style="height: 100%; width: 20%; background: var(--navy); border-radius: 2px;"></div>
                                </div>
                                <span style="font-size: 0.75rem; font-weight: 600; color: var(--gray-dark);">2/10</span>
                            </div>
                        </div>

                        <!-- Deadline 3 -->
                        <div class="deadline-card bg-white shadow" style="border-radius: 12px; border-left: 4px solid #cbd5e1; padding: 1.2rem;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem; font-size: 0.7rem; font-weight: 700; color: var(--gray-dark); letter-spacing: 0.5px;">
                                <span>ANNOUNCEMENT</span>
                                <span>OCT 14</span>
                            </div>
                            <h4 class="text-navy" style="font-size: 1rem; margin-bottom: 0.3rem;">Module 3 Release</h4>
                            <p style="font-size: 0.85rem; color: var(--gray-dark);">Scheduled Deployment</p>
                        </div>

                    </div>

                    <!-- Floating Plus button (positioned relatively within right col for visual match) -->
                    <div style="display: flex; justify-content: flex-end; margin-bottom: -20px; position: relative; z-index: 10; padding-right: 1rem;">
                        <button style="width: 50px; height: 50px; border-radius: 50%; background: var(--green); color: white; border: none; font-size: 1.5rem; box-shadow: 0 4px 10px rgba(0,0,0,0.15); display: flex; align-items: center; justify-content: center; cursor: pointer;">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <!-- Did you know card -->
                    <div class="tip-card" style="background: var(--navy); color: white; border-radius: 12px; padding: 1.8rem; margin-bottom: 2rem; position: relative; overflow: hidden;">
                        <i class="fa-regular fa-lightbulb" style="font-size: 1.5rem; margin-bottom: 1rem; display: block;"></i>
                        <h3 style="font-size: 1.2rem; margin-bottom: 0.8rem; font-weight: 600;">Did you know?</h3>
                        <p style="font-size: 0.95rem; color: #e2e8f0; line-height: 1.5; margin-bottom: 1.5rem;">Students who engage in the community forum twice weekly show 40% higher completion rates in your courses.</p>
                        <a href="#" style="color: white; font-size: 0.9rem; font-weight: 600; text-decoration: underline; text-underline-offset: 4px;">Review Community Stats</a>
                    </div>

                    <div class="section-title" style="margin-bottom: 1rem;">
                        <h3 class="text-navy" style="font-size: 1.2rem;">Latest Feedback</h3>
                    </div>

                    <div class="feedback-card bg-white shadow" style="border-radius: 12px; padding: 1.5rem;">
                        <p style="font-style: italic; color: var(--gray-dark); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">"Professor's explanation of cognitive load in Module 1 was the most clear I've ever encountered."</p>
                        <div style="display: flex; align-items: center; gap: 0.8rem;">
                            <div style="width: 24px; height: 24px; border-radius: 50%; background: #e2e8f0;"></div>
                            <span style="font-size: 0.85rem; font-weight: 600; color: var(--navy);">— Anonymous Student</span>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

    <script src="app.js"></script>
</body>
</html>
