<?php
/**
 * Shortcode Block Template
 */

$shortcode = get_field('shortcode');
?>

<?php if ($shortcode) : ?>
    <?php echo do_shortcode($shortcode); ?>
<?php endif; ?>