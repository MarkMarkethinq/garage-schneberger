<?php
/**
 * Contact Map Block Template
 */
?>
<style>
.gf-dark-mode .gfield_label,
.gf-dark-mode .gfield_required,
.gf-dark-mode .ginput_container label,
.gf-dark-mode .gfield_description {
    color: white !important;
}
.gf-dark-mode input,
.gf-dark-mode textarea,
.gf-dark-mode select {
    background: rgba(255,255,255,0.1) !important;
    border-color: rgba(255,255,255,0.3) !important;
    color: white !important;
}
.gf-dark-mode input::placeholder,
.gf-dark-mode textarea::placeholder {
    color: rgba(255,255,255,0.5) !important;
}
.gf-dark-mode .gform_button,
.gf-dark-mode button[type="submit"] {
    background: rgba(255,255,255,0.1) !important;
    border: 1px solid rgba(255,255,255,0.6) !important;
    color: white !important;
    backdrop-filter: blur(10px);
}
.gf-dark-mode .gform_button:hover,
.gf-dark-mode button[type="submit"]:hover {
    background: rgba(255,255,255,0.2) !important;
}
</style>
<?php

// Get ACF fields
$title = get_field('title');
$subtitle = get_field('subtitle');
$gravity_form_shortcode = get_field('gravity_form_shortcode');
$map_embed_code = get_field('map_embed_code');
$map_zoom = get_field('map_zoom');
$contact_cards = get_field('contact_cards');
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = '';
$title_classes = 'text-primary-700';
$subtitle_classes = 'text-gray-500';
$form_bg_classes = 'bg-[#fafafa] border-gray-200';
$form_dark_mode = false;
$card_bg_classes = 'border-gray-200';
$card_title_classes = 'text-primary-700';
$card_content_classes = 'text-gray-900';
$card_divider_color = '#E5E7EB';

if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
    $title_classes = 'text-white';
    $subtitle_classes = 'text-gray-300';
    $form_bg_classes = 'bg-white/10 backdrop-blur border-white/60';
    $form_dark_mode = true;
    $card_bg_classes = 'bg-white/10 backdrop-blur border-white/60';
    $card_title_classes = 'text-white';
    $card_content_classes = 'text-gray-300';
    $card_divider_color = 'rgba(255,255,255,0.3)';
}
?>

<section class="py-24 <?php echo esc_attr($bg_classes); ?>">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php if ($title): ?>
            <h2 class="<?php echo esc_attr($title_classes); ?> text-4xl font-bold leading-10 font-serif text-center" data-aos="fade-up"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if ($subtitle): ?>
            <div class="font-sans <?php echo esc_attr($subtitle_classes); ?> text-base font-normal leading-7 pt-4 text-center" data-aos="fade-up" data-aos-delay="100"><?php echo wp_kses_post($subtitle); ?></div>
        <?php endif; ?>
        
        <div class="pt-14 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Form Section -->
            <div class="flex flex-col gap-10" data-aos="fade-right">
                <?php if ($gravity_form_shortcode): ?>
                    <div class="gravity-form-wrapper <?php echo esc_attr($form_bg_classes); ?> border rounded-2xl p-8<?php echo $form_dark_mode ? ' gf-dark-mode' : ''; ?>">
                        <?php echo do_shortcode($gravity_form_shortcode); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center text-gray-500">
                        <p>Voeg een Gravity Forms shortcode toe in de block instellingen.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Map & Contact Cards Section -->
            <div class="h-full flex flex-col gap-8" data-aos="fade-left" data-aos-delay="100">
                <?php if ($map_embed_code): ?>
                    <div class="rounded-2xl overflow-hidden">
                        <?php 
                        // Make iframe responsive
                        $responsive_map = preg_replace('/(width|height)="[^"]*"/i', '', $map_embed_code);
                        $responsive_map = str_replace('<iframe', '<iframe class="w-full" height="320"', $responsive_map);
                        
                        // Apply custom zoom if set (formula: distance = 591657550.5 / 2^zoom)
                        if ($map_zoom) {
                            $zoom_distance = 591657550.5 / pow(2, intval($map_zoom));
                            $responsive_map = preg_replace('/!1d[\d.]+/', '!1d' . $zoom_distance, $responsive_map);
                        }
                        
                        echo $responsive_map; 
                        ?>
                    </div>
                <?php else: ?>
                    <div class="rounded-2xl bg-gray-100 h-[320px] flex items-center justify-center">
                        <p class="text-gray-500">Voeg een Google Maps embed code toe.</p>
                    </div>
                <?php endif; ?>

                <?php if ($contact_cards && is_array($contact_cards)): ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-8">
                        <?php foreach ($contact_cards as $card): 
                            $card_title = $card['card_title'];
                            $card_content = $card['card_content'];
                            $card_link = $card['card_link'];
                        ?>
                            <div class="p-5 flex flex-col gap-3 border <?php echo esc_attr($card_bg_classes); ?> rounded-2xl">
                                <?php if ($card_title): ?>
                                    <h5 class="font-sans text-xl font-semibold leading-8 <?php echo esc_attr($card_title_classes); ?>">
                                        <?php echo esc_html($card_title); ?>
                                    </h5>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="82" height="2" viewBox="0 0 82 2" fill="none">
                                        <path d="M1 1H81" stroke="<?php echo esc_attr($card_divider_color); ?>" stroke-linecap="round" />
                                    </svg>
                                <?php endif; ?>
                                <?php if ($card_content): ?>
                                    <?php if ($card_link): ?>
                                        <a href="<?php echo esc_url($card_link); ?>" class="font-sans text-lg font-normal leading-7 <?php echo esc_attr($card_content_classes); ?> hover:text-primary-700 transition-colors"><?php echo nl2br(esc_html($card_content)); ?></a>
                                    <?php else: ?>
                                        <span class="font-sans text-lg font-normal leading-7 <?php echo esc_attr($card_content_classes); ?>"><?php echo nl2br(esc_html($card_content)); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
