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
                    'key' => 'field_cm_accordion_content',
                    'label' => 'Contact Map Instellingen',
                    'name' => 'accordion_content_cm',
                    'type' => 'accordion',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'open' => 1,
                    'multi_expand' => 0,
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_contact_map_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_contact_map_subtitle',
                    'label' => 'Ondertitel',
                    'name' => 'subtitle',
                    'type' => 'textarea',
                    'rows' => 2,
                ),
                array(
                    'key' => 'field_contact_map_layout',
                    'label' => 'Layout',
                    'name' => 'layout',
                    'type' => 'radio',
                    'choices' => array(
                        'form_left' => 'Formulier links, kaart rechts',
                        'form_right' => 'Formulier rechts, kaart links',
                    ),
                    'layout' => 'horizontal',
                ),
                array(
                    'key' => 'field_contact_map_gravity_form',
                    'label' => 'Gravity Forms Shortcode',
                    'name' => 'gravity_form_shortcode',
                    'type' => 'text',
                    'instructions' => 'Voer de Gravity Forms shortcode in (bijv. [gravityform id="1"])',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_contact_map_contact_info',
                    'label' => 'Contact Informatie',
                    'name' => 'contact_info',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Contact item toevoegen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_contact_info_icon',
                            'label' => 'Icoon',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_contact_info_text',
                            'label' => 'Tekst',
                            'name' => 'text',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_contact_info_link',
                            'label' => 'Link (optioneel)',
                            'name' => 'link',
                            'type' => 'url',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_contact_map_embed_code',
                    'label' => 'Google Maps Embed Code',
                    'name' => 'map_embed_code',
                    'type' => 'textarea',
                    'instructions' => 'Plak hier de iframe embed code van Google Maps',
                    'rows' => 4,
                    'required' => 1,
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
