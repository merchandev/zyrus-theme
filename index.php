<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="max-w-7xl mx-auto px-6 py-20 lg:px-8">
        <?php
        if ( have_posts() ) :

            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                // Simple fallback display
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-10 text-gray-800 font-sans' ); ?>>
                    <header class="entry-header mb-4">
                        <?php the_title( '<h1 class="entry-title text-3xl font-bold mb-4">', '</h1>' ); ?>
                    </header>
                    <div class="entry-content leading-relaxed text-gray-600">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php

            endwhile;

        else :
            echo '<p>No content found.</p>';
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
