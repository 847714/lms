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

    // --- Global Interactivity & Toast Notifications --- //

    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.textContent = message;

        // Basic styling for the toast, appended dynamically
        Object.assign(toast.style, {
            position: 'fixed',
            bottom: '20px',
            right: '20px',
            backgroundColor: type === 'error' ? '#ef4444' : '#0f172a',
            color: '#ffffff',
            padding: '12px 24px',
            borderRadius: '8px',
            boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1)',
            zIndex: '9999',
            fontFamily: "'Inter', sans-serif",
            fontWeight: '500',
            opacity: '0',
            transform: 'translateY(20px)',
            transition: 'opacity 0.3s ease, transform 0.3s ease'
        });

        document.body.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.style.opacity = '1';
            toast.style.transform = 'translateY(0)';
        }, 10);

        // Remove after 3 seconds
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Attach listener to all generic buttons and dummy links
    document.querySelectorAll('a[href="#"], button:not([type="submit"]):not(#shareBtn):not(#downloadBtn)').forEach(element => {
        element.addEventListener('click', (e) => {
            e.preventDefault();
            let actionText = element.textContent.trim() || 'Action';

            // Clean up FontAwesome icons from text
            actionText = actionText.replace(/<[^>]*>?/gm, '').trim();

            // Provide a context-aware message based on the button text
            let message = `${actionText} feature coming soon.`;

            if (actionText.toLowerCase().includes('download') || actionText.toLowerCase().includes('pdf')) {
                message = `Generating PDF for ${actionText}...`;
                showToast(message, 'info');
                setTimeout(() => showToast('Download Complete!', 'success'), 1500);
                return;
            }
            if (actionText.toLowerCase().includes('share')) {
                message = `Opening Share Dialog for ${actionText}...`;
            }
            if (actionText.toLowerCase().includes('message') || actionText.toLowerCase().includes('contact')) {
                message = `Opening Messaging Portal...`;
            }
            if (actionText.toLowerCase().includes('upload')) {
                 message = `Opening File Picker for ${actionText}...`;
            }
            if (actionText.toLowerCase().includes('analytics') || actionText.toLowerCase().includes('view all')) {
                 message = `Loading full dashboard data...`;
            }

            showToast(message);
        });
    });

    // Sidebar highlight (Mock logic)
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        if(link.getAttribute('href') !== '#') return; // Only mock empty links
        link.addEventListener('click', (e) => {
            e.preventDefault();
            sidebarLinks.forEach(l => l.classList.remove('active-sidebar'));
            link.classList.add('active-sidebar');
        });
    });

    // Time toggles (Leaderboard)
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            toggleBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            showToast(`Leaderboard filtered by ${btn.textContent.trim()}`);
        });
    });
});
