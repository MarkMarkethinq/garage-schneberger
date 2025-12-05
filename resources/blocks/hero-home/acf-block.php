<?php
/**
 * Hero Home Block
 */

// Register ACF Block
add_action('acf/init', 'register_hero_home_block');

function register_hero_home_block() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'hero-home',
            'title'             => __('Hero Home'),
            'description'       => __('Een hero sectie voor de homepage'),
            'render_template'   => get_template_directory() . '/resources/blocks/hero-home/hero-home.php',
            'category'          => 'custom-blocks',
            'icon'              => 'cover-image',
            'keywords'          => array('hero', 'home', 'header'),
            'mode'              => 'edit',
            'supports'          => array(
                'align' => false,
                'anchor' => true,
            ),
        ));
    }
}

// Register ACF Fields
add_action('acf/init', 'register_hero_home_fields');

function register_hero_home_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_hero_home',
            'title' => 'Hero Home Instellingen',
            'fields' => array(
                array(
                    'key' => 'field_hh_accordion',
                    'label' => 'Hero Home',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ),

                // Tab: Layout
                array(
                    'key' => 'field_hh_tab_layout',
                    'label' => 'Layout',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hh_background',
                    'label' => 'Achtergrond',
                    'name' => 'background',
                    'type' => 'select',
                    'choices' => array(
                        'transparent' => 'Transparant',
                        'gray' => 'Lichtgrijs',
                        'dark' => 'Donker',
                    ),
                ),

                // Tab: Content
                array(
                    'key' => 'field_hh_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hero_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'textarea',
                    'required' => 1,
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_hero_subtitle',
                    'label' => 'Ondertitel',
                    'name' => 'subtitle',
                    'type' => 'wysiwyg',
                    'required' => 1,
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                ),

                // Tab: USPs
                array(
                    'key' => 'field_hh_tab_usps',
                    'label' => 'USPs',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hero_usps',
                    'label' => 'USPs',
                    'name' => 'usps',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'USP toevoegen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_usp_title',
                            'label' => 'Titel',
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_usp_description',
                            'label' => 'Beschrijving',
                            'name' => 'description',
                            'type' => 'text',
                            'required' => 1,
                        ),
                    ),
                ),

                // Tab: Button
                array(
                    'key' => 'field_hh_tab_button',
                    'label' => 'Button',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hero_button_text',
                    'label' => 'Button Tekst',
                    'name' => 'button_text',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => array('width' => '50'),
                ),
                array(
                    'key' => 'field_hero_button_link',
                    'label' => 'Button Link',
                    'name' => 'button_link',
                    'type' => 'url',
                    'required' => 1,
                    'wrapper' => array('width' => '50'),
                ),

                // Tab: Counters
                array(
                    'key' => 'field_hh_tab_counters',
                    'label' => 'Counters',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hero_counters',
                    'label' => 'Counters',
                    'name' => 'counters',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Counter toevoegen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_counter_number',
                            'label' => 'Nummer',
                            'name' => 'number',
                            'type' => 'number',
                            'required' => 1,
                            'wrapper' => array(
                                'width' => '30',
                            ),
                        ),
                        array(
                            'key' => 'field_counter_suffix',
                            'label' => 'Suffix',
                            'name' => 'suffix',
                            'type' => 'text',
                            'instructions' => 'Bijv. +, k, %',
                            'wrapper' => array(
                                'width' => '20',
                            ),
                        ),
                        array(
                            'key' => 'field_counter_label',
                            'label' => 'Label',
                            'name' => 'label',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array(
                                'width' => '50',
                            ),
                        ),
                    ),
                ),

                // Tab: Afbeelding
                array(
                    'key' => 'field_hh_tab_afbeelding',
                    'label' => 'Afbeelding',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_hero_background_image',
                    'label' => 'Achtergrond Afbeelding',
                    'name' => 'background_image',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'large',
                    'required' => 1,
                ),
                // Accordion End
                array(
                    'key' => 'field_hh_accordion_end',
                    'label' => '',
                    'name' => 'accordion_end_hh',
                    'type' => 'accordion',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'open' => 0,
                    'multi_expand' => 0,
                    'endpoint' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/hero-home',
                    ),
                ),
            ),
        ));
    }
}
