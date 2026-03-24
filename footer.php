<!-- FOOTER MINIMAL (Bloque 9) -->
<footer class="bg-zyrus-dark border-t border-white/10 py-12 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-16 relative z-10">
        
        <div class="flex flex-col md:flex-row flex-wrap justify-between items-center gap-6">
            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block opacity-80 hover:opacity-100 transition">
                <img src="https://zyrussmile.center/wp-content/uploads/2026/03/LOGO-NUEVO-ZYRUS_blanco-scaled-e1774318899491.png" alt="Zyrus" class="h-6 w-auto">
            </a>
            
            <div class="flex items-center gap-6 text-zyrus-light/60 text-sm">
                <!-- Instagram -->
                <a href="https://instagram.com/zyrussmilecenter" target="_blank" rel="noopener noreferrer" class="hover:text-white transition">
                    <i class="fa-brands fa-instagram text-xl"></i>
                </a>
                
                <!-- Privacy -->
                <a href="<?php echo esc_url( home_url( '/privacidad' ) ); ?>" class="hover:text-white transition font-light">
                    Aviso de Privacidad
                </a>
                
                <!-- Copyright -->
                <span class="font-light">
                    &copy; <?php echo date('Y'); ?> Zyrus
                </span>
            </div>
        </div>
        
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
