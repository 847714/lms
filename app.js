// app.js

document.addEventListener('DOMContentLoaded', () => {
    // Service Worker Registration for PWA support
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('sw.js')
                .then(registration => {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                })
                .catch(err => {
                    console.log('ServiceWorker registration failed: ', err);
                });
        });
    }

    // Button Interaction Listeners
    const shareBtn = document.getElementById('shareBtn');
    if (shareBtn) {
        shareBtn.addEventListener('click', () => {
            // Simple mockup action
            alert('Opening LinkedIn Share Dialog...\n\n"I just earned my Advanced Behavioral Economics Certificate from Lumina Academy!"');
        });
    }

    const downloadBtn = document.getElementById('downloadBtn');
    if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
            // Simple mockup action
            alert('Preparing PDF Download...\n\nAlexandria_Sterling_Lumina_Certificate.pdf');
        });
    }

    // Navigation highlight (Mock logic for demonstration)
    const navLinks = document.querySelectorAll('.nav-links a');
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent default for demo purposes
            // Remove active class from all
            navLinks.forEach(l => l.classList.remove('active', 'border-bottom-blue'));
            // Add to clicked
            link.classList.add('active', 'border-bottom-blue');
        });
    });

    // Sidebar highlight (Mock logic)
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            sidebarLinks.forEach(l => l.classList.remove('active-sidebar'));
            link.classList.add('active-sidebar');
        });
    });
});

// Leaderboard interactivity
document.addEventListener('DOMContentLoaded', () => {
    // Time toggles
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            toggleBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });
});
