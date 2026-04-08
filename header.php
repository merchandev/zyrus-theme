<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <!-- Meta Pixel Code Placeholder -->
    <!-- Start Pixel -->
    <!-- End Pixel -->
</head>
<body <?php body_class( 'font-sans text-gray-800 antialiased bg-zyrus-light selection:bg-zyrus-accent selection:text-zyrus-dark' ); ?>>

<!-- NAVBAR -->
<nav class="fixed w-full z-50 top-0 transition-all duration-300 bg-zyrus-dark border-b border-white/5 h-[56px] lg:h-[64px] flex items-center shadow-lg">
    <div class="w-full max-w-7xl mx-auto px-6 lg:px-16 flex justify-center items-center">
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block transition hover:opacity-80">
            <img src="https://zyrussmile.center/wp-content/uploads/2026/03/LOGO-NUEVO-ZYRUS_blanco-scaled-e1774318899491.png" alt="Zyrus" class="h-8 md:h-10 w-auto">
        </a>
    </div>
</nav>
