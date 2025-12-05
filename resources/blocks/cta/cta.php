<?php
/**
 * CTA Block Template
 */

// Get ACF fields
$background_image = get_field('background_image');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = '';
if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
}
?>

<div class="py-16 <?php echo esc_attr($bg_classes); ?>">
  <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <section class="relative py-16 bg-cover bg-center bg-no-repeat rounded-[24px] overflow-hidden" data-aos="zoom-in"
        style="background-image: url(<?php echo $background_image ? esc_url($background_image['url']) : ''; ?>);">
        <!-- Black overlay -->
        <div class="absolute inset-0 bg-black/50"></div>
        
        <div class="relative z-10 px-8 lg:px-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <?php if ($title) : ?>
                <div data-aos="fade-right" data-aos-delay="200">
                    <h2 class="text-white font-serif font-semibold text-4xl lg:text-5xl leading-tight text-center lg:text-left"><?php echo esc_html($title); ?></h2>
                </div>
                <?php endif; ?>
                <div class="flex flex-col gap-6" data-aos="fade-left" data-aos-delay="300">
                    <?php if ($text) : ?>
                    <div class="text-base font-normal leading-7 text-gray-200 text-center lg:text-left"><?php echo wp_kses_post($text); ?></div>
                    <?php endif; ?>
                    <?php if ($button) : ?>
                    <div class="flex lg:justify-start justify-center">
                        <a href="<?php echo esc_url($button['url']); ?>" <?php echo $button['target'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
                            class="bg-white/10 border border-white/60 text-white px-6 py-2.5 rounded-2xl backdrop-blur hover:bg-white/20 transition-all text-sm font-medium"><?php echo esc_html($button['title']); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
  </div>
</div>