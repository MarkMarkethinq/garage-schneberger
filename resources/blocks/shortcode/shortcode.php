<?php
/**
 * Shortcode Block Template
 */

$shortcode = get_field('shortcode');
?>

<?php if ($shortcode) : ?>
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php echo do_shortcode($shortcode); ?>
    </div>
</section>
<?php endif; ?>