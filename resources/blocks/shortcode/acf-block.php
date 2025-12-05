<?php
/**
 * Shortcode Block Registration
 */

add_action('acf/init', function () {
    acf_register_block_type([
        'name'            => 'shortcode',
        'title'           => __('Shortcode'),
        'description'     => __('Voer een shortcode in'),
        'render_template' => 'resources/blocks/shortcode/shortcode.php',
        'category'        => 'theme',
        'icon'            => 'shortcode',
        'mode'            => 'edit',
        'supports'        => [
            'align' => false,
        ],
    ]);
});

add_action('acf/init', function () {
    acf_add_local_field_group([
        'key'      => 'group_shortcode_block',
        'title'    => 'Shortcode Block',
        'fields'   => [
            [
                'key'   => 'field_shortcode_accordion',
                'label' => 'Shortcode',
                'name'  => '',
                'type'  => 'accordion',
                'open'  => 1,
            ],
            // Tab: Layout
            [
                'key'       => 'field_shortcode_tab_layout',
                'label'     => 'Layout',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'     => 'field_shortcode_background',
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
                'key'       => 'field_shortcode_tab_content',
                'label'     => 'Content',
                'name'      => '',
                'type'      => 'tab',
                'placement' => 'top',
            ],
            [
                'key'          => 'field_shortcode',
                'label'        => 'Shortcode',
                'name'         => 'shortcode',
                'type'         => 'text',
                'instructions' => 'Voer de shortcode in inclusief de brackets, bijv. [contact-form-7 id="123"]',
            ],
            [
                'key'      => 'field_shortcode_accordion_end',
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
                    'value'    => 'acf/shortcode',
                ],
            ],
        ],
    ]);
});
