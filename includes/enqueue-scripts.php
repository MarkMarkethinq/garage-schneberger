<?php
add_action('wp_enqueue_scripts', function () {
    // Styles
    wp_enqueue_style('myfirsttheme-style', get_stylesheet_uri());
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind-output.css', [], '1.0');
    wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.css', [], '1.0');
    // AOS CSS - probeer eerst lokaal, dan CDN
    wp_enqueue_style('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.css', [], '1.0');
    
    // Scripts
    wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js', [], '1.0', true);
    
    // AOS JS - probeer eerst lokaal, dan CDN als fallback
    wp_enqueue_script('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.js', [], '1.0', true);
    
    // Fallback AOS via CDN als lokaal niet werkt
    wp_add_inline_script('aos', '
        // Controleer of AOS geladen is, zo niet, laad via CDN
        if (typeof AOS === "undefined") {
            console.log("AOS lokaal niet geladen, probeer CDN...");
            var aosCSS = document.createElement("link");
            aosCSS.rel = "stylesheet";
            aosCSS.href = "https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css";
            document.head.appendChild(aosCSS);
            
            var aosJS = document.createElement("script");
            aosJS.src = "https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js";
            aosJS.onload = function() {
                console.log("AOS via CDN geladen");
                if (typeof AOS !== "undefined") {
                    AOS.init({
                        duration: 800,
                        easing: "ease-in-out",
                        once: true,
                        offset: 100,
                        disable: false
                    });
                }
            };
            document.head.appendChild(aosJS);
        }
    ');
    wp_enqueue_script('app-js', get_template_directory_uri() . '/assets/js/app.js', ['jquery', 'slick', 'swiper', 'aos'], '1.0', true);
    
    // Voeg inline script toe om AOS te forceren in incognito modus
    wp_add_inline_script('aos', '
        // Forceer AOS initialisatie na script loading
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof AOS !== "undefined") {
                AOS.init({
                    duration: 800,
                    easing: "ease-in-out",
                    once: true,
                    offset: 100,
                    disable: false
                });
                console.log("AOS geforceerd geïnitialiseerd");
            }
        });
    ');
});

// Laad Tailwind CSS in de Gutenberg editor
add_action('enqueue_block_editor_assets', function() {
    wp_enqueue_style('tailwind-editor', get_template_directory_uri() . '/assets/css/tailwind-output.css', [], '1.0');
    
    // Voeg specifieke CSS toe om problemen met ACF velden in de editor op te lossen
    wp_add_inline_style('tailwind-editor', '
        /* Zorg ervoor dat ACF velden bewerkbaar blijven in de editor */
        .acf-block-preview .acf-field input,
        .acf-block-preview .acf-field textarea,
        .acf-block-preview .acf-field select,
        .acf-block-fields input,
        .acf-block-fields textarea,
        .acf-block-fields select {
            background-color: #fff !important;
            color: #000 !important;
            opacity: 1 !important;
            cursor: text !important;
            pointer-events: auto !important;
        }
        
        /* Zorg ervoor dat ACF fields hun border en styling behouden */
        .acf-fields .acf-field .acf-input input,
        .acf-fields .acf-field .acf-input textarea,
        .acf-fields .acf-field .acf-input select {
            background-color: #fff !important;
            color: #000 !important;
            border: 1px solid #ccc !important;
            pointer-events: auto !important;
        }
        
        /* Zorg ervoor dat knoppen in de editor klikbaar blijven */
        .acf-fields .acf-field .acf-input .acf-button,
        .acf-fields .acf-field .acf-input .button {
            cursor: pointer !important;
            pointer-events: auto !important;
            opacity: 1 !important;
        }
    ');
});
