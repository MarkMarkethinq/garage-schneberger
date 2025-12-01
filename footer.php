<?php
/**
 * The template for displaying the footer
 */

// Get ACF footer options
$footer_logo = get_field('footer_logo', 'option');
$partner_logos = get_field('footer_partner_logos', 'option');
$contact_heading = get_field('footer_contact_heading', 'option');
$address = get_field('footer_address', 'option');
$phone = get_field('footer_phone', 'option');
$email = get_field('footer_email', 'option');
$info_heading = get_field('footer_info_heading', 'option');
$bank = get_field('footer_bank', 'option');
$btw = get_field('footer_btw', 'option');
$kvk = get_field('footer_kvk', 'option');
$hours_heading = get_field('footer_hours_heading', 'option');
$hours_weekdays = get_field('footer_hours_weekdays', 'option');
$hours_lunch = get_field('footer_hours_lunch', 'option');
$hours_saturday = get_field('footer_hours_saturday', 'option');
$copyright = get_field('footer_copyright', 'option');
$privacy_text = get_field('footer_privacy_text', 'option');
$privacy_link = get_field('footer_privacy_link', 'option');
$terms_text = get_field('footer_terms_text', 'option');
$terms_link = get_field('footer_terms_link', 'option');
$cookies_text = get_field('footer_cookies_text', 'option');
$cookies_link = get_field('footer_cookies_link', 'option');
$contact_button = get_field('footer_contact_button_link', 'option');
?>
<footer class="pt-16 pb-7 bg-[#1C1C1E]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 min-[1130px]:grid-cols-12 gap-8 lg:gap-0 pb-14 border-b-2 border-gray-700">
        <div class="min-[1130px]:col-span-3 col-span-1 w-full min-[1130px]:max-w-full mx-auto">
          <div class="flex flex-col max-sm:items-center gap-8 w-full ">
            <?php if($footer_logo): ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="py-1.5 ">
              <img src="<?php echo esc_url($footer_logo['url']); ?>" 
                   alt="<?php echo esc_attr($footer_logo['alt'] ?: get_bloginfo('name')); ?>" 
                   class="h-16 w-auto object-contain">
            </a>
            <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="py-1.5 ">
              <svg xmlns="http://www.w3.org/2000/svg" width="166" height="33" viewBox="0 0 166 33" fill="none">
                <path
                  d="M47.7101 24.7231V7H55.0833C55.2568 7 55.4799 7.00821 55.7525 7.02462C56.0251 7.03282 56.2771 7.05744 56.5084 7.09846C57.541 7.25436 58.392 7.59487 59.0611 8.12C59.7386 8.64513 60.2384 9.30974 60.5606 10.1138C60.891 10.9097 61.0562 11.7959 61.0562 12.7723C61.0562 13.7405 60.891 14.6267 60.5606 15.4308C60.2301 16.2267 59.7262 16.8872 59.0487 17.4123C58.3796 17.9374 57.5328 18.2779 56.5084 18.4338C56.2771 18.4667 56.021 18.4913 55.7401 18.5077C55.4675 18.5241 55.2485 18.5323 55.0833 18.5323H50.6965V24.7231H47.7101ZM50.6965 15.7631H54.9594C55.1246 15.7631 55.3105 15.7549 55.517 15.7385C55.7236 15.7221 55.9136 15.6892 56.0871 15.64C56.5827 15.5169 56.971 15.2995 57.2519 14.9877C57.541 14.6759 57.7435 14.3231 57.8591 13.9292C57.983 13.5354 58.045 13.1497 58.045 12.7723C58.045 12.3949 57.983 12.0092 57.8591 11.6154C57.7435 11.2133 57.541 10.8564 57.2519 10.5446C56.971 10.2328 56.5827 10.0154 56.0871 9.89231C55.9136 9.84308 55.7236 9.81436 55.517 9.80615C55.3105 9.78974 55.1246 9.78154 54.9594 9.78154H50.6965V15.7631Z"
                  fill="#111827" />
                <path
                  d="M66.6946 25.0923C65.728 25.0923 64.9101 24.9118 64.241 24.5508C63.5718 24.1815 63.0637 23.6933 62.7168 23.0862C62.378 22.479 62.2087 21.8103 62.2087 21.08C62.2087 20.44 62.3161 19.8656 62.5309 19.3569C62.7457 18.84 63.0761 18.3969 63.5222 18.0277C63.9684 17.6503 64.5466 17.3426 65.2571 17.1046C65.7941 16.9323 66.422 16.7764 67.1407 16.6369C67.8677 16.4974 68.6525 16.3703 69.4952 16.2554C70.3461 16.1323 71.2342 16.001 72.1594 15.8615L71.0937 16.4646C71.102 15.5456 70.8955 14.8687 70.4741 14.4338C70.0528 13.999 69.3423 13.7815 68.3427 13.7815C67.7396 13.7815 67.1572 13.921 66.5955 14.2C66.0337 14.479 65.6413 14.959 65.4182 15.64L62.692 14.7908C63.0224 13.6667 63.6503 12.7641 64.5756 12.0831C65.5091 11.4021 66.7648 11.0615 68.3427 11.0615C69.5323 11.0615 70.5774 11.2544 71.4779 11.64C72.3866 12.0256 73.0599 12.6574 73.4978 13.5354C73.7374 14.0031 73.8819 14.4831 73.9315 14.9754C73.9811 15.4595 74.0059 15.9887 74.0059 16.5631V24.7231H71.3911V21.8431L71.8249 22.3108C71.2218 23.2708 70.5154 23.9764 69.7058 24.4277C68.9045 24.8708 67.9007 25.0923 66.6946 25.0923ZM67.2894 22.7292C67.9668 22.7292 68.5451 22.6103 69.0243 22.3723C69.5034 22.1344 69.8835 21.8431 70.1643 21.4985C70.4535 21.1538 70.6476 20.8297 70.7468 20.5262C70.9037 20.1487 70.9905 19.7179 71.007 19.2338C71.0318 18.7415 71.0442 18.3436 71.0442 18.04L71.9612 18.3108C71.0607 18.4503 70.2883 18.5733 69.6439 18.68C68.9995 18.7867 68.446 18.8892 67.9834 18.9877C67.5207 19.0779 67.1118 19.1805 66.7565 19.2954C66.4096 19.4185 66.1163 19.5621 65.8767 19.7262C65.6371 19.8903 65.4513 20.079 65.3191 20.2923C65.1952 20.5056 65.1332 20.7559 65.1332 21.0431C65.1332 21.3713 65.2158 21.6626 65.381 21.9169C65.5463 22.1631 65.7858 22.36 66.0998 22.5077C66.422 22.6554 66.8185 22.7292 67.2894 22.7292Z"
                  fill="#111827" />
                <path
                  d="M82.6101 31C81.8666 31 81.152 30.8851 80.4663 30.6554C79.7889 30.4256 79.1776 30.0933 78.6323 29.6585C78.0871 29.2318 77.641 28.7149 77.294 28.1077L80.045 26.7538C80.3011 27.2379 80.6605 27.5949 81.1231 27.8246C81.594 28.0626 82.0938 28.1815 82.6225 28.1815C83.2421 28.1815 83.7956 28.0708 84.2831 27.8492C84.7705 27.6359 85.1464 27.3159 85.4107 26.8892C85.6833 26.4708 85.8114 25.9456 85.7949 25.3138V21.5354H86.1666V11.4308H88.7813V25.3631C88.7813 25.6995 88.7648 26.0195 88.7318 26.3231C88.707 26.6349 88.6616 26.9385 88.5955 27.2338C88.3972 28.0954 88.0172 28.801 87.4554 29.3508C86.8936 29.9087 86.1956 30.3231 85.3612 30.5938C84.535 30.8646 83.618 31 82.6101 31ZM82.3499 25.0923C81.119 25.0923 80.045 24.7846 79.128 24.1692C78.211 23.5538 77.5005 22.7169 76.9966 21.6585C76.4926 20.6 76.2407 19.4062 76.2407 18.0769C76.2407 16.7313 76.4926 15.5333 76.9966 14.4831C77.5088 13.4246 78.2316 12.5918 79.1652 11.9846C80.0987 11.3692 81.1975 11.0615 82.4614 11.0615C83.7337 11.0615 84.7994 11.3692 85.6586 11.9846C86.526 12.5918 87.1828 13.4246 87.6289 14.4831C88.075 15.5415 88.2981 16.7395 88.2981 18.0769C88.2981 19.3979 88.075 20.5918 87.6289 21.6585C87.1828 22.7169 86.5177 23.5538 85.6338 24.1692C84.7498 24.7846 83.6552 25.0923 82.3499 25.0923ZM82.8084 22.4338C83.6098 22.4338 84.2541 22.2533 84.7416 21.8923C85.2372 21.5231 85.5966 21.0103 85.8197 20.3538C86.051 19.6974 86.1666 18.9385 86.1666 18.0769C86.1666 17.2072 86.051 16.4482 85.8197 15.8C85.5966 15.1436 85.2455 14.6349 84.7663 14.2738C84.2872 13.9046 83.6676 13.72 82.9075 13.72C82.1062 13.72 81.4453 13.9169 80.9248 14.3108C80.4044 14.6964 80.0202 15.2215 79.7724 15.8862C79.5245 16.5426 79.4006 17.2728 79.4006 18.0769C79.4006 18.8892 79.5204 19.6277 79.76 20.2923C80.0078 20.9487 80.3837 21.4697 80.8877 21.8554C81.3916 22.241 82.0318 22.4338 82.8084 22.4338Z"
                  fill="#111827" />
                <path
                  d="M98.0929 25.0923C96.7381 25.0923 95.5485 24.801 94.5241 24.2185C93.4997 23.6359 92.6983 22.8277 92.12 21.7938C91.55 20.76 91.265 19.5703 91.265 18.2246C91.265 16.7723 91.5458 15.5128 92.1076 14.4462C92.6694 13.3713 93.4501 12.5385 94.4497 11.9477C95.4493 11.3569 96.6059 11.0615 97.9195 11.0615C99.3074 11.0615 100.485 11.3856 101.451 12.0338C102.426 12.6738 103.149 13.5805 103.62 14.7538C104.091 15.9272 104.268 17.3097 104.153 18.9015H101.191V17.8185C101.183 16.3744 100.927 15.32 100.423 14.6554C99.9187 13.9908 99.1256 13.6585 98.0434 13.6585C96.8207 13.6585 95.912 14.0359 95.3171 14.7908C94.7223 15.5374 94.4249 16.6328 94.4249 18.0769C94.4249 19.4226 94.7223 20.4646 95.3171 21.2031C95.912 21.9415 96.7794 22.3108 97.9195 22.3108C98.6547 22.3108 99.2867 22.1508 99.8154 21.8308C100.352 21.5026 100.765 21.0308 101.055 20.4154L104.004 21.3015C103.492 22.4995 102.699 23.4308 101.625 24.0954C100.559 24.76 99.3817 25.0923 98.0929 25.0923ZM93.4831 18.9015V16.6615H102.69V18.9015H93.4831Z"
                  fill="#111827" />
                <path
                  d="M112.035 25.0923C110.805 25.0923 109.731 24.7846 108.814 24.1692C107.897 23.5538 107.186 22.7169 106.682 21.6585C106.178 20.6 105.926 19.4062 105.926 18.0769C105.926 16.7313 106.178 15.5333 106.682 14.4831C107.194 13.4246 107.917 12.5918 108.851 11.9846C109.784 11.3692 110.883 11.0615 112.147 11.0615C113.419 11.0615 114.485 11.3692 115.344 11.9846C116.212 12.5918 116.868 13.4246 117.314 14.4831C117.761 15.5415 117.984 16.7395 117.984 18.0769C117.984 19.3979 117.761 20.5918 117.314 21.6585C116.868 22.7169 116.203 23.5538 115.319 24.1692C114.435 24.7846 113.341 25.0923 112.035 25.0923ZM112.494 22.4338C113.295 22.4338 113.94 22.2533 114.427 21.8923C114.923 21.5231 115.282 21.0103 115.505 20.3538C115.737 19.6974 115.852 18.9385 115.852 18.0769C115.852 17.2072 115.737 16.4482 115.505 15.8C115.282 15.1436 114.931 14.6349 114.452 14.2738C113.973 13.9046 113.353 13.72 112.593 13.72C111.792 13.72 111.131 13.9169 110.61 14.3108C110.09 14.6964 109.706 15.2215 109.458 15.8862C109.21 16.5426 109.086 17.2728 109.086 18.0769C109.086 18.8892 109.206 19.6277 109.446 20.2923C109.693 20.9487 110.069 21.4697 110.573 21.8554C111.077 22.241 111.717 22.4338 112.494 22.4338ZM115.852 24.7231V15.3938H115.48V7H118.492V24.7231H115.852Z"
                  fill="#111827" />
                <path
                  d="M127.629 25.0923C126.291 25.0923 125.122 24.7928 124.122 24.1938C123.123 23.5949 122.346 22.7703 121.793 21.72C121.247 20.6615 120.975 19.4472 120.975 18.0769C120.975 16.6821 121.256 15.4595 121.817 14.4092C122.379 13.359 123.16 12.5385 124.159 11.9477C125.159 11.3569 126.316 11.0615 127.629 11.0615C128.976 11.0615 130.149 11.361 131.149 11.96C132.148 12.559 132.925 13.3877 133.478 14.4462C134.032 15.4964 134.308 16.7067 134.308 18.0769C134.308 19.4554 134.028 20.6738 133.466 21.7323C132.912 22.7826 132.136 23.6072 131.136 24.2062C130.137 24.7969 128.968 25.0923 127.629 25.0923ZM127.629 22.3108C128.819 22.3108 129.703 21.9169 130.281 21.1292C130.859 20.3415 131.149 19.3241 131.149 18.0769C131.149 16.7887 130.855 15.7631 130.269 15C129.682 14.2287 128.802 13.8431 127.629 13.8431C126.828 13.8431 126.167 14.0236 125.646 14.3846C125.134 14.7374 124.754 15.2338 124.506 15.8738C124.259 16.5056 124.135 17.24 124.135 18.0769C124.135 19.3651 124.428 20.3949 125.014 21.1662C125.609 21.9292 126.481 22.3108 127.629 22.3108Z"
                  fill="#111827" />
                <path
                  d="M146.048 24.7231V18.3231C146.048 17.9046 146.019 17.441 145.961 16.9323C145.903 16.4236 145.767 15.9354 145.552 15.4677C145.346 14.9918 145.032 14.6021 144.61 14.2985C144.197 13.9949 143.635 13.8431 142.925 13.8431C142.545 13.8431 142.169 13.9046 141.797 14.0277C141.426 14.1508 141.087 14.3641 140.781 14.6677C140.484 14.9631 140.244 15.3733 140.062 15.8985C139.881 16.4154 139.79 17.08 139.79 17.8923L138.018 17.1415C138.018 16.0092 138.237 14.9836 138.675 14.0646C139.121 13.1456 139.773 12.4154 140.632 11.8738C141.492 11.3241 142.549 11.0492 143.805 11.0492C144.796 11.0492 145.614 11.2133 146.258 11.5415C146.903 11.8697 147.415 12.2882 147.795 12.7969C148.175 13.3056 148.456 13.8472 148.638 14.4215C148.819 14.9959 148.935 15.5415 148.985 16.0585C149.042 16.5672 149.071 16.9815 149.071 17.3015V24.7231H146.048ZM136.766 24.7231V11.4308H139.43V15.5538H139.79V24.7231H136.766Z"
                  fill="#111827" />
                <path
                  d="M157.924 25.0923C156.569 25.0923 155.379 24.801 154.355 24.2185C153.331 23.6359 152.529 22.8277 151.951 21.7938C151.381 20.76 151.096 19.5703 151.096 18.2246C151.096 16.7723 151.377 15.5128 151.939 14.4462C152.5 13.3713 153.281 12.5385 154.281 11.9477C155.28 11.3569 156.437 11.0615 157.75 11.0615C159.138 11.0615 160.316 11.3856 161.282 12.0338C162.257 12.6738 162.98 13.5805 163.451 14.7538C163.922 15.9272 164.099 17.3097 163.984 18.9015H161.022V17.8185C161.014 16.3744 160.758 15.32 160.254 14.6554C159.75 13.9908 158.957 13.6585 157.874 13.6585C156.652 13.6585 155.743 14.0359 155.148 14.7908C154.553 15.5374 154.256 16.6328 154.256 18.0769C154.256 19.4226 154.553 20.4646 155.148 21.2031C155.743 21.9415 156.61 22.3108 157.75 22.3108C158.486 22.3108 159.118 22.1508 159.646 21.8308C160.183 21.5026 160.596 21.0308 160.886 20.4154L163.835 21.3015C163.323 22.4995 162.53 23.4308 161.456 24.0954C160.39 24.76 159.213 25.0923 157.924 25.0923ZM153.314 18.9015V16.6615H162.521V18.9015H153.314Z"
                  fill="#111827" />
                <path
                  d="M25.3902 11.8941C26.0296 12.5063 26.0458 13.5149 25.4264 14.1468L19.6357 20.054C19.0162 20.686 17.9956 20.702 17.3562 20.0898C16.7167 19.4776 16.7005 18.469 17.32 17.8371L23.1106 11.9299C23.7301 11.2979 24.7507 11.2819 25.3902 11.8941Z"
                  fill="#075985" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M0.988159 4.54673C0.988159 2.03564 3.04801 0 5.58896 0H22.4006V0.00124069C29.8074 0.0998525 35.7811 6.06429 35.7811 13.4075C35.7811 20.8123 29.7069 26.8151 22.2141 26.8151C19.5425 26.8151 17.0512 26.0519 14.9514 24.7342L7.53733 31.9057C5.09801 34.2652 0.988159 32.5573 0.988159 29.1841V4.54673ZM12.4394 22.7055C10.0911 20.295 8.64709 17.0179 8.64709 13.4075C8.64709 12.5277 9.36884 11.8144 10.2592 11.8144C11.1495 11.8144 11.8712 12.5277 11.8712 13.4075C11.8712 19.0526 16.5019 23.6288 22.2141 23.6288C27.9263 23.6288 32.5569 19.0526 32.5569 13.4075C32.5569 7.76248 27.9263 3.18626 22.2141 3.18626H5.58896C4.82866 3.18626 4.21231 3.79536 4.21231 4.54673V29.1841C4.21231 29.7351 4.88363 30.014 5.28209 29.6286L12.4394 22.7055Z"
                  fill="#075985" />
              </svg>
            </a>
            <?php endif; ?>
            
            <?php if($partner_logos): ?>
            <div class="flex flex-wrap gap-4 items-center">
              <?php foreach($partner_logos as $logo): ?>
                <?php if($logo['image']): ?>
                  <img src="<?php echo esc_url($logo['image']['url']); ?>" 
                       alt="<?php echo esc_attr($logo['alt_text'] ?: $logo['image']['alt']); ?>" 
                       class="h-16 w-auto object-contain bg-white p-2 rounded">
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="min-[1130px]:col-span-9 max-[1130px]:pt-10 lg:pl-14 col-span-1 w-full min-[1130px]:max-w-full mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8 lg:gap-12">
          <div class="">
            <h6 class="text-lg font-medium text-white mb-7 max-sm:text-center"><?php echo esc_html($contact_heading ?: 'Contact'); ?></h6>
            <ul class="flex flex-col gap-3">
              <?php if($address): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-pre-line"><?php echo esc_html($address); ?></p></li>
              <?php endif; ?>
              <?php if($phone): ?>
              <li><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="block text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap hover:text-white transition-colors"><?php echo esc_html($phone); ?></a></li>
              <?php endif; ?>
              <?php if($email): ?>
              <li><a href="mailto:<?php echo esc_attr($email); ?>" class="block text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap hover:text-white transition-colors"><?php echo esc_html($email); ?></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="">
            <h6 class="text-lg font-medium text-white mb-7 max-sm:text-center"><?php echo esc_html($info_heading ?: 'Informatie'); ?></h6>
            <ul class="flex flex-col gap-3">
              <?php if($bank): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($bank); ?></p></li>
              <?php endif; ?>
              <?php if($btw): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($btw); ?></p></li>
              <?php endif; ?>
              <?php if($kvk): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($kvk); ?></p></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="">
            <h6 class="text-lg font-medium text-white mb-7 max-sm:text-center"><?php echo esc_html($hours_heading ?: 'Openingstijden'); ?></h6>
            <ul class="flex flex-col gap-3">
              <?php if($hours_weekdays): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($hours_weekdays); ?></p></li>
              <?php endif; ?>
              <?php if($hours_lunch): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($hours_lunch); ?></p></li>
              <?php endif; ?>
              <?php if($hours_saturday): ?>
              <li><p class="text-base font-normal max-sm:text-center text-gray-300 whitespace-nowrap"><?php echo esc_html($hours_saturday); ?></p></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex flex-col-reverse gap-5 md:grid md:grid-cols-3 items-center pt-7">
        <p class="font-normal text-sm text-gray-400 md:justify-self-start"><?php echo esc_html($copyright ? str_replace('{year}', date('Y'), $copyright) : '©' . date('Y') . ' All rights reserved.'); ?></p>
        <ul class="flex items-center justify-center gap-9">
          <?php if($terms_link): ?>
          <li><a href="<?php echo esc_url($terms_link); ?>"
              class="text-gray-400 text-sm font-normal transition-all duration-300 hover:text-white focus-within:text-white focus-within:outline-0"><?php echo esc_html($terms_text ?: 'Terms'); ?></a>
          </li>
          <?php endif; ?>
          <?php if($privacy_link): ?>
          <li><a href="<?php echo esc_url($privacy_link); ?>"
              class="text-gray-400 text-sm font-normal transition-all duration-300 hover:text-white focus-within:text-white focus-within:outline-0"><?php echo esc_html($privacy_text ?: 'Privacy'); ?></a>
          </li>
          <?php endif; ?>
          <?php if($cookies_link): ?>
          <li><a href="<?php echo esc_url($cookies_link); ?>"
              class="text-gray-400 text-sm font-normal transition-all duration-300 hover:text-white focus-within:text-white focus-within:outline-0"><?php echo esc_html($cookies_text ?: 'Cookies'); ?></a>
          </li>
          <?php endif; ?>
        </ul>
        <div class="md:justify-self-end">
          <?php if($contact_button && $contact_button['url']): ?>
            <a href="<?php echo esc_url($contact_button['url']); ?>"
               class="bg-white/10 border border-white/60 text-white px-6 py-2.5 rounded-2xl backdrop-blur hover:bg-white/20 transition-all text-sm font-medium whitespace-nowrap"
               <?php if($contact_button['target']): ?>target="<?php echo esc_attr($contact_button['target']); ?>"<?php endif; ?>>
              <?php echo esc_html($contact_button['title'] ?: 'Neem contact op'); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <p class="text-center font-normal text-sm text-gray-400 mt-6">Ontwikkeling door <a href="https://developing.nl" target="_blank" rel="noopener" class="hover:text-white transition-colors">Developing</a></p>
    </div>
</footer>
                                                    

<?php wp_footer(); ?>
</body>
</html>