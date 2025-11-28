<?php
/**
 * Feature Cards Block Template
 */

// Get ACF fields
$title       = get_field('title');
$description = get_field('description');
$columns     = get_field('columns') ?: '3';
$cards       = get_field('cards');

// Flex basis classes based on columns
$flex_basis_classes = [
    '2' => 'md:basis-[calc(50%-1rem)]',
    '3' => 'md:basis-[calc(50%-1rem)] lg:basis-[calc(33.333%-1.334rem)]',
    '4' => 'md:basis-[calc(50%-1rem)] lg:basis-[calc(25%-1.5rem)]',
];
$flex_basis = $flex_basis_classes[$columns] ?? 'md:basis-[calc(33.333%-1.334rem)]';
?>

<section class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="w-full flex-col justify-start items-start gap-12 inline-flex">
            <div class="w-full flex-col justify-center items-center gap-3.5 flex" data-aos="fade-up">
                <div class="flex-col justify-start items-center gap-1 flex">
                    <?php if ($title) : ?>
                        <h2 class="text-center text-gray-900 text-4xl font-bold font-serif leading-normal"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if ($description) : ?>
                    <div class="lg:max-w-3xl w-full text-center text-gray-500 text-lg font-normal leading-relaxed"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>
            </div>

            <?php if ($cards) : ?>
                <div class="w-full flex flex-wrap justify-center gap-8">
                    <?php $card_index = 0; foreach ($cards as $card) : ?>
                        <div class="w-full <?php echo esc_attr($flex_basis); ?> pl-5 pr-3 py-3 bg-white rounded-lg shadow-[0px_15px_40px_-4px_rgba(16,_24,_40,_0.04)] border-l-[3px] border-primary-700 flex-col justify-start items-start gap-3 inline-flex" data-aos="fade-up" data-aos-delay="<?php echo $card_index * 100; ?>">
                            <?php if (!empty($card['card_title'])) : ?>
                                <h5 class="text-gray-900 text-lg font-medium leading-relaxed"><?php echo esc_html($card['card_title']); ?></h5>
                            <?php endif; ?>
                            <?php if (!empty($card['card_description'])) : ?>
                                <div class="text-gray-500 text-sm font-normal leading-relaxed"><?php echo wp_kses_post($card['card_description']); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php $card_index++; endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>