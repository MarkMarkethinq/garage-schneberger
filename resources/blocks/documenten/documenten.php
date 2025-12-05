<?php
/**
 * Documenten Block Template
 * 
 * Voor tekstrijke pagina's zoals privacy verklaring, cookie beleid, algemene voorwaarden etc.
 */

// Get ACF fields
$title   = get_field('title');
$content = get_field('content');
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = 'bg-white';
$title_classes = 'text-gray-900';
$prose_classes = 'prose-headings:text-gray-900 prose-p:text-gray-600 prose-li:text-gray-600 prose-strong:text-gray-900 prose-a:text-primary-700';

if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
    $title_classes = 'text-white';
    $prose_classes = 'prose-headings:text-white prose-p:text-gray-300 prose-li:text-gray-300 prose-strong:text-white prose-a:text-primary-400 prose-th:bg-white/10 prose-th:border-white/20 prose-td:border-white/20';
}
?>

<section class="py-16 lg:py-24 <?php echo esc_attr($bg_classes); ?>">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <?php if ($title) : ?>
        <div class="mb-12 pb-8 border-b border-primary-700" data-aos="fade-up">
            <h1 class="<?php echo esc_attr($title_classes); ?> text-3xl lg:text-4xl font-bold font-serif leading-tight"><?php echo esc_html($title); ?></h1>
        </div>
        <?php endif; ?>

        <?php if ($content) : ?>
        <div class="prose prose-lg max-w-none
            prose-headings:font-serif prose-headings:font-semibold <?php echo esc_attr($prose_classes); ?>
            prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
            prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
            prose-h4:text-lg prose-h4:mt-6 prose-h4:mb-2
            prose-p:leading-relaxed prose-p:mb-4
            prose-a:no-underline hover:prose-a:underline
            prose-strong:font-semibold
            prose-ul:my-4 prose-ul:pl-6 prose-li:mb-2
            prose-ol:my-4 prose-ol:pl-6
            prose-table:w-full prose-table:border-collapse
            prose-th:border prose-th:px-4 prose-th:py-2 prose-th:text-left prose-th:font-semibold
            prose-td:border prose-td:px-4 prose-td:py-2" 
            data-aos="fade-up" data-aos-delay="100">
            <?php echo wp_kses_post($content); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
