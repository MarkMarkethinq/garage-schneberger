<?php
/**
 * Features Block
 */

// Register ACF Block
add_action('acf/init', 'register_features_block');

function register_features_block() {
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'features',
            'title'             => __('Features'),
            'description'       => __('Een sectie met features/USPs'),
            'render_template'   => get_template_directory() . '/resources/blocks/features/features.php',
            'category'          => 'custom-blocks',
            'icon'              => 'list-view',
            'keywords'          => array('features', 'usps', 'waarom'),
            'mode'              => 'edit',
            'supports'          => array(
                'align' => false,
                'anchor' => true,
            ),
        ));
    }
}

// Register ACF Fields
add_action('acf/init', 'register_features_fields');

function register_features_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_features',
            'title' => 'Features Instellingen',
            'fields' => array(
                array(
                    'key' => 'field_features_accordion',
                    'label' => 'Features',
                    'name' => '',
                    'type' => 'accordion',
                    'open' => 1,
                ),

                // Tab: Content
                array(
                    'key' => 'field_features_tab_content',
                    'label' => 'Content',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_features_title',
                    'label' => 'Titel',
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 0,
                ),
                // Tab: Features
                array(
                    'key' => 'field_features_tab_features',
                    'label' => 'Features',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_features_repeater',
                    'label' => 'Features',
                    'name' => 'features',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Feature toevoegen',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_feature_icon',
                            'label' => 'Icoon',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => '20',
                                'class' => '',
                                'id' => '',
                            ),
                        ),
                        array(
                            'key' => 'field_feature_title',
                            'label' => 'Titel',
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 0,
                            'wrapper' => array(
                                'width' => '30',
                                'class' => '',
                                'id' => '',
                            ),
                        ),
                        array(
                            'key' => 'field_feature_description',
                            'label' => 'Beschrijving',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'required' => 0,
                            'tabs' => 'all',
                            'toolbar' => 'basic',
                            'media_upload' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                        ),
                    ),
                ),
                // Tab: Afbeelding
                array(
                    'key' => 'field_features_tab_afbeelding',
                    'label' => 'Afbeelding',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'field_features_image',
                    'label' => 'Afbeelding',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_features_accordion_end',
                    'label' => '',
                    'name' => 'accordion_end_features',
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
                        'value' => 'acf/features',
                    ),
                ),
            ),
        ));
    }
}
