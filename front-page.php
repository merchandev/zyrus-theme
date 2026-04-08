<?php
/**
 * The front page template file
 */
get_header();
$theme_image_base = get_template_directory_uri() . '/assets/image';
?>

<!-- BLOQUE 1: Hero Section -->
<header class="relative w-full min-h-[90vh] lg:min-h-screen bg-gradient-to-br from-zyrus-dark to-[#08111A] flex items-center overflow-hidden">
    <!-- BG abstract glow/gradient -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-zyrus-accent/10 rounded-full blur-[150px] -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-zyrus-primary/20 rounded-full blur-[150px] translate-y-1/3 -translate-x-1/3 pointer-events-none"></div>
    
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-16 pt-24 pb-16 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">
        <!-- Left Side: Copy & CTA -->
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-[5.5rem] font-serif text-zyrus-light leading-[1.1] mb-6">
                Tu sonrisa habla<br>antes que tú.
            </h1>
            <h2 class="text-2xl md:text-3xl font-serif italic text-zyrus-ice mb-6">
                ¿Está diciendo lo que realmente quieres proyectar?
            </h2>
            <p class="text-base text-zyrus-light font-sans font-light mb-10 max-w-lg">
                Diseño de sonrisa con carillas e implantes para personas que entienden que su presencia es uno de sus activos más valiosos.
            </p>
            
            <div>
                <a href="#diagnostico" class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 text-[13px] font-sans font-medium text-zyrus-dark bg-zyrus-accent hover:bg-[#DBC18D] transition-all rounded-none mb-3 relative overflow-hidden group">
                    <span class="relative z-10 font-bold uppercase tracking-wider">QUIERO MI DIAGNOSTICO</span>
                    <div class="absolute inset-0 -translate-x-full bg-white/30 group-hover:translate-x-full transition-transform duration-1000"></div>
                </a>
                <p class="text-zyrus-light font-sans font-light text-[12px] opacity-80">
                    Sin compromiso &middot; Solo 5 cupos disponibles esta semana
                </p>
            </div>
            

        </div>
        
        <!-- Right Side: Video Reel -->
        <div class="relative mx-auto lg:ml-auto w-full max-w-[340px] aspect-[9/16] rounded-[2.5rem] overflow-hidden border border-white/5 shadow-2xl bg-black">
            <video src="https://zyrussmile.center/wp-content/uploads/2026/03/Zyrus-Ad-MARZO-2026.mp4" poster="<?php echo esc_url( $theme_image_base . '/HERO1.webp' ); ?>" class="w-full h-full object-cover object-center" playsinline controls preload="metadata" aria-label="Simulación digital de sonrisa"></video>
        </div>
    </div>
</header>

<!-- BLOQUE 2: Activador de Dolor -->
<section class="py-20 lg:py-28 bg-zyrus-dark border-t border-white/5">
    <div class="max-w-5xl lg:max-w-6xl mx-auto px-6 md:px-12 lg:px-16 text-center">
        <h2 class="text-3xl md:text-4xl lg:text-[44px] xl:text-5xl font-serif text-zyrus-light mb-4">
            ¿Alguna de estas situaciones te resulta familiar?
        </h2>
        <h3 class="text-lg md:text-xl font-sans font-light italic text-zyrus-ice mb-12">
            No estás sola. Y tiene solución.
        </h3>
        
        <ul class="text-left space-y-6 max-w-2xl mx-auto mb-16">
            <li class="flex items-start gap-4 pb-6 border-b border-white/10">
                <span class="text-zyrus-accent text-xl leading-none mt-1">&times;</span>
                <span class="font-sans text-[15px] text-zyrus-light/90 font-light">Cubres tu boca sin darte cuenta cuando alguien te toma una foto.</span>
            </li>
            <li class="flex items-start gap-4 pb-6 border-b border-white/10">
                <span class="text-zyrus-accent text-xl leading-none mt-1">&times;</span>
                <span class="font-sans text-[15px] text-zyrus-light/90 font-light">Sientes que tu sonrisa no refleja el nivel de éxito y elegancia que has construido.</span>
            </li>
            <li class="flex items-start gap-4 pb-6 border-b border-white/10">
                <span class="text-zyrus-accent text-xl leading-none mt-1">&times;</span>
                <span class="font-sans text-[15px] text-zyrus-light/90 font-light">Evitas soltar una carcajada genuina en cenas, eventos o reuniones de trabajo.</span>
            </li>
            <li class="flex items-start gap-4 pb-6 border-b border-white/10">
                <span class="text-zyrus-accent text-xl leading-none mt-1">&times;</span>
                <span class="font-sans text-[15px] text-zyrus-light/90 font-light">Percibes que tu sonrisa te hace ver más cansada o mayor de lo que realmente eres.</span>
            </li>
            <li class="flex items-start gap-4 pb-2">
                <span class="text-zyrus-accent text-xl leading-none mt-1">&times;</span>
                <span class="font-sans text-[15px] text-zyrus-light/90 font-light">Llevas meses — o años — pensando en esto, pero siempre encuentras una razón para postergarlo.</span>
            </li>
        </ul>
        
        <p class="font-serif italic text-2xl md:text-3xl text-zyrus-accent">
            "Lo que sientes es real. Y ya no tienes que seguir sintiéndolo."
        </p>
    </div>
</section>

<!-- BLOQUE 3: Posicionamiento de Marca -->
<section class="py-20 lg:py-28 bg-zyrus-light">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
        <div class="order-2 lg:order-1">
            <h2 class="text-4xl md:text-[40px] leading-tight font-serif text-zyrus-dark mb-10">
                No somos una clínica dental. Somos arquitectos de presencia.
            </h2>
            
            <div class="space-y-8">
                <div>
                    <h4 class="font-sans font-semibold text-lg text-zyrus-dark mb-2">Diseño personalizado</h4>
                    <p class="font-sans font-light text-[15px] text-gray-700">Cada sonrisa es diseñada digitalmente. La ves y la apruebas antes de iniciar cualquier cosa.</p>
                </div>
                <div>
                    <h4 class="font-sans font-semibold text-lg text-zyrus-dark mb-2">Carillas e implantes de referencia</h4>
                    <p class="font-sans font-light text-[15px] text-gray-700">Trabajamos exclusivamente con materiales que cumplen el estándar estético más alto disponible en el mundo.</p>
                </div>
                <div>
                    <h4 class="font-sans font-semibold text-lg text-zyrus-dark mb-2">Resultado que se ve natural</h4>
                    <p class="font-sans font-light text-[15px] text-gray-700">Evitamos los falsos "blancos tiza". Nuestro objetivo es que te veas como tú, pero en tu versión más poderosa.</p>
                </div>
            </div>
            
            <div class="mt-12 pt-6 border-t border-zyrus-primary/20">
                <p class="font-sans font-light text-[13px] text-zyrus-primary tracking-wide uppercase">
                    Polanco, CDMX &middot; 10+ años de experiencia
                </p>
            </div>
        </div>
        
        <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
            <div class="aspect-[9/16] w-full max-w-[380px] bg-black rounded-[2rem] overflow-hidden shadow-2xl border border-white/5">
                <video src="https://zyrussmile.center/wp-content/uploads/2026/03/photoshop-.mp4#t=2" class="w-full h-full object-cover opacity-90 hover:opacity-100 transition-opacity" playsinline controls preload="metadata" aria-label="Simulación digital de sonrisa"></video>
            </div>
        </div>
    </div>
</section>

<!-- VIDEO GALLERY (Casos Reales CPT) -->
<section class="py-20 lg:py-28 bg-zyrus-dark overflow-hidden border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16 mb-10 border-b border-white/10 pb-6 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-6">
        <div>
            <h2 class="text-3xl md:text-[40px] font-serif text-zyrus-light leading-tight">Casos Reales en Video</h2>
            <p class="font-sans font-light text-[15px] text-zyrus-ice mt-2">La transformación en movimiento real, sin filtros.</p>
        </div>
        <!-- Controles de Slider -->
        <div class="flex gap-2">
            <button id="btn-prev-gallery" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-zyrus-accent hover:border-zyrus-accent hover:text-zyrus-dark transition-all cursor-pointer z-10">
                &larr;
            </button>
            <button id="btn-next-gallery" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-zyrus-accent hover:border-zyrus-accent hover:text-zyrus-dark transition-all cursor-pointer z-10">
                &rarr;
            </button>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16">
        <div id="gallery-container" class="flex flex-nowrap overflow-x-auto gap-6 pb-8 scrollbar-hide snap-x scroll-smooth">
            <?php
            $default_videos = [
                [ 'url' => 'https://zyrussmile.center/wp-content/uploads/2026/03/¡El-antes-y-despues-de-nuestra-paciente-habla-por-si-solo-✨-Con-nuestros-tratamientos-de-blanqu.mp4', 'time' => 36 ],
                [ 'url' => 'https://zyrussmile.center/wp-content/uploads/2026/03/Nos-encanta-ver-a-nuestros-pacientes-felices-con-su-nueva-sonrisa-Zyrus.-😄💙Una-sonrisa-transfo.mp4', 'time' => 28 ],
                [ 'url' => 'https://zyrussmile.center/wp-content/uploads/2026/03/¡Lista-para-el-gran-dia-👰🏼💍-conoce-el-testimonio-de-nuestra-paciente-quien-se-preparo-para-.mp4', 'time' => 5 ],
                [ 'url' => 'https://zyrussmile.center/wp-content/uploads/2026/03/✨💙En-Zyrus-nos-enorgullece-brindar-una-atencion-personalizada-y-de-calidad-a-cada-uno-de-nuest.mp4', 'time' => 14 ],
                [ 'url' => 'https://zyrussmile.center/wp-content/uploads/2026/03/¡Cada-sonrisa-que-transformamos-nos-llena-de-orgullo-💙Con-nuestras-carillas-dentales-personali.mp4', 'time' => 6 ]
            ];
            $default_video_posters = [
                $theme_image_base . '/C1.webp',
                $theme_image_base . '/C2.webp',
                $theme_image_base . '/C3.webp',
                $theme_image_base . '/C4.webp',
                $theme_image_base . '/C5.webp',
            ];
            
            $video_query = new WP_Query(array(
                'post_type'      => 'zyrus_video',
                'posts_per_page' => 10,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ));

            if ( $video_query->have_posts() ) :
                while ( $video_query->have_posts() ) : $video_query->the_post();
                    $video_url = get_post_meta( get_the_ID(), '_zyrus_video_url', true );
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_url( $thumb_id, 'large' ) ?: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80';
                    ?>
                    <div class="snap-center shrink-0 w-[280px] h-[500px] bg-black rounded-3xl overflow-hidden relative border border-white/5">
                        <video src="<?php echo esc_url($video_url); ?>" poster="<?php echo esc_url($thumb_url); ?>" class="w-full h-full object-cover" controls playsinline preload="none"></video>
                        <div class="absolute bottom-20 left-4 right-4 pointer-events-none bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl text-center border border-white/10 z-10 transition-opacity opacity-80 hover:opacity-100 title-overlay">
                            <h4 class="text-white font-sans font-bold text-sm leading-snug drop-shadow-md"><?php the_title(); ?></h4>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            
            foreach($default_videos as $index => $vid_data) :
                ?>
                <div class="snap-center shrink-0 w-[280px] h-[500px] bg-black rounded-3xl overflow-hidden relative border border-white/5">
                    <video src="<?php echo esc_url($vid_data['url']); ?>" poster="<?php echo esc_url($default_video_posters[$index] ?? ''); ?>" class="w-full h-full object-cover" controls playsinline preload="none"></video>
                    <div class="absolute bottom-20 left-4 right-4 pointer-events-none bg-black/50 backdrop-blur-md px-4 py-2 rounded-xl text-center border border-white/10 z-10 transition-opacity opacity-80 hover:opacity-100 title-overlay">
                        <h4 class="text-zyrus-light font-sans font-bold text-sm leading-snug drop-shadow-md">Caso de Éxito #<?php echo $index + 1; ?></h4>
                        <span class="text-zyrus-accent font-sans text-[10px] uppercase tracking-widest block mt-0.5">Transformación Real</span>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<!-- BLOQUE 4: Prueba Social -->
<section class="py-20 lg:py-28 bg-[#0b141a]">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16 mb-12 text-center">
        <h2 class="text-3xl md:text-5xl font-serif text-[#e9edef]">
            Lo que dicen quienes ya dieron el paso
        </h2>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16">
        <div id="testimonials-container" class="flex flex-nowrap overflow-x-auto lg:grid lg:grid-cols-3 gap-6 pb-8 snap-x snap-mandatory scrollbar-hide testimonials-scroll">
            <!-- Testimonial 1 -->
            <div class="snap-center shrink-0 w-[85%] sm:w-[350px] lg:w-auto relative mb-6 lg:mb-0 group ml-2 mb-4">
                <div class="bg-[#202C33] rounded-xl rounded-tl-[3px] p-3 px-4 shadow-[0_1px_0.5px_rgba(0,0,0,0.13)] relative">
                    <!-- Tail -->
                    <div class="absolute top-0 -left-[10px] w-0 h-0 border-t-[14px] border-t-[#202C33] border-l-[12px] border-l-transparent"></div>
                    
                    <div class="font-sans text-[14px] font-bold text-[#53bdeb] mb-1 flex items-baseline gap-1.5 flex-wrap">
                        Ana S. 
                        <span class="text-[#8696a0] font-normal text-[12px]">42 años &middot; Lomas de Chapultepec</span>
                    </div>
                    
                    <p class="font-sans text-[15.5px] text-[#e9edef] leading-[1.3] text-left">
                        Veía mis fotos de hace años y sentía que mi sonrisa se había apagado. El momento en que vi el diseño digital supe que estaba en el lugar correcto. Hoy me río sin pensarlo.
                    </p>
                    
                    <div class="flex justify-end items-center gap-1 mt-1 -mb-1">
                        <span class="font-sans text-[11px] text-[#8696a0]">10:42 a. m.</span>
                        <svg viewBox="0 -0.5 25 25" fill="none" class="w-[18px] h-[18px] text-[#53bdeb]" xmlns="http://www.w3.org/2000/svg"><path d="M5.03033 11.4697C4.73744 11.1768 4.26256 11.1768 3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L5.03033 11.4697ZM8.5 16L7.96967 16.5303C8.26256 16.8232 8.73744 16.8232 9.03033 16.5303L8.5 16ZM17.0303 8.53033C17.3232 8.23744 17.3232 7.76256 17.0303 7.46967C16.7374 7.17678 16.2626 7.17678 15.9697 7.46967L17.0303 8.53033ZM9.03033 11.4697C8.73744 11.1768 8.26256 11.1768 7.96967 11.4697C7.67678 11.7626 7.67678 12.2374 7.96967 12.5303L9.03033 11.4697ZM12.5 16L11.9697 16.5303C12.2626 16.8232 12.7374 16.8232 13.0303 16.5303L12.5 16ZM21.0303 8.53033C21.3232 8.23744 21.3232 7.76256 21.0303 7.46967C20.7374 7.17678 20.2626 7.17678 19.9697 7.46967L21.0303 8.53033ZM3.96967 12.5303L7.96967 16.5303L9.03033 15.4697L5.03033 11.4697L3.96967 12.5303ZM9.03033 16.5303L17.0303 8.53033L15.9697 7.46967L7.96967 15.4697L9.03033 16.5303ZM7.96967 12.5303L11.9697 16.5303L13.0303 15.4697L9.03033 11.4697L7.96967 12.5303ZM13.0303 16.5303L21.0303 8.53033L19.9697 7.46967L11.9697 15.4697L13.0303 16.5303Z" fill="currentColor"/></svg>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="snap-center shrink-0 w-[85%] sm:w-[350px] lg:w-auto relative mb-6 lg:mb-0 group ml-2 mt-0 lg:mt-12">
                <div class="bg-[#202C33] rounded-xl rounded-tl-[3px] p-3 px-4 shadow-[0_1px_0.5px_rgba(0,0,0,0.13)] relative">
                    <!-- Tail -->
                    <div class="absolute top-0 -left-[10px] w-0 h-0 border-t-[14px] border-t-[#202C33] border-l-[12px] border-l-transparent"></div>
                    
                    <div class="font-sans text-[14px] font-bold text-[#e18e8e] mb-1 flex items-baseline gap-1.5 flex-wrap">
                        Carla M. 
                        <span class="text-[#8696a0] font-normal text-[12px]">38 años &middot; Polanco</span>
                    </div>
                    
                    <p class="font-sans text-[15.5px] text-[#e9edef] leading-[1.3] text-left">
                        Mi mayor miedo era que se notara que me hice algo. Quería verme como yo, pero mejor. Zyrus logró exactamente eso. Nadie sabe qué me hice, solo me dicen que me veo increíble.
                    </p>
                    
                    <div class="flex justify-end items-center gap-1 mt-1 -mb-1">
                        <span class="font-sans text-[11px] text-[#8696a0]">11:25 a. m.</span>
                        <svg viewBox="0 -0.5 25 25" fill="none" class="w-[18px] h-[18px] text-[#53bdeb]" xmlns="http://www.w3.org/2000/svg"><path d="M5.03033 11.4697C4.73744 11.1768 4.26256 11.1768 3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L5.03033 11.4697ZM8.5 16L7.96967 16.5303C8.26256 16.8232 8.73744 16.8232 9.03033 16.5303L8.5 16ZM17.0303 8.53033C17.3232 8.23744 17.3232 7.76256 17.0303 7.46967C16.7374 7.17678 16.2626 7.17678 15.9697 7.46967L17.0303 8.53033ZM9.03033 11.4697C8.73744 11.1768 8.26256 11.1768 7.96967 11.4697C7.67678 11.7626 7.67678 12.2374 7.96967 12.5303L9.03033 11.4697ZM12.5 16L11.9697 16.5303C12.2626 16.8232 12.7374 16.8232 13.0303 16.5303L12.5 16ZM21.0303 8.53033C21.3232 8.23744 21.3232 7.76256 21.0303 7.46967C20.7374 7.17678 20.2626 7.17678 19.9697 7.46967L21.0303 8.53033ZM3.96967 12.5303L7.96967 16.5303L9.03033 15.4697L5.03033 11.4697L3.96967 12.5303ZM9.03033 16.5303L17.0303 8.53033L15.9697 7.46967L7.96967 15.4697L9.03033 16.5303ZM7.96967 12.5303L11.9697 16.5303L13.0303 15.4697L9.03033 11.4697L7.96967 12.5303ZM13.0303 16.5303L21.0303 8.53033L19.9697 7.46967L11.9697 15.4697L13.0303 16.5303Z" fill="currentColor"/></svg>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="snap-center shrink-0 w-[85%] sm:w-[350px] lg:w-auto relative mb-6 lg:mb-0 group ml-2 mt-0 lg:mt-6">
                <div class="bg-[#202C33] rounded-xl rounded-tl-[3px] p-3 px-4 shadow-[0_1px_0.5px_rgba(0,0,0,0.13)] relative">
                    <!-- Tail -->
                    <div class="absolute top-0 -left-[10px] w-0 h-0 border-t-[14px] border-t-[#202C33] border-l-[12px] border-l-transparent"></div>
                    
                    <div class="font-sans text-[14px] font-bold text-[#ebd68c] mb-1 flex items-baseline gap-1.5 flex-wrap">
                        Patricia V. 
                        <span class="text-[#8696a0] font-normal text-[12px]">49 años &middot; Interlomas</span>
                    </div>
                    
                    <p class="font-sans text-[15.5px] text-[#e9edef] leading-[1.3] text-left">
                        Estar frente a un equipo de personas todos los días y no sentir seguridad al hablar es desgastante. La inversión que hice aquí cambió la forma en la que entro a una sala de juntas.
                    </p>
                    
                    <div class="flex justify-end items-center gap-1 mt-1 -mb-1">
                        <span class="font-sans text-[11px] text-[#8696a0]">04:15 p. m.</span>
                        <svg viewBox="0 -0.5 25 25" fill="none" class="w-[18px] h-[18px] text-[#53bdeb]" xmlns="http://www.w3.org/2000/svg"><path d="M5.03033 11.4697C4.73744 11.1768 4.26256 11.1768 3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L5.03033 11.4697ZM8.5 16L7.96967 16.5303C8.26256 16.8232 8.73744 16.8232 9.03033 16.5303L8.5 16ZM17.0303 8.53033C17.3232 8.23744 17.3232 7.76256 17.0303 7.46967C16.7374 7.17678 16.2626 7.17678 15.9697 7.46967L17.0303 8.53033ZM9.03033 11.4697C8.73744 11.1768 8.26256 11.1768 7.96967 11.4697C7.67678 11.7626 7.67678 12.2374 7.96967 12.5303L9.03033 11.4697ZM12.5 16L11.9697 16.5303C12.2626 16.8232 12.7374 16.8232 13.0303 16.5303L12.5 16ZM21.0303 8.53033C21.3232 8.23744 21.3232 7.76256 21.0303 7.46967C20.7374 7.17678 20.2626 7.17678 19.9697 7.46967L21.0303 8.53033ZM3.96967 12.5303L7.96967 16.5303L9.03033 15.4697L5.03033 11.4697L3.96967 12.5303ZM9.03033 16.5303L17.0303 8.53033L15.9697 7.46967L7.96967 15.4697L9.03033 16.5303ZM7.96967 12.5303L11.9697 16.5303L13.0303 15.4697L9.03033 11.4697L7.96967 12.5303ZM13.0303 16.5303L21.0303 8.53033L19.9697 7.46967L11.9697 15.4697L13.0303 16.5303Z" fill="currentColor"/></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOQUE 5: El Proceso -->
<section class="py-20 lg:py-28 bg-zyrus-light">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-3xl md:text-5xl font-serif text-zyrus-dark mb-6">
                Tu transformación, paso a paso.
            </h2>
            <p class="font-sans font-light text-lg text-gray-700">
                Sin sorpresas. Sin presión. A tu ritmo.
            </p>
        </div>
        
        <div class="relative max-w-6xl mx-auto">
            <!-- Timeline line desktop -->
            <div class="hidden md:block absolute top-[11px] left-[12.5%] right-[12.5%] h-[2px] bg-zyrus-accent/40 z-0"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-y-12 gap-x-6 relative z-10">
                <!-- Paso 1 -->
                <div class="relative flex flex-row md:flex-col items-start md:items-center text-left md:text-center group">
                    <div class="flex-shrink-0 relative w-6 h-6 rounded-full bg-zyrus-light border-4 border-zyrus-accent flex items-center justify-center mr-6 md:mr-0 md:mb-8 shadow-[0_0_15px_rgba(201,169,110,0.5)] z-10 transition-transform group-hover:scale-110"></div>
                    <!-- Mobile Line -->
                    <div class="md:hidden absolute top-6 bottom-[-3rem] left-[11px] w-[2px] bg-zyrus-accent/40 z-0"></div>
                    <div>
                        <h4 class="font-sans font-bold text-[14px] text-zyrus-dark uppercase tracking-widest mb-3">Diagnóstico de Identidad</h4>
                        <span class="font-sans font-medium text-[12px] text-zyrus-primary block mb-4 bg-zyrus-primary/5 inline-block px-3 py-1 rounded-full">(45 min)</span>
                        <p class="font-sans font-light text-[14px] text-gray-700 leading-relaxed max-w-[220px] md:mx-auto">Escucha, estilo de vida, diseño del punto de partida.</p>
                    </div>
                </div>
                <!-- Paso 2 -->
                <div class="relative flex flex-row md:flex-col items-start md:items-center text-left md:text-center group">
                    <div class="flex-shrink-0 relative w-6 h-6 rounded-full bg-zyrus-light border-4 border-zyrus-accent flex items-center justify-center mr-6 md:mr-0 md:mb-8 shadow-[0_0_15px_rgba(201,169,110,0.5)] z-10 transition-transform group-hover:scale-110"></div>
                    <!-- Mobile Line -->
                    <div class="md:hidden absolute top-6 bottom-[-3rem] left-[11px] w-[2px] bg-zyrus-accent/40 z-0"></div>
                    <div>
                        <h4 class="font-sans font-bold text-[14px] text-zyrus-dark uppercase tracking-widest mb-3">Tu Sonrisa en Digital</h4>
                        <span class="font-sans font-medium text-[12px] text-zyrus-primary block mb-4 bg-zyrus-primary/5 inline-block px-3 py-1 rounded-full">(48 hrs después)</span>
                        <p class="font-sans font-light text-[14px] text-gray-700 leading-relaxed max-w-[220px] md:mx-auto">Ves el resultado exacto antes de iniciar. Tú apruebas.</p>
                    </div>
                </div>
                <!-- Paso 3 -->
                <div class="relative flex flex-row md:flex-col items-start md:items-center text-left md:text-center group">
                    <div class="flex-shrink-0 relative w-6 h-6 rounded-full bg-zyrus-light border-4 border-zyrus-accent flex items-center justify-center mr-6 md:mr-0 md:mb-8 shadow-[0_0_15px_rgba(201,169,110,0.5)] z-10 transition-transform group-hover:scale-110"></div>
                    <!-- Mobile Line -->
                    <div class="md:hidden absolute top-6 bottom-[-3rem] left-[11px] w-[2px] bg-zyrus-accent/40 z-0"></div>
                    <div>
                        <h4 class="font-sans font-bold text-[14px] text-zyrus-dark uppercase tracking-widest mb-3">Aplicación</h4>
                        <span class="font-sans font-medium text-[12px] text-zyrus-primary block mb-4 bg-zyrus-primary/5 inline-block px-3 py-1 rounded-full">(1-2 sesiones)</span>
                        <p class="font-sans font-light text-[14px] text-gray-700 leading-relaxed max-w-[220px] md:mx-auto">Mínimamente invasivo. Mayoría retoma su agenda el mismo día.</p>
                    </div>
                </div>
                <!-- Paso 4 -->
                <div class="relative flex flex-row md:flex-col items-start md:items-center text-left md:text-center group">
                    <div class="flex-shrink-0 relative w-6 h-6 rounded-full bg-zyrus-accent border-4 border-zyrus-accent flex items-center justify-center mr-6 md:mr-0 md:mb-8 shadow-[0_0_20px_rgba(201,169,110,0.8)] z-10 transition-transform group-hover:scale-110"></div>
                    <div>
                        <h4 class="font-sans font-bold text-[14px] text-zyrus-dark uppercase tracking-widest mb-3">Tu Nueva Presencia</h4>
                        <span class="font-sans font-medium text-[12px] text-zyrus-primary block mb-4 bg-zyrus-primary/5 inline-block px-3 py-1 rounded-full">(Inmediato)</span>
                        <p class="font-sans font-light text-[14px] text-gray-700 leading-relaxed max-w-[220px] md:mx-auto">Sales siendo exactamente tú, en tu versión más libre y poderosa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOQUE 6: Reencuadre de Inversión -->
<section class="py-24 lg:py-32 bg-zyrus-dark text-center">
    <div class="max-w-4xl mx-auto px-6 md:px-12 lg:px-16">
        <p class="font-serif text-2xl md:text-4xl text-zyrus-light leading-relaxed mb-12">
            "Una sonrisa diseñada en Zyrus no es un gasto estético. Es la inversión que transforma cada primera impresión, cada fotografía, cada reunión, cada momento en que alguien te ve por primera vez."
        </p>
        <p class="font-sans font-medium text-[15px] text-zyrus-accent tracking-wide uppercase">
            Las personas que han pasado por Zyrus no preguntan si valió la pena. Se preguntan por qué esperaron tanto.
        </p>
    </div>
</section>

<!-- BLOQUE 7: Formulario de Captación -->
<section id="diagnostico" class="py-20 lg:py-32 relative bg-cover bg-center" style="background-image: url('https://zyrussmile.center/wp-content/uploads/2026/03/textured-wall-background-texture-scaled.jpg');">
    <!-- Texture overlay for readability -->
    <div class="absolute inset-0 bg-zyrus-light/85 backdrop-blur-[2px]"></div>
    
    <div class="max-w-3xl mx-auto px-6 relative z-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-[42px] font-serif text-zyrus-dark mb-4 leading-tight">
                Agenda tu Diagnóstico de Identidad Zyrus
            </h2>
            <p class="font-sans font-light text-[16px] text-zyrus-primary">
                Cupos limitados por semana — atención completamente personalizada
            </p>
        </div>
        
        <div class="bg-white p-8 md:p-12 shadow-[0_10px_40px_rgba(0,0,0,0.05)] border-t-[3px] border-zyrus-accent" style="border-radius: 8px;">
            <form id="zyrus-contact-form" class="space-y-6">
                <!-- Anti-spam & UTMs -->
                <input type="text" name="fx_website" tabindex="-1" autocomplete="off" aria-hidden="true" class="hidden">
                <input type="hidden" name="utm_source" id="utm_source" value="">
                <input type="hidden" name="utm_campaign" id="utm_campaign" value="">
                <input type="hidden" name="page_url" value="<?php echo esc_url('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>">
                <input type="hidden" name="nonce" id="zyrus_contact_nonce" value="<?php echo wp_create_nonce('zyrus_ajax_contact_form'); ?>">
                
                <div id="zyrus-form-error" class="hidden bg-red-50 text-red-600 p-4 rounded-sm text-[13px] border border-red-100"></div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block font-sans text-[13px] font-semibold text-zyrus-dark mb-2">Tu nombre</label>
                        <input type="text" id="fx_name" name="fx_name" required placeholder="¿Cómo te llamas?" class="w-full px-4 py-3 bg-white border border-gray-200 focus:outline-none focus:border-zyrus-primary font-sans font-light text-[15px] text-zyrus-dark placeholder-gray-400 transition-colors">
                    </div>
                    
                    <div>
                        <label class="block font-sans text-[13px] font-semibold text-zyrus-dark mb-2">Tu WhatsApp</label>
                        <input type="tel" id="fx_phone" name="fx_phone" required placeholder="Ej. 55 1234 5678" pattern="[0-9\-\+\s\(\)]*" class="w-full px-4 py-3 bg-white border border-gray-200 focus:outline-none focus:border-zyrus-primary font-sans font-light text-[15px] text-zyrus-dark placeholder-gray-400 transition-colors">
                        <p class="font-sans font-light text-[12px] text-gray-500 mt-1">Solo te contactamos por WhatsApp</p>
                    </div>
                    
                    <div class="hidden">
                        <input type="email" id="fx_email" name="fx_email" value="lead@zyrus.com">
                    </div>
                    
                    <div>
                        <label class="block font-sans text-[13px] font-semibold text-zyrus-dark mb-2">¿Cuándo te gustaría iniciar?</label>
                        <div class="relative">
                            <select id="fx_timing" name="fx_timing" required class="w-full px-4 py-3 bg-white border border-gray-200 focus:outline-none focus:border-zyrus-primary font-sans font-light text-[15px] text-zyrus-dark appearance-none transition-colors">
                                <option value="">Selecciona una opción</option>
                                <option value="Lo antes posible">Lo antes posible</option>
                                <option value="En el próximo mes">En el próximo mes</option>
                                <option value="En 2 o 3 meses">En 2 o 3 meses</option>
                                <option value="Solo estoy explorando por ahora">Solo estoy explorando por ahora</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" id="zyrus-form-submit-btn" class="w-full h-[48px] bg-zyrus-accent hover:bg-[#DBC18D] text-zyrus-dark font-sans font-semibold tracking-wider text-[13px] uppercase transition-colors flex justify-center items-center mt-4 border-none border">
                    QUIERO MI DIAGNOSTICO
                </button>
                
                <div class="text-center mt-6 space-y-1">

                    <p class="font-sans font-light text-[12px] text-gray-400">&middot; Tu información es completamente confidencial</p>
                    <p class="font-sans font-light text-[12px] text-gray-400">&middot; Te contactamos en menos de 2 horas en horario hábil</p>
                    <p class="font-sans font-light text-[12px] text-gray-400">&middot; Sin compromiso — solo una conversación</p>
                </div>
            </form>
            
            <div id="zyrus-form-success" class="hidden text-center py-8">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h3 class="font-serif text-2xl text-zyrus-dark mb-2">Tu diagnóstico está reservado</h3>
                <p class="font-sans font-light text-[15px] text-gray-700">Te contactaremos por WhatsApp en menos de 2 horas para confirmar tu espacio.</p>
            </div>
        </div>
    </div>
</section>

<!-- BLOQUE 8: Ubicación y Mapa -->
<section class="relative w-full h-[450px] md:h-[550px] border-t border-white/5">
    <iframe 
        src="https://maps.google.com/maps?q=Zyrus%20Smile%20Studio,%20Perif.%20Blvd.%20Manuel%20%C3%81vila%20Camacho%20166.%20803,%20Lomas%20de%20Chapultepec,%20Miguel%20Hidalgo,%2011000%20CDMX&t=&z=16&ie=UTF8&iwloc=&output=embed" 
        class="absolute inset-0 w-full h-full border-0" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        title="Ubicación de Zyrus Smile Studio"
        aria-label="Mapa interactivo de ubicación">
    </iframe>
</section>

<!-- BLOQUE 9: Cierre Emocional Final -->
<section class="py-24 lg:py-32 bg-zyrus-dark text-center">
    <div class="max-w-6xl xl:max-w-7xl mx-auto px-6">
        <h2 class="font-serif italic text-xl sm:text-2xl md:text-4xl lg:text-[44px] xl:text-[52px] text-zyrus-light mb-8 leading-tight whitespace-normal md:whitespace-nowrap">
            "Tu sonrisa es tu carta de presentación ante el mundo."
        </h2>
        <h3 class="font-serif text-2xl md:text-3xl text-zyrus-accent mb-8">
            Asegúrate de que diga exactamente lo que quieres decir.
        </h3>
        <p class="font-sans font-light text-[15px] text-zyrus-ice mb-12">
            Da el primer paso hoy.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
            <a href="#diagnostico" class="w-full sm:w-auto px-10 py-5 bg-zyrus-accent hover:bg-[#DBC18D] text-zyrus-dark font-sans font-semibold tracking-wider text-[14px] uppercase transition-colors">
                Agendar mi diagnóstico
            </a>
            <a href="https://wa.me/5215581076025?text=Hola%20Zyrus,%20me%20interesa%20agendar%20mi%20diagnóstico%20de%20sonrisa." target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-10 py-5 border border-white text-white hover:bg-white hover:text-zyrus-dark font-sans font-semibold tracking-wider text-[14px] uppercase transition-colors flex items-center justify-center gap-2">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="h-[18px] w-[18px] fill-current">
                    <path d="M19.05 4.94A9.94 9.94 0 0 0 12.02 2C6.5 2 2.02 6.47 2.02 11.99c0 1.77.46 3.5 1.34 5.02L2 22l5.12-1.34a9.96 9.96 0 0 0 4.9 1.26h.01c5.51 0 9.99-4.48 9.99-10 0-2.67-1.04-5.18-2.97-6.98ZM12.03 20.23h-.01a8.26 8.26 0 0 1-4.2-1.15l-.3-.18-3.04.8.81-2.96-.2-.31a8.25 8.25 0 0 1-1.27-4.44c0-4.56 3.7-8.27 8.25-8.27 2.2 0 4.27.86 5.82 2.42a8.2 8.2 0 0 1 2.42 5.85c0 4.56-3.7 8.26-8.27 8.26Zm4.53-6.18c-.25-.13-1.47-.72-1.7-.81-.23-.08-.4-.12-.57.13-.17.25-.65.81-.79.97-.15.17-.3.19-.55.06-.25-.13-1.06-.39-2.01-1.24-.74-.66-1.24-1.47-1.39-1.72-.15-.25-.02-.38.11-.51.11-.11.25-.3.38-.44.13-.15.17-.25.25-.42.08-.17.04-.32-.02-.45-.06-.13-.57-1.37-.78-1.87-.21-.5-.43-.43-.57-.44h-.49c-.17 0-.45.06-.68.32s-.89.87-.89 2.12.91 2.47 1.04 2.64c.13.17 1.78 2.72 4.31 3.81.6.26 1.08.42 1.45.54.61.2 1.17.17 1.61.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.09-.23-.15-.47-.28Z"/>
                </svg>
                Escribir por WhatsApp
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
