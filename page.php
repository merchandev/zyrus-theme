<?php
/**
 * Tema plantilla para páginas genéricas
 */
get_header(); 
?>

<main class="pt-32 pb-24 lg:pt-40 lg:pb-32 bg-zyrus-light min-h-screen">
    <div class="max-w-4xl mx-auto px-6 md:px-12 lg:px-16">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <span class="text-zyrus-primary font-bold tracking-widest uppercase text-xs mb-4 block">Zyrus Smile Center</span>
                <h1 class="text-4xl md:text-5xl font-serif text-zyrus-dark mb-10 leading-tight border-b border-gray-200 pb-6"><?php the_title(); ?></h1>
                
                <div class="prose prose-lg max-w-none text-gray-600 font-light leading-relaxed prose-headings:font-serif prose-headings:text-zyrus-dark prose-a:text-zyrus-primary hover:prose-a:text-zyrus-accent">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
