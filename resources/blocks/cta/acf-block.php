<?php
/**
 * CTA Block Registration
 */

// Register Block
add_action('acf/init', function() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'cta',
            'title'             => __('CTA'),
            'description'       => __('Call to action block met achtergrondafbeelding'),
            'render_template'   => get_template_directory() . '/resources/blocks/cta/cta.php',
            'category'          => 'formatting',
            'icon'              => 'megaphone',
            'keywords'          => ['cta', 'call to action', 'button'],
            'mode'              => 'edit',
            'supports'          => [
                'align' => false,
            ],
        ]);
    }
});

// Register ACF Fields
add_action('acf/init', function() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key' => 'group_cta_block',
            'title' => 'CTA Block',
            'fields' => [
                [
                    'key' => 'field_cta_accordion',
                    'label' => 'CTA',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ],

                // Tab: Content
                [
                    'key' => 'field_cta_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_cta_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_cta_text',
                    'label' => 'Tekst',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                ],

                // Tab: Button
                [
                    'key' => 'field_cta_tab_button',
                    'label' => 'Button',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_cta_button',
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                ],

                // Tab: Afbeelding
                [
                    'key' => 'field_cta_tab_afbeelding',
                    'label' => 'Afbeelding',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_cta_background_image',
                    'label' => 'Achtergrondafbeelding',
                    'name' => 'background_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ],
                // Accordion End
                [
                    'key' => 'field_cta_accordion_end',
                    'label' => 'Accordion End',
                    'name' => '',
                    'type' => 'accordion',
                    'endpoint' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/cta',
                    ],
                ],
            ],
        ]);
    }
});
