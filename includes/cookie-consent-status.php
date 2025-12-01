<?php
/**
 * Cookie Consent Status Component
 * 
 * Toont de huidige consent status en een link om de banner te openen.
 * Gebruik: <?php get_template_part('includes/cookie-consent-status'); ?>
 * Of via shortcode: [cookie_consent_status]
 */

// Enqueue the JavaScript file
wp_enqueue_script(
    'cookie-consent-status',
    get_template_directory_uri() . '/assets/js/cookie-consent-status.js',
    [],
    filemtime(get_template_directory() . '/assets/js/cookie-consent-status.js'),
    true
);
?>

<div id="cookie-consent-status" class="my-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
    <div class="flex flex-col gap-3">
        <div>
            <p class="text-gray-700 font-medium mb-1">Je huidige staat:</p>
            <p id="consent-status-text" class="text-gray-600">
                <span class="inline-flex items-center gap-2">
                    <span id="consent-status-icon" class="w-3 h-3 rounded-full" style="background-color: #9CA3AF;"></span>
                    <span id="consent-status-label">Laden...</span>
                </span>
            </p>
        </div>
        <div>
            <a href="#" id="manage-consent-link" class="inline-flex items-center gap-2 text-primary-700 hover:text-primary-800 font-medium hover:underline cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
                Beheer je toestemming
            </a>
        </div>
    </div>
</div>
