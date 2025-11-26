<?php
/**
 * ACF Options Page
 * 
 * Registreert een admin pagina voor site-brede instellingen zoals header en footer
 */

// Registreer ACF Options Page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme Instellingen',
        'menu_title'    => 'Theme Instellingen',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-customizer',
        'position'      => 60
    ));
    
}

// Registreer Field Groups
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_theme_settings',
    'title' => 'Theme Instellingen',
    'fields' => array(
        // Tab: Header
        array(
            'key' => 'field_header_tab',
            'label' => 'Header',
            'name' => '',
            'type' => 'tab',
            'placement' => 'top',
        ),
        array(
            'key' => 'field_header_logo',
            'label' => 'Header Logo',
            'name' => 'header_logo',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_header_button_link',
            'label' => 'Header Knop',
            'name' => 'header_button_link',
            'type' => 'link',
            'return_format' => 'array',
        ),
        
        // Tab: Footer
        array(
            'key' => 'field_footer_tab',
            'label' => 'Footer',
            'name' => '',
            'type' => 'tab',
            'placement' => 'top',
        ),
        
        // Accordion: Logo & Partner Logos
        array(
            'key' => 'field_accordion_logos',
            'label' => 'Logo & Partner Logo\'s',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_footer_logo',
            'label' => 'Footer Logo',
            'name' => 'footer_logo',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_footer_partner_logos',
            'label' => 'Partner Logo\'s',
            'name' => 'footer_partner_logos',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Logo toevoegen',
            'sub_fields' => array(
                array(
                    'key' => 'field_partner_logo_image',
                    'label' => 'Logo',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key' => 'field_partner_logo_alt',
                    'label' => 'Alt tekst',
                    'name' => 'alt_text',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'field_accordion_logos_end',
            'label' => 'Einde Logo\'s',
            'type' => 'accordion',
            'endpoint' => 1,
        ),
        
        // Accordion: Contact Section
        array(
            'key' => 'field_accordion_contact',
            'label' => 'Contact Gegevens',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_footer_contact_heading',
            'label' => 'Contact Heading',
            'name' => 'footer_contact_heading',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_address',
            'label' => 'Adres',
            'name' => 'footer_address',
            'type' => 'textarea',
            'rows' => 3,
        ),
        array(
            'key' => 'field_footer_phone',
            'label' => 'Telefoonnummer',
            'name' => 'footer_phone',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_email',
            'label' => 'E-mail',
            'name' => 'footer_email',
            'type' => 'email',
        ),
        array(
            'key' => 'field_accordion_contact_end',
            'label' => 'Einde Contact',
            'type' => 'accordion',
            'endpoint' => 1,
        ),
        
        // Accordion: Informatie Section
        array(
            'key' => 'field_accordion_info',
            'label' => 'Informatie',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_footer_info_heading',
            'label' => 'Informatie Heading',
            'name' => 'footer_info_heading',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_bank',
            'label' => 'Bank informatie',
            'name' => 'footer_bank',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_btw',
            'label' => 'BTW nummer',
            'name' => 'footer_btw',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_kvk',
            'label' => 'KvK nummer',
            'name' => 'footer_kvk',
            'type' => 'text',
        ),
        array(
            'key' => 'field_accordion_info_end',
            'label' => 'Einde Informatie',
            'type' => 'accordion',
            'endpoint' => 1,
        ),
        
        // Accordion: Openingstijden Section
        array(
            'key' => 'field_accordion_hours',
            'label' => 'Openingstijden',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_footer_hours_heading',
            'label' => 'Openingstijden Heading',
            'name' => 'footer_hours_heading',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_hours_weekdays',
            'label' => 'Weekdagen',
            'name' => 'footer_hours_weekdays',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_hours_lunch',
            'label' => 'Pauze',
            'name' => 'footer_hours_lunch',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_hours_saturday',
            'label' => 'Zaterdag',
            'name' => 'footer_hours_saturday',
            'type' => 'text',
        ),
        array(
            'key' => 'field_accordion_hours_end',
            'label' => 'Einde Openingstijden',
            'type' => 'accordion',
            'endpoint' => 1,
        ),
        
        // Accordion: Bottom Links
        array(
            'key' => 'field_accordion_bottom',
            'label' => 'Bottom Links & Copyright',
            'type' => 'accordion',
            'open' => 0,
            'multi_expand' => 1,
        ),
        array(
            'key' => 'field_footer_copyright',
            'label' => 'Copyright Tekst',
            'name' => 'footer_copyright',
            'type' => 'text',
            'instructions' => 'Gebruik {year} om automatisch het huidige jaar te tonen',
        ),
        array(
            'key' => 'field_footer_privacy_text',
            'label' => 'Privacy Link Tekst',
            'name' => 'footer_privacy_text',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_privacy_link',
            'label' => 'Privacy Link URL',
            'name' => 'footer_privacy_link',
            'type' => 'url',
        ),
        array(
            'key' => 'field_footer_terms_text',
            'label' => 'Algemene Voorwaarden Tekst',
            'name' => 'footer_terms_text',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_terms_link',
            'label' => 'Algemene Voorwaarden URL',
            'name' => 'footer_terms_link',
            'type' => 'url',
        ),
        array(
            'key' => 'field_footer_cookies_text',
            'label' => 'Cookies Link Tekst',
            'name' => 'footer_cookies_text',
            'type' => 'text',
        ),
        array(
            'key' => 'field_footer_cookies_link',
            'label' => 'Cookies Link URL',
            'name' => 'footer_cookies_link',
            'type' => 'url',
        ),
        array(
            'key' => 'field_footer_contact_button_link',
            'label' => 'Footer Contact Knop',
            'name' => 'footer_contact_button_link',
            'type' => 'link',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_accordion_bottom_end',
            'label' => 'Einde Bottom Links',
            'type' => 'accordion',
            'endpoint' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-settings',
            ),
        ),
    ),
));

endif;
