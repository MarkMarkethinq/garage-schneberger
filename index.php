<?php
/**
 * The main template file
 * 
 * Dit is het hoofdbestand dat WordPress gebruikt om de homepage en andere content te tonen.
 */

get_header();
?>

<main class="min-h-screen">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container mx-auto px-4 py-8">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <header class="mb-8">
                            <h1 class="text-3xl font-bold text-gray-900"><?php single_post_title(); ?></h1>
                        </header>
                    <?php endif; ?>
                    
                    <div class="prose max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile;
        
        // Paginatie
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('Vorige', 'textdomain'),
            'next_text' => __('Volgende', 'textdomain'),
        ));
        
    else : ?>
        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Geen content gevonden</h1>
            <p class="text-gray-600 mb-8">Sorry, er is geen content beschikbaar op deze pagina.</p>
            <a href="<?php echo home_url(); ?>" class="bg-primary-700 text-white px-6 py-3 rounded-lg hover:bg-primary-800 transition-colors">
                Terug naar home
            </a>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
