<?php
/**
 * Iframe Block Template
 */

// Get ACF fields
$title = get_field('title');
$description = get_field('description');
$iframe_code = get_field('iframe_code');
$iframe_height = get_field('iframe_height') ?: 500;
$max_width = get_field('max_width') ?: 'full';
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = '';
$title_classes = 'text-gray-900';
$description_classes = 'text-gray-500';

if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
    $title_classes = 'text-white';
    $description_classes = 'text-gray-300';
}

// Max width classes
$max_width_classes = [
    'full' => 'max-w-7xl',
    'large' => 'max-w-5xl',
    'medium' => 'max-w-3xl',
    'small' => 'max-w-xl',
];
$container_max_width = $max_width_classes[$max_width] ?? 'max-w-7xl';
?>

<section class="py-24 <?php echo esc_attr($bg_classes); ?>">
    <div class="mx-auto <?php echo esc_attr($container_max_width); ?> px-4 sm:px-6 lg:px-8">
        <?php if ($title || $description) : ?>
        <div class="mb-12 text-center" data-aos="fade-up">
            <?php if ($title) : ?>
                <h2 class="<?php echo esc_attr($title_classes); ?> text-4xl font-bold font-serif leading-normal mb-4"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="<?php echo esc_attr($description_classes); ?> text-lg max-w-3xl mx-auto"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($iframe_code) : ?>
        <div class="rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <?php 
            // Make iframe responsive - remove existing width/height and set custom
            $responsive_iframe = preg_replace('/(width|height)="[^"]*"/i', '', $iframe_code);
            $responsive_iframe = str_replace('<iframe', '<iframe class="w-full" height="' . esc_attr($iframe_height) . '"', $responsive_iframe);
            echo $responsive_iframe; 
            ?>
        </div>
        <?php else : ?>
        <div class="rounded-2xl bg-gray-100 h-[300px] flex items-center justify-center">
            <p class="text-gray-500">Voeg een iframe embed code toe in de block instellingen.</p>
        </div>
        <?php endif; ?>
    </div>
</section>
