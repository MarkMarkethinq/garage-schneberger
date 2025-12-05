<!DOCTYPE html>
<html class="no-js"dir="ltr" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lora font wordt nu lokaal gehost in /assets/fonts/ -->
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
$mobile_menu_contact_label = get_field('mobile_menu_contact_label', 'option');
$mobile_menu_phone = get_field('mobile_menu_phone', 'option');
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
              class="bg-primary-700 border border-primary-700 text-white rounded-xl cursor-pointer font-medium text-center shadow-xs transition-all duration-500 py-2.5 px-5 text-sm hover:bg-transparent hover:text-primary-700 whitespace-nowrap"
              <?php if($header_button['target']): ?>target="<?php echo esc_attr($header_button['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($header_button['title'] ?: 'Plan een afspraak'); ?>
            </a>
          <?php else: ?>
            <a href="/contact"
              class="bg-primary-700 border border-primary-700 text-white rounded-xl cursor-pointer font-medium text-center shadow-xs transition-all duration-500 py-2.5 px-5 text-sm hover:bg-transparent hover:text-primary-700 whitespace-nowrap">
              Plan een afspraak
            </a>
          <?php endif; ?>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle" type="button"
          class="relative z-50 inline-flex items-center p-2 text-sm text-gray-700 rounded-xl lg:hidden hover:bg-gray-100 focus:outline-none transition-all duration-300"
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!-- Hamburger Icon -->
          <svg id="hamburger-icon" class="w-6 h-6 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <!-- Close Icon (hidden by default) -->
          <svg id="close-icon" class="w-6 h-6 hidden transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>
</header>

<style>
  #mobile-menu a,
  #mobile-menu .menu-item a,
  #mobile-menu nav a {
    color: white !important;
  }
  #mobile-menu .sub-menu a {
    color: rgba(255,255,255,0.8) !important;
  }
  #mobile-menu .sub-menu a:hover {
    color: white !important;
  }
</style>

<!-- Mobile Menu Overlay - Liquid Glass Design -->
<div id="mobile-menu" class="fixed inset-0 z-40 lg:hidden hidden overflow-hidden">
  <!-- Backdrop with blur -->
  <div id="mobile-menu-backdrop" class="absolute inset-0 bg-[#1C1C1E]/95 backdrop-blur-xl transition-opacity duration-500 opacity-0"></div>
  
  <!-- Menu Content -->
  <div class="relative z-10 h-full flex flex-col overflow-hidden">
    <!-- Header spacer to align with main header -->
    <div class="h-[72px] flex-shrink-0"></div>
    
    <!-- Menu Items Container -->
    <div class="flex-1 px-6 py-8 overflow-hidden">
      <!-- Liquid Glass Card -->
      <div id="mobile-menu-card" class="bg-white/10 backdrop-blur-md border border-white/60 rounded-3xl p-6 shadow-2xl transform translate-y-8 opacity-0 transition-all duration-500">
        
        <!-- Navigation Menu -->
        <nav class="mb-8 text-white">
          <?php wp_nav_menu([
            'menu' => 'main',
            'container' => false,
            'menu_class' => 'space-y-2 text-white',
            'link_before' => '<span class="text-white">',
            'link_after' => '</span>',
            'walker' => new Mobile_Menu_Walker()
          ]); ?>
        </nav>
        
        <!-- Divider -->
        <div class="h-px bg-gradient-to-r from-transparent via-white/30 to-transparent my-6"></div>
        
        <!-- CTA Button -->
        <?php if($header_button && $header_button['url']): ?>
          <a href="<?php echo esc_url($header_button['url']); ?>"
            class="block w-full bg-white/10 border border-white/60 text-white rounded-2xl py-4 px-6 text-center font-medium text-base backdrop-blur hover:bg-white/20 transition-all duration-300"
            <?php if($header_button['target']): ?>target="<?php echo esc_attr($header_button['target']); ?>"<?php endif; ?>>
            <?php echo esc_html($header_button['title'] ?: 'Plan een afspraak'); ?>
          </a>
        <?php else: ?>
          <a href="/contact"
            class="block w-full bg-white/10 border border-white/60 text-white rounded-2xl py-4 px-6 text-center font-medium text-base backdrop-blur hover:bg-white/20 transition-all duration-300">
            Plan een afspraak
          </a>
        <?php endif; ?>
      </div>
      
      <!-- Contact Info (optional) -->
      <?php if($mobile_menu_contact_label || $mobile_menu_phone): ?>
      <div id="mobile-menu-contact" class="mt-6 text-center transform translate-y-8 opacity-0 transition-all duration-500 delay-200">
        <?php if($mobile_menu_contact_label): ?>
          <p class="text-white/60 text-sm"><?php echo esc_html($mobile_menu_contact_label); ?></p>
        <?php endif; ?>
        <?php if($mobile_menu_phone): ?>
          <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $mobile_menu_phone)); ?>" class="text-white font-medium text-lg hover:text-white/80 transition-colors"><?php echo esc_html($mobile_menu_phone); ?></a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
    
    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2 pointer-events-none"></div>
    <div class="absolute top-1/4 right-0 w-48 h-48 bg-white/5 rounded-full blur-3xl translate-x-1/2 pointer-events-none"></div>
  </div>
</div>