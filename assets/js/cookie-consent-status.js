/**
 * Cookie Consent Status Component
 * Werkt met Complianz GDPR/CCPA Cookie Consent plugin
 */
(function() {
    'use strict';

    function initConsentStatus() {
        const statusLabel = document.getElementById('consent-status-label');
        const statusIcon = document.getElementById('consent-status-icon');
        const manageLink = document.getElementById('manage-consent-link');

        if (!statusLabel || !statusIcon || !manageLink) {
            return;
        }

        // Function to get cookie value
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return null;
        }

        // Function to update consent status display
        function updateConsentStatus() {
            let statusText = 'Onbekend';
            let iconColor = '#9CA3AF'; // gray

            // Check Complianz consent cookies
            const consentStatus = getCookie('cmplz_consent_status');
            const bannerStatus = getCookie('cmplz_banner_status');
            const policyId = getCookie('cmplz_policy_id');

            // Check individual category cookies
            const marketing = getCookie('cmplz_marketing') === 'allow';
            const statistics = getCookie('cmplz_statistics') === 'allow';
            const preferences = getCookie('cmplz_preferences') === 'allow';

            // Determine status
            if (consentStatus === 'allow' || bannerStatus === 'dismissed' || policyId) {
                if (marketing || statistics || preferences) {
                    statusText = 'Toestemming geaccepteerd';
                    iconColor = '#22C55E'; // green
                } else {
                    statusText = 'Alleen functionele cookies';
                    iconColor = '#EAB308'; // yellow
                }
            } else if (consentStatus === 'deny') {
                statusText = 'Toestemming geweigerd';
                iconColor = '#EF4444'; // red
            } else {
                statusText = 'Nog geen keuze gemaakt';
                iconColor = '#9CA3AF'; // gray
            }

            statusLabel.textContent = statusText;
            statusIcon.style.backgroundColor = iconColor;
        }

        // Open Complianz banner by clicking the manage consent button
        function openCookieBanner(e) {
            e.preventDefault();

            // Find and click the Complianz manage consent button
            const manageConsentBtn = document.querySelector('.cmplz-manage-consent');
            if (manageConsentBtn) {
                manageConsentBtn.click();
                return;
            }

            // Fallback: Find button inside #cmplz-manage-consent container
            const manageConsentContainer = document.getElementById('cmplz-manage-consent');
            if (manageConsentContainer) {
                const btn = manageConsentContainer.querySelector('button');
                if (btn) {
                    btn.click();
                    return;
                }
            }
        }

        // Bind click event
        manageLink.addEventListener('click', openCookieBanner);

        // Initial status update
        updateConsentStatus();

        // Listen for Complianz consent changes
        document.addEventListener('cmplz_status_change', updateConsentStatus);
        document.addEventListener('cmplz_cookie_warning_loaded', updateConsentStatus);
        
        // Update on storage changes (for cross-tab sync)
        window.addEventListener('storage', updateConsentStatus);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initConsentStatus);
    } else {
        initConsentStatus();
    }
})();
