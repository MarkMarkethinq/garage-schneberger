<?php
/**
 * Hero Los Block Registration
 */

add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'            => 'hero-los',
            'title'           => __('Hero Los'),
            'description'     => __('Hero sectie met afbeelding en quote'),
            'render_template' => get_template_directory() . '/resources/blocks/hero-los/hero-los.php',
            'category'        => 'theme-blocks',
            'icon'            => 'cover-image',
            'mode'            => 'edit',
            'supports'        => [
                'align' => false,
            ],
        ]);
    }
});

add_action('acf/init', function () {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'      => 'group_hero_los',
            'title'    => 'Hero Los',
            'fields'   => [
                // Main Accordion
                [
                    'key'   => 'field_hero_los_accordion',
                    'label' => 'Hero los',
                    'name'  => '',
                    'type'  => 'accordion',
                    'open'  => 1,
                ],

                // Tab: Layout
                [
                    'key'       => 'field_hero_los_tab_layout',
                    'label'     => 'Layout',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'     => 'field_hero_los_background',
                    'label'   => 'Achtergrond',
                    'name'    => 'background',
                    'type'    => 'select',
                    'choices' => [
                        'transparent' => 'Transparant',
                        'gray' => 'Lichtgrijs',
                        'dark' => 'Donker',
                    ],
                ],

                // Tab: Content
                [
                    'key'       => 'field_hero_los_tab_content',
                    'label'     => 'Content',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'          => 'field_hero_los_titel_bold',
                    'label'        => 'Titel (bold gedeelte)',
                    'name'         => 'titel_bold',
                    'type'         => 'text',
                    'instructions' => 'Dit deel wordt vetgedrukt weergegeven',
                ],
                [
                    'key'          => 'field_hero_los_titel_regular',
                    'label'        => 'Titel (regulier gedeelte)',
                    'name'         => 'titel_regular',
                    'type'         => 'text',
                    'instructions' => 'Dit deel wordt normaal weergegeven',
                ],
                [
                    'key'   => 'field_hero_los_beschrijving',
                    'label' => 'Beschrijving',
                    'name'  => 'beschrijving',
                    'type'  => 'wysiwyg',
                    'tabs'  => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                ],

                // Tab: Buttons
                [
                    'key'       => 'field_hero_los_tab_buttons',
                    'label'     => 'Buttons',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'   => 'field_hero_los_button_primair',
                    'label' => 'Button primair',
                    'name'  => 'button_primair',
                    'type'  => 'link',
                    'wrapper' => ['width' => '50'],
                ],
                [
                    'key'   => 'field_hero_los_button_secundair',
                    'label' => 'Button secundair',
                    'name'  => 'button_secundair',
                    'type'  => 'link',
                    'wrapper' => ['width' => '50'],
                ],

                // Tab: Afbeelding
                [
                    'key'       => 'field_hero_los_tab_afbeelding',
                    'label'     => 'Afbeelding',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'           => 'field_hero_los_afbeelding',
                    'label'         => 'Afbeelding',
                    'name'          => 'afbeelding',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ],
                [
                    'key'   => 'field_hero_los_quote',
                    'label' => 'Quote (over afbeelding)',
                    'name'  => 'quote',
                    'type'  => 'text',
                ],

                // Accordion End
                [
                    'key'      => 'field_hero_los_accordion_end',
                    'label'    => 'Accordion End',
                    'name'     => '',
                    'type'     => 'accordion',
                    'endpoint' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param'    => 'block',
                        'operator' => '==',
                        'value'    => 'acf/hero-los',
                    ],
                ],
            ],
        ]);
    }
});
