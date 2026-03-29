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
    <title>Scholar Certificate - Lumina Academy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="manifest" href="manifest.json">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray">
    <header class="navbar bg-white">
        <div class="nav-left">
            <a href="#" class="logo text-navy">Lumina Academy</a>
        </div>
        <div class="nav-center">
            <nav class="nav-links">
                <a href="#">Dashboard</a>
                <a href="#">Courses</a>
                <a href="index.php" class="active border-bottom-blue">Certificates</a>
                <a href="leaderboard.php">Leaderboard</a>
            </nav>
        </div>
        <div class="nav-right">
            <i class="fa-solid fa-bell icon-action"></i>
            <span style="margin: 0 1rem; font-weight: 500;"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
            <a href="logout.php" class="btn btn-outline" style="text-decoration: none; padding: 0.5rem 1rem;">Logout</a>
        </div>
    </header>

    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar bg-white">
            <div class="sidebar-header">
                <h2>Scholar Portal</h2>
                <p>Lumina Academy</p>
            </div>
            <nav class="sidebar-nav">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-table-cells-large"></i> Dashboard
                </a>
                <a href="#" class="sidebar-link active-sidebar">
                    <i class="fa-solid fa-certificate"></i> Credentials
                </a>
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-book"></i> Archive
                </a>
                <a href="#" class="sidebar-link">
                    <i class="fa-regular fa-circle-question"></i> Support
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <div class="header-text">
                    <h1>Credential Preview</h1>
                    <p>View and share your official academic achievement.</p>
                </div>
                <div class="header-actions">
                    <button class="btn-outline-share" id="shareBtn">
                        <i class="fa-solid fa-share-nodes"></i> Share to LinkedIn
                    </button>
                    <button class="btn-primary-download" id="downloadBtn">
                        <i class="fa-solid fa-download"></i> Download PDF
                    </button>
                </div>
            </div>

            <div class="certificate-container bg-white shadow">
                <div class="certificate-border-outer">
                    <div class="certificate-border-inner">
                        <div class="certificate-content">

                            <div class="cert-logo">
                                <i class="fa-solid fa-building-columns"></i>
                                <h2>L U M I N A  A C A D E M Y</h2>
                            </div>

                            <h1 class="cert-title">Certificate of Completion</h1>
                            <p class="cert-subtitle">This is to certify that</p>

                            <h2 class="student-name">Alexandria J. Sterling</h2>
                            <div class="divider-line"></div>

                            <p class="cert-text">Has successfully completed the course</p>
                            <h3 class="course-name">Advanced Behavioral Economics</h3>

                            <div class="cert-footer">
                                <div class="signature-block">
                                    <div class="signature-font">Julian Thorne</div>
                                    <div class="signature-line"></div>
                                    <p class="role">COURSE INSTRUCTOR</p>
                                </div>

                                <div class="seal-container">
                                     <div class="seal-outer">
                                         <div class="seal-inner">
                                             <i class="fa-solid fa-check text-green"></i>
                                             <span class="seal-text">OFFICIAL SEAL<br>LUMINA ACADEMIC</span>
                                         </div>
                                     </div>
                                </div>

                                <div class="signature-block">
                                    <div class="signature-font">Sarah Luminara</div>
                                    <div class="signature-line"></div>
                                    <p class="role">ACADEMY DIRECTOR</p>
                                </div>
                            </div>

                            <div class="cert-meta">
                                <span>DATE: OCTOBER 24, 2024</span>
                                <span>CERTIFICATE ID: LA-982-X12</span>
                                <span>VERIFY: LUMINA.ACADEMY/VERIFY</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="info-cards-grid">
                <div class="info-card bg-white shadow">
                    <i class="fa-solid fa-medal text-green card-icon"></i>
                    <h3>Verified Credential</h3>
                    <p>This certificate is cryptographically signed and stored on the Lumina Academic Ledger for instant verification.</p>
                </div>
                <div class="info-card bg-white shadow">
                    <i class="fa-solid fa-graduation-cap text-navy card-icon"></i>
                    <h3>Academic Rigor</h3>
                    <p>Completion requires a 90% or higher on the capstone examination and peer-reviewed project submission.</p>
                </div>
                <div class="info-card bg-white shadow">
                    <i class="fa-solid fa-award text-navy card-icon"></i>
                    <h3>Member Rewards</h3>
                    <p>As a recipient, you now have permanent access to the Behavioral Economics Alumni Resource Portal.</p>
                </div>
            </div>

        </main>
    </div>

    <footer class="footer-simple">
        <div class="footer-left">
            <span>&copy; 2024 LUMINA ACADEMY. VERIFIED ACADEMIC CREDENTIAL.</span>
        </div>
        <div class="footer-right">
            <a href="#">PRIVACY POLICY</a>
            <a href="#">VERIFICATION PORTAL</a>
            <a href="#">TERMS OF EXCELLENCE</a>
        </div>
    </footer>

    <script src="app.js"></script>
</body>
</html>