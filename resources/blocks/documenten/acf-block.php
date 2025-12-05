<?php
/**
 * Documenten Block Registration
 */

// Register Block
add_action('acf/init', function() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'              => 'documenten',
            'title'             => __('Documenten'),
            'description'       => __('Tekstrijke content voor privacy verklaring, cookie beleid, algemene voorwaarden etc.'),
            'render_template'   => get_template_directory() . '/resources/blocks/documenten/documenten.php',
            'category'          => 'formatting',
            'icon'              => 'text-page',
            'keywords'          => ['documenten', 'privacy', 'cookie', 'tekst', 'beleid', 'voorwaarden'],
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
            'key' => 'group_documenten_block',
            'title' => 'Documenten Block',
            'fields' => [
                [
                    'key' => 'field_documenten_accordion',
                    'label' => 'Documenten',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ],
                // Tab: Layout
                [
                    'key' => 'field_documenten_tab_layout',
                    'label' => 'Layout',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_documenten_background',
                    'label' => 'Achtergrond',
                    'name' => 'background',
                    'type' => 'select',
                    'choices' => [
                        'transparent' => 'Transparant',
                        'gray' => 'Lichtgrijs',
                        'dark' => 'Donker',
                    ],
                ],
                // Tab: Content
                [
                    'key' => 'field_documenten_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'key' => 'field_documenten_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => 'Bijv. "Privacy Verklaring" of "Cookie Beleid"',
                ],
                [
                    'key' => 'field_documenten_content',
                    'label' => 'Inhoud',
                    'name' => 'content',
                    'type' => 'wysiwyg',
                    'instructions' => 'Volledige tekst van het document. Gebruik koppen (H2, H3) voor structuur.',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ],
                // Accordion End
                [
                    'key' => 'field_documenten_accordion_end',
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
                        'value' => 'acf/documenten',
                    ],
                ],
            ],
        ]);
    }
});
