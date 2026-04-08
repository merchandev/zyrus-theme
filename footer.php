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
                    <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5 fill-current">
                        <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.88 1.13a1.12 1.12 0 1 1 0 2.24 1.12 1.12 0 0 1 0-2.24ZM12 6.5A5.5 5.5 0 1 1 6.5 12 5.5 5.5 0 0 1 12 6.5Zm0 1.5A4 4 0 1 0 16 12a4 4 0 0 0-4-4Z"/>
                    </svg>
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
