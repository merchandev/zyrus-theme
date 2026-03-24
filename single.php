<?php
/**
 * Tema plantilla para entradas de blog genéricas
 */
get_header(); 
?>

<main class="pt-32 pb-24 lg:pt-40 lg:pb-32 bg-zyrus-light min-h-screen">
    <div class="max-w-4xl mx-auto px-6 md:px-12 lg:px-16">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <p class="text-xs text-uppercase tracking-widest text-zyrus-primary mb-4 font-bold border-l-2 border-zyrus-accent pl-3">Publicado el <?php echo get_the_date(); ?></p>
                <h1 class="text-4xl md:text-5xl font-serif text-zyrus-dark mb-10 leading-tight"><?php the_title(); ?></h1>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-12 rounded-3xl overflow-hidden shadow-xl border border-gray-100">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="prose prose-lg max-w-none text-gray-600 font-light leading-relaxed prose-headings:font-serif prose-headings:text-zyrus-dark prose-a:text-zyrus-primary">
                    <?php the_content(); ?>
                </div>
                
                <div class="mt-16 pt-8 border-t border-gray-200 flex flex-col md:flex-row justify-between text-sm text-gray-500 font-semibold gap-4">
                    <div class="hover:text-zyrus-primary transition"><?php previous_post_link( '&larr; %link' ); ?></div>
                    <div class="text-right hover:text-zyrus-primary transition"><?php next_post_link( '%link &rarr;' ); ?></div>
                </div>
                
                <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
