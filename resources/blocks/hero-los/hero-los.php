<?php
/**
 * Hero Los Block Template
 */

// Get ACF fields
$titel_bold = get_field('titel_bold');
$titel_regular = get_field('titel_regular');
$beschrijving = get_field('beschrijving');
$button_primair = get_field('button_primair');
$button_secundair = get_field('button_secundair');
$afbeelding = get_field('afbeelding');
$quote = get_field('quote');
?>

<section class="relative pt-8 lg:pt-32 pb-14">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 xl:gap-24 lg:gap-6 gap-4 items-stretch">
            <div class="w-full lg:col-span-6 lg:pb-0 pb-12 md:order-first" data-aos="fade-right">
                <div class="text-center lg:text-left relative">
                    <?php if (function_exists('yoast_breadcrumb')) : ?>
                        <div class="mb-8 bg-primary-100 py-1.5 px-3.5 text-red-600 flex items-center mx-auto lg:mx-0 rounded-full w-fit font-sans text-xs hero-los-breadcrumb">
                            <span class="mr-2 w-1.5 h-1.5 rounded-full bg-red-600 flex"></span><?php yoast_breadcrumb(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($titel_bold || $titel_regular) : ?>
                        <div class="relative mb-8 lg:mb-20">
                            <h1 class="pb-5 text-center text-gray-900 font-serif text-4xl md:text-5xl lg:text-left !leading-snug">
                                <?php if ($titel_bold) : ?>
                                    <span class="font-bold"><?php echo esc_html($titel_bold); ?></span>
                                <?php endif; ?>
                                <?php if ($titel_regular) : ?>
                                    <br><?php echo esc_html($titel_regular); ?>
                                <?php endif; ?>
                            </h1>
                        </div>
                    <?php endif; ?>

                    <?php if ($beschrijving) : ?>
                        <div class="text-gray-500 text-base text-center mb-9 lg:text-left">
                            <?php echo wp_kses_post($beschrijving); ?>
                        </div>
                    <?php endif; ?>

                    <div class="flex flex-col lg:flex-row gap-5">
                        <?php if ($button_primair) : ?>
                            <a href="<?php echo esc_url($button_primair['url']); ?>"
                               <?php echo $button_primair['target'] ? 'target="' . esc_attr($button_primair['target']) . '"' : ''; ?>
                               class="bg-primary-700 border border-primary-700 py-2.5 px-5 rounded-xl flex items-center justify-center gap-2 text-base font-semibold text-white transition-all duration-500 focus:outline-none hover:bg-transparent hover:text-primary-700">
                                <?php echo esc_html($button_primair['title']); ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.50295 4.99634L12.5032 9.99654L7.5 14.9997" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if ($button_secundair) : ?>
                            <a href="<?php echo esc_url($button_secundair['url']); ?>"
                               <?php echo $button_secundair['target'] ? 'target="' . esc_attr($button_secundair['target']) . '"' : ''; ?>
                               class="py-2.5 px-5 border border-primary-700 rounded-xl flex items-center justify-center gap-2 text-base font-semibold text-primary-700 transition-all duration-500 focus:outline-none hover:bg-primary-700 hover:text-white">
                                <?php echo esc_html($button_secundair['title']); ?>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.50295 4.99634L12.5032 9.99654L7.5 14.9997" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="w-full lg:col-span-6" data-aos="fade-left" data-aos-delay="100">
                <div class="relative flex justify-center lg:mb-0 mb-10 h-full">
                    <?php if ($afbeelding) : ?>
                        <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt']); ?>" class="w-full h-full rounded-3xl object-cover" />
                        <div class="absolute inset-0 bg-black/40 rounded-3xl"></div>
                    <?php endif; ?>

                    <?php if ($quote) : ?>
                        <div class="flex justify-between items-end absolute bottom-0 p-5 w-full">
                            <div class="block xl:mr-0 mr-10">
                                <h3 class="md:text-5xl text-2xl font-medium text-white font-serif leading-snug mb-5">
                                    "<?php echo esc_html($quote); ?>"
                                </h3>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>