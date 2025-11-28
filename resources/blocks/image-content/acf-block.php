<?php
/**
 * Image Content Block Registration
 */

// Register Block
add_action('acf/init', function() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'image-content',
            'title'             => __('Image Content'),
            'description'       => __('Content blok met afbeelding en tekst'),
            'render_template'   => get_template_directory() . '/resources/blocks/image-content/image-content.php',
            'category'          => 'formatting',
            'icon'              => 'align-pull-left',
            'keywords'          => ['image', 'content', 'tekst', 'afbeelding'],
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
            'key' => 'group_image_content_block',
            'title' => 'Image Content Block',
            'fields' => [
                // Main Accordion
                [
                    'key' => 'field_image_content_accordion',
                    'label' => 'Image Content',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ],

                // Tab: Layout
                [
                    'key' => 'field_image_content_tab_layout',
                    'label' => 'Layout',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_image_content_image_position',
                    'label' => 'Afbeelding Positie',
                    'name' => 'image_position',
                    'type' => 'select',
                    'choices' => [
                        'left' => 'Links',
                        'right' => 'Rechts',
                        'top' => 'Boven',
                        'bottom' => 'Onder',
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'key' => 'field_image_content_background',
                    'label' => 'Achtergrond',
                    'name' => 'background',
                    'type' => 'select',
                    'choices' => [
                        'transparent' => 'Transparant',
                        'gray' => 'Grijs (gray-100)',
                        'dark' => 'Donker (footer kleur)',
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],

                // Tab: Content
                [
                    'key' => 'field_image_content_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_image_content_image',
                    'label' => 'Afbeelding',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ],
                [
                    'key' => 'field_image_content_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_image_content_text',
                    'label' => 'Tekst',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                ],
                [
                    'key' => 'field_image_content_button',
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                ],

                // Accordion End
                [
                    'key' => 'field_image_content_accordion_end',
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
                        'value' => 'acf/image-content',
                    ],
                ],
            ],
        ]);
    }
});
