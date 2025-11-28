<?php
/**
 * Contact Map Block
 */

// Register ACF Block
add_action('acf/init', 'register_contact_map_block');

function register_contact_map_block() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'contact-map',
            'title'             => __('Contact Map'),
            'description'       => __('Een contact sectie met formulier en kaart'),
            'render_template'   => get_template_directory() . '/resources/blocks/contact-map/contact-map.php',
            'category'          => 'custom-blocks',
            'icon'              => 'location-alt',
            'keywords'          => array('contact', 'map', 'form', 'location'),
            'mode'              => 'edit',
            'supports'          => array(
                'align' => false,
                'anchor' => true,
            ),
        ));
    }
}

// Register ACF Fields
add_action('acf/init', 'register_contact_map_fields');

function register_contact_map_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_contact_map',
            'title' => 'Contact Map Instellingen',
            'fields' => array(
                array(
                    'key' => 'field_cm_accordion',
                    'label' => 'Contact Map',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ),

                // Tab: Content
                array(
                    'key' => 'field_cm_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_contact_map_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_map_subtitle',
                    'label' => 'Ondertitel',
                    'name' => 'subtitle',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                // Tab: Formulier
                array(
                    'key' => 'field_cm_tab_formulier',
                    'label' => 'Formulier',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_contact_map_gravity_form',
                    'label' => 'Gravity Forms Shortcode',
                    'name' => 'gravity_form_shortcode',
                    'type' => 'text',
                    'instructions' => 'Voer de Gravity Forms shortcode in (bijv. [gravityform id="1"])',
                ),

                // Tab: Map
                array(
                    'key' => 'field_cm_tab_map',
                    'label' => 'Map',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_contact_map_embed_code',
                    'label' => 'Google Maps Embed Code',
                    'name' => 'map_embed_code',
                    'type' => 'textarea',
                    'instructions' => 'Plak hier de iframe embed code van Google Maps. Breedte en hoogte worden automatisch ingesteld (100% breed, 320px hoog).',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_contact_map_zoom',
                    'label' => 'Zoom niveau',
                    'name' => 'map_zoom',
                    'type' => 'number',
                    'instructions' => 'Zoomniveau van 1 (wereld) tot 20 (straat). Standaard: 15',
                    'min' => 1,
                    'max' => 20,
                    'step' => 1,
                ),
                // Tab: Cards
                array(
                    'key' => 'field_cm_tab_cards',
                    'label' => 'Cards',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_contact_map_cards',
                    'label' => 'Contact Cards',
                    'name' => 'contact_cards',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Card toevoegen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_contact_card_title',
                            'label' => 'Titel',
                            'name' => 'card_title',
                            'type' => 'text',
                            'wrapper' => array('width' => '30'),
                        ),
                        array(
                            'key' => 'field_contact_card_content',
                            'label' => 'Inhoud',
                            'name' => 'card_content',
                            'type' => 'textarea',
                            'rows' => 2,
                            'wrapper' => array('width' => '40'),
                        ),
                        array(
                            'key' => 'field_contact_card_link',
                            'label' => 'Link (optioneel)',
                            'name' => 'card_link',
                            'type' => 'url',
                            'wrapper' => array('width' => '30'),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_cm_accordion_end',
                    'label' => '',
                    'name' => 'accordion_end_cm',
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
                        'value' => 'acf/contact-map',
                    ),
                ),
            ),
        ));
    }
}
