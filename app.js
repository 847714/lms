document.addEventListener('DOMContentLoaded', () => {
    console.log('App initialized.');

    const actionBtn = document.getElementById('action-btn');
    const contentSection = document.getElementById('content');

    if (actionBtn && contentSection) {
        actionBtn.addEventListener('click', () => {
            // Check if alert box already exists
            const existingAlert = document.getElementById('js-alert');
            if (existingAlert) {
                existingAlert.remove();
            }

            // Create a simple alert element
            const alertBox = document.createElement('div');
            alertBox.id = 'js-alert';
            alertBox.style.marginTop = '1rem';
            alertBox.style.padding = '1rem';
            alertBox.style.backgroundColor = '#ffeb3b';
            alertBox.style.color = '#333';
            alertBox.style.border = '1px solid #fbc02d';
            alertBox.style.borderRadius = '4px';
            alertBox.style.textAlign = 'center';
            alertBox.textContent = 'Button clicked! JavaScript is working.';

            // Append it to the content section
            contentSection.appendChild(alertBox);

            // Automatically remove it after 3 seconds
            setTimeout(() => {
                if (alertBox.parentNode) {
                    alertBox.remove();
                }
            }, 3000);
        });
    }

    // Register Service Worker for PWA support (offline caching)
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, err => {
                    console.log('ServiceWorker registration failed: ', err);
                });
        });
    }
});
