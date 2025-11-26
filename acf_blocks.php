<?php 
/**
 * ACF Blocks Central Registration
 * 
 * Dit bestand wordt gebruikt voor algemene ACF block configuratie.
 * Individuele blocks worden geregistreerd via hun eigen acf-block.php files
 * die automatisch worden geladen door includes/acf-blocks-loader.php
 */

// Voeg custom block categorie toe
add_action('block_categories_all', 'add_custom_block_category', 10, 2);
function add_custom_block_category($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'custom-blocks',
                'title' => 'Custom Blocks',
                'icon'  => 'format-image',
            ),
        )
    );
}