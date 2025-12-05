<?php
/**
 * Iframe Block Registration
 */

// Register Block
add_action('acf/init', function() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'iframe',
            'title'             => __('Iframe'),
            'description'       => __('Embed een iframe (video, kaart, widget, etc.)'),
            'render_template'   => get_template_directory() . '/resources/blocks/iframe/iframe.php',
            'category'          => 'formatting',
            'icon'              => 'embed-generic',
            'keywords'          => ['iframe', 'embed', 'video', 'map'],
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
            'key' => 'group_iframe_block',
            'title' => 'Iframe Block',
            'fields' => [
                [
                    'key' => 'field_iframe_accordion',
                    'label' => 'Iframe',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ],

                // Tab: Layout
                [
                    'key' => 'field_iframe_tab_layout',
                    'label' => 'Layout',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_iframe_background',
                    'label' => 'Achtergrond',
                    'name' => 'background',
                    'type' => 'select',
                    'choices' => [
                        'transparent' => 'Transparant',
                        'gray' => 'Lichtgrijs',
                        'dark' => 'Donker',
                    ],
                ],
                [
                    'key' => 'field_iframe_max_width',
                    'label' => 'Maximale breedte',
                    'name' => 'max_width',
                    'type' => 'select',
                    'choices' => [
                        'full' => 'Volledig (max-w-7xl)',
                        'large' => 'Groot (max-w-5xl)',
                        'medium' => 'Medium (max-w-3xl)',
                        'small' => 'Klein (max-w-xl)',
                    ],
                ],

                // Tab: Content
                [
                    'key' => 'field_iframe_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_iframe_title',
                    'label' => 'Titel (optioneel)',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_iframe_description',
                    'label' => 'Beschrijving (optioneel)',
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ],
                [
                    'key' => 'field_iframe_code',
                    'label' => 'Iframe Code',
                    'name' => 'iframe_code',
                    'type' => 'textarea',
                    'instructions' => 'Plak hier de volledige iframe embed code. Breedte wordt automatisch op 100% gezet.',
                    'rows' => 4,
                ],
                [
                    'key' => 'field_iframe_height',
                    'label' => 'Hoogte (px)',
                    'name' => 'iframe_height',
                    'type' => 'number',
                    'instructions' => 'Hoogte van de iframe in pixels. Standaard: 500',
                    'min' => 100,
                    'max' => 2000,
                ],

                // Accordion End
                [
                    'key' => 'field_iframe_accordion_end',
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
                        'value' => 'acf/iframe',
                    ],
                ],
            ],
        ]);
    }
});
