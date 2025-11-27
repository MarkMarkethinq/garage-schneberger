<?php
/**
 * Features Block Template
 */

// Get ACF fields
$title = get_field('title');
$features = get_field('features');
$image = get_field('image');
?>

<section class="py-24">
  <div class="mx-auto max-w-7xl px-4 lg:px-5 xl:px-8">
    <?php if ($title) : ?>
    <div class="mb-16 text-center">
      <h2 class="text-4xl text-center font-bold text-gray-900 leading-[3.25rem] max-w-lg mx-auto"><?php echo esc_html($title); ?></h2>
    </div>
    <?php endif; ?>
    
    <div class="flex flex-col justify-center items-stretch lg:gap-2 gap-20 lg:flex-row lg:justify-between">
      <div class="w-full lg:max-w-lg">
        <div class="grid grid-cols-1 gap-8 lg:gap-11 max-w-md md:max-w-xl lg:max-w-full mx-auto">
          <?php if ($features) : ?>
            <?php foreach ($features as $feature) : ?>
            <div class="flex flex-col justify-center lg:flex-row lg:justify-start gap-4 lg:gap-6">
              <div class="relative xl:w-20 xl:h-20 w-16 h-16 flex items-center justify-center bg-primary-100 rounded-full flex-shrink-0">
                <?php if (!empty($feature['icon'])) : ?>
                <img src="<?php echo esc_url($feature['icon']['url']); ?>" 
                     alt="<?php echo esc_attr($feature['icon']['alt'] ?? ''); ?>" 
                     class="w-8 h-8 object-contain">
                <?php endif; ?>
              </div>
              <div class="block max-w-full lg:max-w-sm xl:max-w-md">
                <?php if (!empty($feature['title'])) : ?>
                <h4 class="mb-2 text-xl font-medium text-gray-900"><?php echo esc_html($feature['title']); ?></h4>
                <?php endif; ?>
                <?php if (!empty($feature['description'])) : ?>
                <div class="text-sm text-gray-500 font-normal leading-6"><?php echo wp_kses_post($feature['description']); ?></div>
                <?php endif; ?>
              </div>
            </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Image (no background) -->
      <?php if ($image) : ?>
      <div class="w-full lg:max-w-lg flex justify-center">
        <img src="<?php echo esc_url($image['url']); ?>" 
             alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" 
             class="rounded-3xl object-cover h-full"/>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>