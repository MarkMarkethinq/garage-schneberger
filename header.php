<!DOCTYPE html>
<html class="no-js"dir="ltr" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php wp_head() ?>
    <!--
     ____                 _             _             
    |  _ \  _____   _____| | ___  _ __ (_)_ __   __ _ 
    | | | |/ _ \ \ / / _ \ |/ _ \| '_ \| | '_ \ / _` |
    | |_| |  __/\ V /  __/ | (_) | |_) | | | | | (_| |
    |____/ \___| \_/ \___|_|\___/| .__/|_|_| |_|\__, |
                                  |_|            |___/ 
		-->
        
  </head>
  <body <?php body_class(); ?>>
<?php
// Get ACF header options
$header_logo = get_field('header_logo', 'option');
$header_button = get_field('header_button_link', 'option');
?>

<!-- <header class="py-5 lg:fixed transition-all top-0 left-0 z-50 duration-500 w-full bg-white border-b border-gray-200"> -->
    <header class="py-5 transition-all  left-0 z-50 duration-500 w-full bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center">
          <?php if($header_logo): ?>
            <div class="h-12 flex items-center">
              <img src="<?php echo esc_url($header_logo['url']); ?>" 
                   alt="<?php echo esc_attr($header_logo['alt'] ?: get_bloginfo('name')); ?>" 
                   class="h-12 w-auto object-contain">
            </div>
          <?php elseif(has_custom_logo()): ?>
            <div class="h-12 flex items-center">
              <?php 
              $custom_logo_id = get_theme_mod('custom_logo');
              $logo = wp_get_attachment_image($custom_logo_id, 'full', false, array(
                'class' => 'h-12 w-auto object-contain',
              ));
              echo $logo;
              ?>
            </div>
          <?php else: ?>
            <span class="text-xl font-semibold"><?php bloginfo('name'); ?></span>
          <?php endif; ?>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center flex-1 justify-center px-8">
          <?php wp_nav_menu ([
                        'menu' => 'main',
                        'container' => 'ul',
                        'menu_class' => 'flex gap-8 items-center text-sm md:text-base font-medium text-gray-500',
                        'walker' => new WPDocs_Walker_Nav_Menu ()
                    ]);  ?>
        </div>

        <!-- Search & CTA -->
        <div class="hidden lg:flex items-center gap-4">
          <?php if($header_button && $header_button['url']): ?>
            <a href="<?php echo esc_url($header_button['url']); ?>"
              class="bg-primary-700 text-white rounded-lg cursor-pointer font-medium text-center shadow-xs transition-all duration-500 py-2.5 px-5 text-sm hover:bg-primary-800 whitespace-nowrap"
              <?php if($header_button['target']): ?>target="<?php echo esc_attr($header_button['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($header_button['title'] ?: 'Plan een afspraak'); ?>
            </a>
          <?php else: ?>
            <a href="/contact"
              class="bg-primary-700 text-white rounded-lg cursor-pointer font-medium text-center shadow-xs transition-all duration-500 py-2.5 px-5 text-sm hover:bg-primary-800 whitespace-nowrap">
              Plan een afspraak
            </a>
          <?php endif; ?>
        </div>

        <!-- Mobile Menu Toggle -->
        <button data-collapse-toggle="navbar" type="button"
          class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
    </div>
</header>