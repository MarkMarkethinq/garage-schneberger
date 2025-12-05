<?php
/**
 * Image Content Block Template
 */

// Get ACF fields
$image_position = get_field('image_position') ?: 'right';
$background = get_field('background') ?: 'transparent';
$image = get_field('image');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');

// Background classes
$bg_classes = '';
$title_classes = 'text-gray-900';
$text_classes = 'text-gray-500';
$button_classes = 'bg-primary-700 border border-primary-700 hover:bg-transparent hover:text-primary-700 text-white';

if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
    $title_classes = 'text-white';
    $text_classes = 'text-gray-300';
    $button_classes = 'bg-white/10 border border-white/60 text-white backdrop-blur hover:bg-white/20';
}

// Grid classes based on position
$is_horizontal = in_array($image_position, ['left', 'right']);
$grid_classes = $is_horizontal ? 'lg:grid-cols-2 grid-cols-1' : 'grid-cols-1';
$image_order = '';
$content_order = '';

if ($image_position === 'left') {
    $image_order = 'order-1';
    $content_order = 'order-2';
} elseif ($image_position === 'right') {
    $image_order = 'lg:order-2 order-1';
    $content_order = 'lg:order-1 order-2';
} elseif ($image_position === 'top') {
    $image_order = 'order-1';
    $content_order = 'order-2';
} else { // bottom
    $image_order = 'order-2';
    $content_order = 'order-1';
}

// Image classes
$image_classes = $is_horizontal ? 'h-full' : 'w-full max-h-[500px]';
?>

<section class="py-24 relative <?php echo esc_attr($bg_classes); ?>">
    <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
        <div class="w-full justify-start items-center gap-8 grid <?php echo esc_attr($grid_classes); ?>">
            
            <?php 
            $image_aos = ($image_position === 'left' || $image_position === 'top') ? 'fade-right' : 'fade-left';
            if ($image) : ?>
            <img class="lg:mx-0 mx-auto <?php echo esc_attr($image_classes); ?> rounded-3xl object-cover <?php echo esc_attr($image_order); ?>" data-aos="<?php echo esc_attr($image_aos); ?>" 
                 src="<?php echo esc_url($image['url']); ?>" 
                 alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            
            <?php $content_aos = ($image_position === 'left' || $image_position === 'top') ? 'fade-left' : 'fade-right'; ?>
            <div class="w-full flex-col justify-start lg:items-start items-center gap-10 inline-flex <?php echo esc_attr($content_order); ?>" data-aos="<?php echo esc_attr($content_aos); ?>" data-aos-delay="100">
                <div class="w-full flex-col justify-start lg:items-start items-center gap-4 flex">
                    <?php if ($title) : ?>
                    <h2 class="<?php echo esc_attr($title_classes); ?> text-4xl font-bold font-serif leading-normal lg:text-start text-center"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    
                    <?php if ($text) : ?>
                    <div class="<?php echo esc_attr($text_classes); ?> text-base font-normal leading-relaxed lg:text-start text-center"><?php echo wp_kses_post($text); ?></div>
                    <?php endif; ?>
                </div>
                
                <?php if ($button && $button['url']) : ?>
                <a href="<?php echo esc_url($button['url']); ?>" 
                   class="sm:w-fit w-full px-3.5 py-2 <?php echo esc_attr($button_classes); ?> transition-all duration-700 ease-in-out rounded-xl shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] justify-center items-center flex"
                   <?php if ($button['target']) : ?>target="<?php echo esc_attr($button['target']); ?>"<?php endif; ?>>
                    <span class="px-1.5 text-sm font-medium leading-6"><?php echo esc_html($button['title']); ?></span>
                </a>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</section>
                                            