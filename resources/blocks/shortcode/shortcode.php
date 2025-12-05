<?php
/**
 * Shortcode Block Template
 */

$shortcode = get_field('shortcode');
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = '';
if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
}
?>

<?php if ($shortcode) : ?>
<section class="py-24 <?php echo esc_attr($bg_classes); ?>">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php echo do_shortcode($shortcode); ?>
    </div>
</section>
<?php endif; ?>