<?php
/**
 * Feature Cards Block Registration
 */

add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'            => 'feature-cards',
            'title'           => __('Feature Cards'),
            'description'     => __('A block with feature cards in a variable grid layout.'),
            'render_template' => get_template_directory() . '/resources/blocks/feature-cards/feature-cards.php',
            'category'        => 'theme-blocks',
            'icon'            => 'grid-view',
            'keywords'        => ['feature', 'cards', 'grid'],
            'mode'            => 'edit',
        ]);
    }
});

add_action('acf/init', function () {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key'      => 'group_feature_cards',
            'title'    => 'Feature Cards',
            'fields'   => [
                [
                    'key'   => 'field_feature_cards_accordion',
                    'label' => 'Feature Cards',
                    'name'  => '',
                    'type'  => 'accordion',
                    'open'  => 1,
                ],

                // Tab: Content
                [
                    'key'       => 'field_feature_cards_tab_content',
                    'label'     => 'Content',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'   => 'field_feature_cards_title',
                    'label' => 'Titel',
                    'name'  => 'title',
                    'type'  => 'text',
                ],
                [
                    'key'          => 'field_feature_cards_description',
                    'label'        => 'Beschrijving',
                    'name'         => 'description',
                    'type'         => 'wysiwyg',
                    'tabs'         => 'all',
                    'toolbar'      => 'full',
                    'media_upload' => 0,
                ],
                // Tab: Layout
                [
                    'key'       => 'field_feature_cards_tab_layout',
                    'label'     => 'Layout',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'     => 'field_feature_cards_columns',
                    'label'   => 'Kolommen',
                    'name'    => 'columns',
                    'type'    => 'select',
                    'choices' => [
                        '2' => '2 kolommen',
                        '3' => '3 kolommen',
                        '4' => '4 kolommen',
                    ],
                    'wrapper' => ['width' => '50'],
                ],
                [
                    'key'     => 'field_feature_cards_background',
                    'label'   => 'Achtergrond',
                    'name'    => 'background',
                    'type'    => 'select',
                    'choices' => [
                        'transparent' => 'Transparant',
                        'gray' => 'Lichtgrijs',
                        'dark' => 'Donker',
                    ],
                    'wrapper' => ['width' => '50'],
                ],

                // Tab: Cards
                [
                    'key'       => 'field_feature_cards_tab_cards',
                    'label'     => 'Cards',
                    'name'      => '',
                    'type'      => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key'        => 'field_feature_cards_cards',
                    'label'      => 'Cards',
                    'name'       => 'cards',
                    'type'       => 'repeater',
                    'layout'     => 'block',
                    'sub_fields' => [
                        [
                            'key'     => 'field_feature_cards_card_title',
                            'label'   => 'Titel',
                            'name'    => 'card_title',
                            'type'    => 'text',
                            'wrapper' => ['width' => '40'],
                        ],
                        [
                            'key'          => 'field_feature_cards_card_description',
                            'label'        => 'Beschrijving',
                            'name'         => 'card_description',
                            'type'         => 'wysiwyg',
                            'tabs'         => 'all',
                            'toolbar'      => 'full',
                            'media_upload' => 0,
                            'wrapper'      => ['width' => '60'],
                        ],
                    ],
                ],

                // Accordion End
                [
                    'key'      => 'field_feature_cards_accordion_end',
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
                        'value'    => 'acf/feature-cards',
                    ],
                ],
            ],
        ]);
    }
});
