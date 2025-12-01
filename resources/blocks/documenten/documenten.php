<?php
/**
 * Documenten Block Template
 * 
 * Voor tekstrijke pagina's zoals privacy verklaring, cookie beleid, algemene voorwaarden etc.
 */

// Get ACF fields
$title   = get_field('title');
$content = get_field('content');
?>

<section class="py-16 lg:py-24 bg-white">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <?php if ($title) : ?>
        <div class="mb-12 pb-8 border-b border-primary-700" data-aos="fade-up">
            <h1 class="text-gray-900 text-3xl lg:text-4xl font-bold font-serif leading-tight"><?php echo esc_html($title); ?></h1>
        </div>
        <?php endif; ?>

        <?php if ($content) : ?>
        <div class="prose prose-lg max-w-none
            prose-headings:font-serif prose-headings:font-semibold prose-headings:text-gray-900
            prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
            prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
            prose-h4:text-lg prose-h4:mt-6 prose-h4:mb-2
            prose-p:text-gray-600 prose-p:leading-relaxed prose-p:mb-4
            prose-a:text-primary-700 prose-a:no-underline hover:prose-a:underline
            prose-strong:text-gray-900 prose-strong:font-semibold
            prose-ul:my-4 prose-ul:pl-6 prose-li:text-gray-600 prose-li:mb-2
            prose-ol:my-4 prose-ol:pl-6
            prose-table:w-full prose-table:border-collapse
            prose-th:bg-gray-50 prose-th:border prose-th:border-gray-200 prose-th:px-4 prose-th:py-2 prose-th:text-left prose-th:font-semibold
            prose-td:border prose-td:border-gray-200 prose-td:px-4 prose-td:py-2" 
            data-aos="fade-up" data-aos-delay="100">
            <?php echo wp_kses_post($content); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
