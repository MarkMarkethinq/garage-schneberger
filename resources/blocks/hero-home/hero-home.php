<?php
/**
 * Hero Home Block Template
 */

// Get ACF fields
$background_image = get_field('background_image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$usps = get_field('usps');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
$counters = get_field('counters');
$background = get_field('background') ?: 'transparent';

// Background classes
$bg_classes = '';
if ($background === 'gray') {
    $bg_classes = 'bg-gray-100';
} elseif ($background === 'dark') {
    $bg_classes = 'bg-[#1C1C1E]';
}
?>

<section class="relative p-5 lg:h-full bg-cover <?php echo esc_attr($bg_classes); ?>">
  <div class="w-full h-full bg-center bg-cover pt-24 pb-12 overflow-hidden rounded-3xl relative z-0"
    style="background-image: url(<?php echo esc_url($background_image); ?>);">
    <div class="absolute w-full h-full top-0 left-0 bg-black/40 z-10"></div>
    <div class="w-full px-8 lg:px-24 h-full relative z-20">
      <div class="flex w-full h-full items-center justify-between flex-col gap-16">
        
        <!-- Title and Subtitle -->
        <div class="block mb-24" data-aos="fade-up">
          <?php if ($title) : ?>
          <h1 class="font-semibold text-4xl sm:text-5xl md:text-[64px] md:leading-snug text-white mx-auto mb-16 text-center">
            <?php echo nl2br(esc_html($title)); ?>
          </h1>
          <?php endif; ?>
          
          <?php if ($subtitle) : ?>
          <div class="text-center text-lg font-normal text-white mb-7">
            <?php echo wp_kses_post($subtitle); ?>
          </div>
          <?php endif; ?>
          
          <!-- USPs Section with CTA -->
          <?php if ($usps || ($button_text && $button_link)) : ?>
          <div class="flex flex-col md:flex-row items-center p-3 border border-white/60 rounded-2xl lg:mt-10 gap-6 bg-white/10 backdrop-blur-md lg:w-max mx-auto">
            <?php if ($usps) : ?>
            <div class="flex flex-col sm:flex-row items-center gap-6 sm:divide-x divide-white/20">
              <?php foreach ($usps as $usp) : ?>
              <div class="flex flex-col items-center sm:items-start px-6 py-2">
                <h3 class="text-base font-medium text-white mb-1"><?php echo esc_html($usp['title']); ?></h3>
                <p class="text-xs font-medium text-gray-300"><?php echo esc_html($usp['description']); ?></p>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            
            <?php if ($button_text && $button_link) : ?>
            <a href="<?php echo esc_url($button_link); ?>" 
               class="rounded-xl py-3 px-6 bg-white text-base font-semibold text-primary-700 transition-all duration-300 hover:bg-primary-700 hover:text-white whitespace-nowrap">
              <?php echo esc_html($button_text); ?>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
        
        <!-- Counters Section -->
        <?php if ($counters) : ?>
        <div class="flex flex-col min-[470px]:flex-row items-center gap-8 max-lg:justify-center" data-aos="fade-up" data-aos-delay="200">
          <?php foreach ($counters as $counter) : 
            $number = isset($counter['number']) ? floatval($counter['number']) : 0;
            $suffix = isset($counter['suffix']) ? $counter['suffix'] : '';
          ?>
          <div class="block">
            <h4 class="text-center font-semibold text-4xl leading-snug text-white mb-2">
              <span class="counter-number" data-target="<?php echo esc_attr($number); ?>" data-suffix="<?php echo esc_attr($suffix); ?>">0</span><?php echo esc_html($suffix); ?>
            </h4>
            <p class="text-center text-base font-normal text-white whitespace-nowrap">
              <?php echo esc_html($counter['label']); ?>
            </p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</section>