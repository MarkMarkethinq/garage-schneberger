<?php
// Get ACF fields
$title = get_field('title');
$subtitle = get_field('subtitle');
$layout = get_field('layout');
$gravity_form_shortcode = get_field('gravity_form_shortcode');
$contact_info = get_field('contact_info');
$map_embed_code = get_field('map_embed_code');

// Determine grid order based on layout
$form_order = ($layout === 'form_right') ? 'lg:order-2' : 'lg:order-1';
$map_order = ($layout === 'form_right') ? 'lg:order-1' : 'lg:order-2';
?>

<section class="py-24" data-aos="fade-up">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-4 mb-14" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-secondary-700 text-left text-4xl font-manrope font-bold leading-snug"><?php echo esc_html($title); ?></h2>
            <p class="text-gray-500 text-left text-sm md:text-base font-light"><?php echo esc_html($subtitle); ?></p>
        </div>
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-8">
            <!-- Form Section -->
            <div class="flex flex-col gap-8 <?php echo esc_attr($form_order); ?>" data-aos="fade-right" data-aos-delay="200">
                <?php if ($gravity_form_shortcode): ?>
                    <div class="gravity-form-wrapper">
                        <?php echo do_shortcode($gravity_form_shortcode); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center text-gray-500">
                        <p>Voeg een Gravity Forms shortcode toe in de block instellingen.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Contact Info & Map Section -->
            <div class="flex flex-col gap-8 <?php echo esc_attr($map_order); ?>" data-aos="fade-left" data-aos-delay="200">
                <?php if ($contact_info && is_array($contact_info)): ?>
                    <div class="flex flex-col gap-6 border-b border-gray-100 pb-6">
                        <?php foreach ($contact_info as $info): 
                            $icon = $info['icon'];
                            $text = $info['text'];
                            $link = $info['link'];
                            $icon_url = $icon ? $icon['url'] : '';
                            $icon_alt = $icon ? $icon['alt'] : '';
                        ?>
                            <?php if ($link): ?>
                                <a href="<?php echo esc_url($link); ?>" class="flex gap-5 hover:opacity-80 transition-opacity">
                            <?php else: ?>
                                <div class="flex gap-5">
                            <?php endif; ?>
                                <?php if ($icon_url): ?>
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" width="30" height="30" class="flex-shrink-0">
                                <?php endif; ?>
                                <h6 class="text-gray-500 text-sm md:text-base font-light flex items-center hover:text-primary-700 transition-colors"><?php echo esc_html($text); ?></h6>
                            <?php if ($link): ?>
                                </a>
                            <?php else: ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($map_embed_code): ?>
                    <div class="lg:h-full h-[336px] rounded-2xl overflow-hidden">
                        <div class="w-full h-full">
                            <?php 
                            // Make iframe responsive by removing fixed width/height attributes
                            $responsive_map = preg_replace('/(width|height)="[^"]*"/i', '', $map_embed_code);
                            $responsive_map = str_replace('<iframe', '<iframe class="w-full h-full"', $responsive_map);
                            echo $responsive_map; 
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="lg:h-full h-[336px] rounded-2xl bg-gray-100 flex items-center justify-center">
                        <p class="text-gray-500">Voeg een Google Maps embed code toe in de block instellingen.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
                                                    