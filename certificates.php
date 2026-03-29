<?php
session_start();
include 'helpers.php';
include 'config.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    die();
}

$pageTitle = "Credentials - Lumina Academy";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .dashboard-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: calc(100vh - 70px);
            background: #f8fafc;
        }

        .sidebar {
            background: white;
            border-right: 1px solid #e2e8f0;
            padding: 2rem 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 0 2rem 2rem;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 1rem;
        }

        .sidebar-title {
            color: #1a2a40;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .sidebar-subtitle {
            color: #64748b;
            font-size: 0.85rem;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 0 1rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #475569;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            background: #f1f5f9;
            color: #1a2a40;
        }

        .sidebar-link.active {
            background: #f1f5f9;
            color: #1a2a40;
            font-weight: 600;
            border-left: 3px solid #1a2a40;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .certificate-container {
            padding: 2rem 3rem;
            width: 100%;
            box-sizing: border-box;
            background: #fff;
            min-height: 100vh;
        }

        .cert-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .cert-header h1 {
            color: #1a2a40;
            font-size: 1.8rem;
            margin-bottom: 0.25rem;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        .cert-header p {
            color: #64748b;
            font-size: 0.95rem;
            margin: 0;
        }

        .cert-actions {
            display: flex;
            gap: 1rem;
        }

        .cert-actions .btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #cbd5e1;
            color: #1a2a40;
        }

        .btn-outline:hover {
            background: #f1f5f9;
        }

        .btn-navy {
            background: #1a2a40;
            color: white;
            border: none;
        }

        .btn-navy:hover {
            background: #0f172a;
        }

        /* Certificate Design */
        .certificate {
            background: white;
            border: 1px solid #e2e8f0;
            padding: 2rem;
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin: 0 auto;
            max-width: 900px;
        }

        .certificate-inner {
            border: 1px solid #1a2a40;
            padding: 3rem 4rem;
            text-align: center;
            position: relative;
        }

        .certificate-inner::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 2px solid #1a2a40;
            pointer-events: none;
        }

        .cert-logo {
            color: #1a2a40;
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cert-logo i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .cert-logo-text {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            letter-spacing: 0.3em;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .cert-title {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 3.5rem;
            color: #1a2a40;
            margin: 1rem 0 1.5rem;
            font-weight: 400;
        }

        .cert-subtitle {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .cert-recipient {
            font-family: 'Inter', sans-serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: #1a2a40;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
            display: inline-block;
            min-width: 60%;
        }

        .cert-course-pre {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            color: #64748b;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .cert-course-title {
            font-family: 'Inter', sans-serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: #1a2a40;
            margin-bottom: 4rem;
        }

        .cert-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 3rem;
            position: relative;
            z-index: 1;
            padding: 0 2rem;
        }

        .signature-block {
            text-align: center;
            width: 30%;
        }

        .signature {
            font-family: 'Playfair Display', serif;
            font-style: italic;
            font-size: 1.8rem;
            color: #1a2a40;
            margin-bottom: 0.5rem;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 0.5rem;
        }

        .signature-title {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-family: 'Inter', sans-serif;
        }

        .signature-meta {
            font-size: 0.7rem;
            color: #94a3b8;
            margin-top: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-family: 'Inter', sans-serif;
        }

        .seal-container {
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .seal {
            width: 90px;
            height: 90px;
            border: 2px dashed #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #10b981;
            position: relative;
            margin-bottom: 0;
        }

        .seal-inner {
            width: 75px;
            height: 75px;
            border: 1px solid #10b981;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(16, 185, 129, 0.05);
        }

        .seal i {
            font-size: 1.2rem;
            margin-bottom: 0.2rem;
        }

        .seal-text {
            font-size: 0.4rem;
            text-align: center;
            font-weight: 600;
            line-height: 1.2;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>

    <?php renderHeader(); ?>

    <main class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Scholar Portal</h2>
                <p class="sidebar-subtitle">Lumina Academy</p>
            </div>

            <nav class="sidebar-nav">
                <a href="<?php echo $_SESSION['role'] === 'teacher' ? 'teacher-dashboard.php' : 'admin-dashboard.php'; ?>" class="sidebar-link">
                    <i class="fa-solid fa-table-columns"></i> Dashboard
                </a>
                <a href="certificates.php" class="sidebar-link active">
                    <i class="fa-solid fa-award"></i> Credentials
                </a>
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-box-archive"></i> Archive
                </a>
                <a href="#" class="sidebar-link" style="margin-top: 2rem;">
                    <i class="fa-solid fa-circle-question"></i> Support
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <section class="dashboard-content" style="background: #fff; padding: 0;">
            <div class="certificate-container">
                <div class="cert-header">
                    <div>
                        <h1>Credential Preview</h1>
                        <p>View and share your official academic achievement.</p>
                    </div>
                    <div class="cert-actions">
                        <a href="#" class="btn btn-outline">
                            <i class="fa-solid fa-share-nodes"></i> Share to LinkedIn
                        </a>
                        <a href="#" class="btn btn-navy">
                            <i class="fa-solid fa-download"></i> Download PDF
                        </a>
                    </div>
                </div>

                <div class="certificate">
                    <div class="certificate-inner">
                        <div class="cert-logo">
                            <i class="fa-solid fa-building-columns"></i>
                            <div class="cert-logo-text">L U M I N A  A C A D E M Y</div>
                        </div>

                        <div class="cert-title">Certificate of Completion</div>

                        <div class="cert-subtitle">This is to certify that</div>

                        <div class="cert-recipient"><?php echo htmlspecialchars($_SESSION['name']); ?></div>

                        <div class="cert-course-pre">Has successfully completed the course</div>

                        <div class="cert-course-title">Advanced Behavioral Economics</div>

                        <div class="cert-footer">
                            <div class="signature-block">
                                <div class="signature">Julian Thorne</div>
                                <div class="signature-title">COURSE INSTRUCTOR</div>
                                <div class="signature-meta">DATE: OCTOBER 24, 2024</div>
                            </div>

                            <div class="seal-container">
                                <div class="seal">
                                    <div class="seal-inner">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="seal-text">OFFICIAL SEAL<br>LUMINA ACADEMIC</div>
                                    </div>
                                </div>
                                <div class="signature-meta">CERTIFICATE ID: LA-982-X12</div>
                            </div>

                            <div class="signature-block">
                                <div class="signature">Sarah Luminara</div>
                                <div class="signature-title">ACADEMY DIRECTOR</div>
                                <div class="signature-meta">VERIFY: LUMINA.ACADEMY/VERIFY</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="app.js"></script>
</body>
</html>
