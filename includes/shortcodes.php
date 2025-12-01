<?php
/**
 * Custom Shortcodes
 */

/**
 * Cookie Consent Status Shortcode
 * 
 * Gebruik: [cookie_consent_status]
 * Toont de huidige consent status en een link om de cookie banner te openen.
 */
add_shortcode('cookie_consent_status', function() {
    ob_start();
    get_template_part('includes/cookie-consent-status');
    return ob_get_clean();
});
