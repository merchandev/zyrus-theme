<?php
/**
 * Zyrus Smile Center functions and definitions
 */

if ( ! function_exists( 'zyrus_setup' ) ) :
	function zyrus_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
endif;
add_action( 'after_setup_theme', 'zyrus_setup' );

function zyrus_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$compiled_style_path = get_template_directory() . '/assets/css/theme.css';
	$has_compiled_style = file_exists( $compiled_style_path );
	$style_version = $has_compiled_style
		? (string) filemtime( $compiled_style_path )
		: $theme_version;
	$script_version = file_exists( get_template_directory() . '/assets/js/main.js' )
		? (string) filemtime( get_template_directory() . '/assets/js/main.js' )
		: $theme_version;

	if ( $has_compiled_style ) {
		wp_enqueue_style(
			'zyrus-theme',
			get_template_directory_uri() . '/assets/css/theme.css',
			array(),
			$style_version
		);
	} else {
		wp_enqueue_style( 'zyrus-style', get_stylesheet_uri(), array(), $theme_version );
	}

    wp_enqueue_script( 'zyrus-main', get_template_directory_uri() . '/assets/js/main.js', array(), $script_version, true );
    wp_localize_script( 'zyrus-main', 'zyrusTheme', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'whatsappTrackNonce' => wp_create_nonce( 'zyrus_track_whatsapp_click' ),
        'contactFormNonce' => wp_create_nonce( 'zyrus_ajax_contact_form' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'zyrus_scripts' );

function zyrus_preload_front_page_assets() {
	if ( ! is_front_page() ) {
		return;
	}

	$hero_poster_path = get_template_directory() . '/assets/image/HERO1.webp';

	if ( file_exists( $hero_poster_path ) ) {
		printf(
			'<link rel="preload" as="image" href="%s" fetchpriority="high">' . "\n",
			esc_url( get_template_directory_uri() . '/assets/image/HERO1.webp' )
		);
	}
}
add_action( 'wp_head', 'zyrus_preload_front_page_assets', 1 );

/**
 * Register Custom Post Type: Videos Verticales
 */
function zyrus_register_video_cpt() {
    $labels = array(
        'name'                  => _x( 'Videos', 'Post Type General Name', 'zyrus' ),
        'singular_name'         => _x( 'Video Vertical', 'Post Type Singular Name', 'zyrus' ),
        'menu_name'             => __( 'Videos Verticales', 'zyrus' ),
        'name_admin_bar'        => __( 'Video Vertical', 'zyrus' ),
        'add_new_item'          => __( 'Añadir Nuevo Video', 'zyrus' ),
        'edit_item'             => __( 'Editar Video', 'zyrus' ),
    );
    $args = array(
        'label'                 => __( 'Video Vertical', 'zyrus' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-smartphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'zyrus_video', $args );
}
add_action( 'init', 'zyrus_register_video_cpt', 0 );

/**
 * Add Meta Box for Video URL
 */
function zyrus_add_video_metabox() {
    add_meta_box(
        'zyrus_video_url_box',
        'URL del Video (TikTok, Reels, Shorts, o MP4 directo)',
        'zyrus_video_metabox_callback',
        'zyrus_video',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'zyrus_add_video_metabox' );

function zyrus_video_metabox_callback( $post ) {
    wp_nonce_field( 'zyrus_save_video_data', 'zyrus_video_meta_nonce' );
    $value = get_post_meta( $post->ID, '_zyrus_video_url', true );
    echo '<label for="zyrus_video_url">Enlace del video:</label>';
    echo '<input type="url" id="zyrus_video_url" name="zyrus_video_url" value="' . esc_attr( $value ) . '" size="25" style="width:100%; padding: 8px; margin-top: 5px;" placeholder="Ej: https://www.tiktok.com/@usuario/video/123456789" />';
    echo '<p style="color:#666; font-size: 13px; margin-top: 8px;">Pega aquí el enlace de YouTube Shorts, TikTok o Instagram Reels. O también el enlace directo a un archivo .mp4.</p>';
}

function zyrus_save_video_meta( $post_id ) {
    if ( ! isset( $_POST['zyrus_video_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['zyrus_video_meta_nonce'], 'zyrus_save_video_data' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['zyrus_video_url'] ) ) {
        update_post_meta( $post_id, '_zyrus_video_url', sanitize_url( $_POST['zyrus_video_url'] ) );
    }
}
add_action( 'save_post', 'zyrus_save_video_meta' );

/**
 * Auto-create default pages in WP Admin if they don't exist
 */
function zyrus_auto_create_pages_init() {
    $pages = [
        'Inicio' => 'Página Principal de Zyrus',
        'Términos Legales' => "
<p><strong>1. Aceptación de los Términos</strong><br>
Al acceder a nuestro sitio web y/o utilizar los servicios de Zyrus Smile Center Studio, usted acepta estar sujeto a los presentes Términos y Condiciones, así como a las leyes y regulaciones aplicables en los Estados Unidos Mexicanos, las directrices de la Procuraduría Federal del Consumidor (PROFECO) y la Comisión Federal para la Protección contra Riesgos Sanitarios (COFEPRIS).</p>
<p><strong>Aviso de Publicidad COFEPRIS: 233300201A2501</strong></p>

<h3>2. Descripción del Servicio</h3>
<p>Zyrus Smile Center Studio ofrece servicios especializados en salud y estética dental, con un enfoque multidisciplinario (Diseño de sonrisa, Carillas de porcelana, Ortodoncia invisible, Blanqueamiento dental, Implantes, Endodoncia, entre otros). La información proporcionada en el sitio web es de carácter informativo y publicitario, y no sustituye en ningún caso una valoración, diagnóstico o tratamiento odontológico presencial y personalizado.</p>

<h3>3. Citas y Cancelaciones</h3>
<p><strong>Programación:</strong> Las citas pueden agendarse a través de los formularios en nuestro sitio web, por teléfono o vía WhatsApp.</p>
<p><strong>Tolerancia y Puntualidad:</strong> Solicitamos a nuestros pacientes puntualidad. Se otorgará un tiempo de tolerancia determinado por la clínica. Pasado este tiempo, nos reservamos el derecho de reprogramar la cita para no afectar la atención de otros pacientes.</p>
<p><strong>Cancelaciones:</strong> Si necesita cancelar o reprogramar, solicitamos amablemente que lo haga con anticipación para poder reasignar el espacio.</p>

<h3>4. Tarifas, Planes de Pago y Facturación</h3>
<p>Todos los precios y cotizaciones están sujetos a una valoración clínica inicial. El presupuesto definitivo y el plan de tratamiento se entregan únicamente tras el diagnóstico personalizado.</p>
<p><strong>Financiamiento:</strong> Contamos con modelos de pago flexibles y mensualidades. La aprobación de dichos planes está sujeta a los términos y condiciones de las instituciones financieras y plataformas de pago aliadas, independientes a la clínica.</p>
<p>Si requiere factura (CFDI), deberá solicitarla en el mismo mes en el que se realizó el pago de su tratamiento, enviando su Constancia de Situación Fiscal actualizada y datos correspondientes a info@zyrusdental.com.</p>

<h3>5. Responsabilidad Médica y Resultados</h3>
<p>En Zyrus Smile Center Studio aplicamos ciencia, arte y arquitectura facial. Nuestros especialistas se comprometen a utilizar su mayor esfuerzo, tecnología de vanguardia y materiales de alta calidad. Sin embargo, los resultados de los tratamientos dentales pueden variar en cada paciente dependiendo de factores biológicos, anatómicos, hábitos de higiene y el estado de salud general.</p>

<h3>6. Propiedad Intelectual</h3>
<p>Todo el contenido de este sitio web (textos, logotipos, casos de éxito, fotografías de antes/después, diseño) es propiedad exclusiva de Zyrus Smile Center Studio y está protegido por las leyes de propiedad intelectual mexicanas. Queda estrictamente prohibida su descarga, reproducción o distribución sin autorización expresa.</p>

<h3>7. Jurisdicción</h3>
<p>Para la interpretación, cumplimiento y ejecución de los presentes Términos y Condiciones, las partes se someten a la jurisdicción y competencia de los tribunales de la Ciudad de México (CDMX), renunciando expresamente a cualquier otro fuero que pudiera corresponderles en razón de sus domicilios presentes o futuros.</p>
        ",
        'Privacidad' => "
<p>En cumplimiento con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP), su Reglamento y los Lineamientos del Aviso de Privacidad, ponemos a su disposición el presente documento.</p>

<h3>1. Identidad y Domicilio del Responsable</h3>
<p>Zyrus Smile Center Studio (en adelante, \"La Clínica\"), con domicilio en Blvd. Manuel Ávila Camacho 138, Piso 7, CDMX, es el responsable del tratamiento y protección de sus datos personales.</p>

<h3>2. Datos Personales Recabados</h3>
<p>Para llevar a cabo las finalidades descritas en el presente aviso, recabaremos los siguientes datos:</p>
<ul>
    <li><strong>Datos de identificación y contacto:</strong> Nombre completo, edad, fecha de nacimiento, domicilio, teléfono y correo electrónico.</li>
    <li><strong>Datos de facturación:</strong> RFC, Régimen Fiscal, Uso de CFDI y domicilio fiscal.</li>
    <li><strong>Datos Sensibles (Salud):</strong> Historial clínico odontológico y médico general, alergias, enfermedades preexistentes, tipo de sangre, radiografías, fotografías clínicas, escaneos intraorales y tratamientos previos. Estos datos son estrictamente necesarios para brindarle una atención dental segura, diseñar su sonrisa y llevar a cabo tratamientos especializados.</li>
</ul>

<h3>3. Finalidades del Tratamiento de Datos</h3>
<p>Sus datos personales serán utilizados para las siguientes finalidades principales:</p>
<ul>
    <li>Apertura y actualización de su expediente clínico odontológico.</li>
    <li>Diagnóstico, prevención y diseño de tratamientos dentales (incluyendo carillas, ortodoncia invisible, implantes, etc.).</li>
    <li>Programación, confirmación y recordatorio de citas.</li>
    <li>Facturación, cobro de servicios y gestión de planes de financiamiento o mensualidades.</li>
    <li>Cumplimiento de las Normas Oficiales Mexicanas en materia de salud (ej. NOM-004-SSA3-2012 del expediente clínico) y regulaciones de COFEPRIS.</li>
</ul>

<h3>4. Derechos ARCO (Acceso, Rectificación, Cancelación y Oposición)</h3>
<p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición).</p>
<p>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva enviando un correo electrónico a info@zyrusdental.com o acudiendo físicamente a nuestras instalaciones en la Clínica Boutique Polanco.</p>

<h3>5. Transferencia de Datos</h3>
<p>Le informamos que sus datos personales de salud no serán transferidos a terceros sin su consentimiento expreso, salvo las excepciones previstas en el artículo 37 de la LFPDPPP (por ejemplo, requerimientos de autoridades sanitarias o de procuración de justicia).</p>

<h3>6. Cambios al Aviso de Privacidad</h3>
<p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales, de nuestras propias necesidades por los servicios que ofrecemos, o por nuestras prácticas de privacidad. Nos comprometemos a mantenerlo informado sobre los cambios a través de nuestro sitio web.</p>
        "
    ];
    
    foreach ($pages as $title => $content) {
        $page_check = get_page_by_title($title);
        
        // Force update existing terms and privacy to apply proper formats
        if(isset($page_check->ID)){
            if ($title != 'Inicio') {
                wp_update_post(array(
                    'ID' => $page_check->ID,
                    'post_content' => $content
                ));
            }
        } else {
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish',
                'post_author' => 1,
            );
            $new_page_id = wp_insert_post($new_page);
            
            // Set 'Inicio' as the static front page
            if ( $title == 'Inicio' ) {
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $new_page_id );
            }
        }
    }
}
add_action( 'admin_init', 'zyrus_auto_create_pages_init' );

/**
 * Register Leads Custom Post Types
 */
function zyrus_register_cpts() {
    register_post_type( 'zyrus_lead', array(
        'labels' => array(
            'name' => 'Leads Web',
            'singular_name' => 'Lead',
            'menu_name' => 'Leads Web',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-email-alt',
        'capability_type' => 'post',
    ));

    register_post_type( 'zyrus_wa_lead', array(
        'labels' => array(
            'name' => 'Leads WhatsApp',
            'singular_name' => 'Lead WA',
            'menu_name' => 'Leads WhatsApp',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=zyrus_lead',
        'supports' => array('title'),
        'capability_type' => 'post',
    ));
}
add_action( 'init', 'zyrus_register_cpts' );

/**
 * Admin Columns and Metaboxes for Leads
 */
function zyrus_web_lead_columns($columns) {
    return array(
        'cb' => $columns['cb'] ?? '<input type="checkbox" />',
        'title' => 'Lead',
        'email' => 'Email',
        'phone' => 'Teléfono',
        'message' => 'Necesidad',
        'date' => $columns['date'] ?? 'Fecha',
    );
}
add_filter('manage_zyrus_lead_posts_columns', 'zyrus_web_lead_columns');

function zyrus_web_lead_custom_column($column, $post_id) {
    switch ($column) {
        case 'email': echo esc_html(get_post_meta($post_id, '_lead_email', true)); break;
        case 'phone': echo esc_html(get_post_meta($post_id, '_lead_phone', true)); break;
        case 'message': echo esc_html(get_post_meta($post_id, '_lead_message', true)); break;
    }
}
add_action('manage_zyrus_lead_posts_custom_column', 'zyrus_web_lead_custom_column', 10, 2);

function zyrus_wa_lead_columns($columns) {
    return array(
        'cb' => $columns['cb'] ?? '<input type="checkbox" />',
        'title' => 'Registro',
        'source' => 'Origen',
        'target' => 'Destino',
        'date' => $columns['date'] ?? 'Fecha',
    );
}
add_filter('manage_zyrus_wa_lead_posts_columns', 'zyrus_wa_lead_columns');

function zyrus_wa_lead_custom_column($column, $post_id) {
    switch ($column) {
        case 'source': echo esc_html(get_post_meta($post_id, '_whatsapp_source', true)); break;
        case 'target': echo esc_html(get_post_meta($post_id, '_whatsapp_target_url', true)); break;
    }
}
add_action('manage_zyrus_wa_lead_posts_custom_column', 'zyrus_wa_lead_custom_column', 10, 2);

function zyrus_register_lead_metaboxes() {
    add_meta_box('zyrus-lead-detail', 'Información del lead web', 'zyrus_render_web_lead_metabox', 'zyrus_lead', 'normal', 'high');
    add_meta_box('zyrus-wa-lead-detail', 'Información del lead WhatsApp', 'zyrus_render_wa_lead_metabox', 'zyrus_wa_lead', 'normal', 'high');
}
add_action('add_meta_boxes', 'zyrus_register_lead_metaboxes');

function zyrus_render_web_lead_metabox($post) {
    $values = array(
        'Nombre' => get_post_meta($post->ID, '_lead_name', true),
        'Email' => get_post_meta($post->ID, '_lead_email', true),
        'Teléfono' => get_post_meta($post->ID, '_lead_phone', true),
        'Mensaje' => get_post_meta($post->ID, '_lead_message', true),
        'Página URL' => get_post_meta($post->ID, '_lead_page_url', true),
    );
    echo '<table class="widefat striped" style="margin-top:8px;"><tbody>';
    foreach ($values as $label => $value) {
        echo '<tr><th style="width:180px;">' . esc_html($label) . '</th><td><pre style="white-space:pre-wrap;margin:0;">' . esc_html((string)$value) . '</pre></td></tr>';
    }
    echo '</tbody></table>';
}

function zyrus_render_wa_lead_metabox($post) {
    $values = array(
        'Origen' => get_post_meta($post->ID, '_whatsapp_source', true),
        'Destino' => get_post_meta($post->ID, '_whatsapp_target_url', true),
        'Página' => get_post_meta($post->ID, '_whatsapp_page_url', true),
        'IP' => get_post_meta($post->ID, '_whatsapp_ip', true),
        'User Agent' => get_post_meta($post->ID, '_whatsapp_user_agent', true),
    );
    echo '<table class="widefat striped" style="margin-top:8px;"><tbody>';
    foreach ($values as $label => $value) {
        echo '<tr><th style="width:180px;">' . esc_html($label) . '</th><td><pre style="white-space:pre-wrap;margin:0;">' . esc_html((string)$value) . '</pre></td></tr>';
    }
    echo '</tbody></table>';
}

/**
 * AJAX Handlers
 */
function zyrus_ajax_contact_form() {
    $nonce_valid = isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'zyrus_ajax_contact_form');
    if (!$nonce_valid) {
        wp_send_json_error(array('message' => 'Nonce inválido.'), 403);
    }

    $name = sanitize_text_field(wp_unslash($_POST['fx_name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['fx_email'] ?? ''));
    $phone = sanitize_text_field(wp_unslash($_POST['fx_phone'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['fx_message'] ?? ''));
    $honeypot = sanitize_text_field(wp_unslash($_POST['fx_website'] ?? ''));
    $page_url = sanitize_text_field(wp_unslash($_POST['page_url'] ?? ''));

    $timing = sanitize_text_field(wp_unslash($_POST['fx_timing'] ?? ''));
    $utm_source = sanitize_text_field(wp_unslash($_POST['utm_source'] ?? ''));
    $utm_campaign = sanitize_text_field(wp_unslash($_POST['utm_campaign'] ?? ''));

    if (!empty($honeypot) || empty($name) || !is_email($email)) {
        wp_send_json_error(array('message' => 'Completa nombre y email válidos para enviar la solicitud.'), 400);
    }

    $post_id = wp_insert_post(array(
        'post_title' => sprintf('Lead: %s', $name),
        'post_status' => 'publish',
        'post_type' => 'zyrus_lead',
    ));

    if (!is_wp_error($post_id) && $post_id) {
        update_post_meta($post_id, '_lead_name', $name);
        update_post_meta($post_id, '_lead_email', $email);
        update_post_meta($post_id, '_lead_phone', $phone);
        update_post_meta($post_id, '_lead_message', $message);
        update_post_meta($post_id, '_lead_page_url', $page_url);
        update_post_meta($post_id, '_lead_timing', $timing);
    }

    // Email to admin
    $admin_email = get_option('admin_email');
    $mail_subject = sprintf('Nueva solicitud Zyrus Web: %s', $name);
    $mail_body = implode("\n", array(
        'Nombre: ' . $name,
        'Email: ' . $email,
        'Teléfono: ' . $phone,
        '',
        'Necesidad:',
        $message,
    ));
    wp_mail($admin_email, $mail_subject, $mail_body);

    zyrus_write_unified_csv_file();

    $row = array(
        'fecha_hora' => current_time('mysql'),
        'tipo' => 'Web Lead',
        'nombre' => $name,
        'correo' => $email,
        'telefono' => $phone,
        'mensaje' => $message,
        'timing' => $timing,
        'origen_visita' => zyrus_classify_activity_channel('formulario_contacto', '', $page_url, ''),
        'fuente' => $utm_source,
        'campana' => $utm_campaign,
        'url_origen' => $page_url,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? ''
    );
    zyrus_send_to_webhook($row);

    wp_send_json_success(array('message' => 'Solicitud enviada correctamente.'));
}
add_action('wp_ajax_zyrus_ajax_contact_form', 'zyrus_ajax_contact_form');
add_action('wp_ajax_nopriv_zyrus_ajax_contact_form', 'zyrus_ajax_contact_form');

function zyrus_track_whatsapp_click() {
    $nonce_valid = isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'zyrus_track_whatsapp_click');
    if (!$nonce_valid) {
        wp_send_json_error(array('message' => 'Nonce invalido.'), 403);
    }

    $source = sanitize_text_field(wp_unslash($_POST['source'] ?? 'boton_whatsapp'));
    $target_url = sanitize_text_field(wp_unslash($_POST['target_url'] ?? ''));
    $page_url = sanitize_text_field(wp_unslash($_POST['page_url'] ?? ''));

    $post_id = wp_insert_post(array(
        'post_title' => sprintf('Click WhatsApp: %s', $source),
        'post_status' => 'publish',
        'post_type' => 'zyrus_wa_lead',
    ));

    if (!is_wp_error($post_id) && $post_id) {
        update_post_meta($post_id, '_whatsapp_source', $source);
        update_post_meta($post_id, '_whatsapp_target_url', $target_url);
        update_post_meta($post_id, '_whatsapp_page_url', $page_url);
        update_post_meta($post_id, '_whatsapp_ip', sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? '')));
        update_post_meta($post_id, '_whatsapp_user_agent', sanitize_text_field(wp_unslash($_SERVER['HTTP_USER_AGENT'] ?? '')));
    }

    zyrus_write_unified_csv_file();

    $row = array(
        'fecha_hora' => current_time('mysql'),
        'tipo' => 'WhatsApp Lead',
        'nombre' => '',
        'correo' => '',
        'telefono' => '',
        'mensaje' => "Clic hacia: " . $target_url,
        'origen_visita' => zyrus_classify_activity_channel($source, '', $page_url, $target_url),
        'url_origen' => $page_url,
        'ip' => sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'] ?? ''))
    );
    zyrus_send_to_webhook($row);

    wp_send_json_success(array('saved' => true));
}
add_action('wp_ajax_zyrus_track_whatsapp_click', 'zyrus_track_whatsapp_click');
add_action('wp_ajax_nopriv_zyrus_track_whatsapp_click', 'zyrus_track_whatsapp_click');

function zyrus_send_to_webhook($data_row) {
    $webhook_url = get_option('zyrus_google_script_url', '');
    if (empty($webhook_url)) return;
    
    // Google Apps Script usually expects JSON payloads (e.postData.contents)
    // and requires following 302 redirects, so blocking MUST be true for the request to finish.
    wp_remote_post($webhook_url, array(
        'method'      => 'POST',
        'timeout'     => 15,
        'redirection' => 5,
        'httpversion' => '1.1',
        'blocking'    => true,
        'headers'     => array(
            'Content-Type' => 'application/json'
        ),
        'body'        => wp_json_encode($data_row),
        'cookies'     => array()
    ));
}

/**
 * CSV Export & Tracking
 */
function zyrus_get_csv_storage_path() {
	$secure_base_dir = trailingslashit(dirname(untrailingslashit(ABSPATH))) . 'zyrus-secure-data';
	if (!file_exists($secure_base_dir)) {
		wp_mkdir_p($secure_base_dir);
	}
	if (!is_dir($secure_base_dir) || !is_writable($secure_base_dir)) {
		$secure_base_dir = trailingslashit(WP_CONTENT_DIR) . 'zyrus-secure-data';
		if (!file_exists($secure_base_dir)) {
			wp_mkdir_p($secure_base_dir);
		}
		$deny_file = trailingslashit($secure_base_dir) . '.htaccess';
		if (!file_exists($deny_file)) {
			@file_put_contents($deny_file, "Deny from all\n");
		}
		$index_file = trailingslashit($secure_base_dir) . 'index.php';
		if (!file_exists($index_file)) {
			@file_put_contents($index_file, "<?php\nhttp_response_code(404);\nexit;\n");
		}
	}
	return trailingslashit($secure_base_dir) . 'registros_completos.csv';
}

function zyrus_get_legacy_csv_path() {
	return trailingslashit(get_template_directory()) . 'registros_completos.csv';
}

function zyrus_migrate_legacy_csv_file() {
	$legacy_path = zyrus_get_legacy_csv_path();
	$secure_path = zyrus_get_csv_storage_path();
	if (!file_exists($secure_path) && file_exists($legacy_path)) {
		@copy($legacy_path, $secure_path);
	}
}
add_action('init', 'zyrus_migrate_legacy_csv_file', 25);

function zyrus_get_activity_csv_headers() {
	return array('fecha_hora', 'tipo', 'nombre', 'correo', 'telefono', 'mensaje', 'origen_visita', 'url_origen', 'ip');
}

function zyrus_extract_url_host($url) {
	$host = wp_parse_url((string)$url, PHP_URL_HOST);
	if (!is_string($host) || '' === $host) { return ''; }
	$host = strtolower($host);
	if (0 === strpos($host, 'www.')) { $host = substr($host, 4); }
	return $host;
}

function zyrus_url_has_campaign_params($url) {
	$query = wp_parse_url((string)$url, PHP_URL_QUERY);
	if (!is_string($query) || '' === $query) { return false; }
	parse_str($query, $params);
	if (!is_array($params) || empty($params)) { return false; }
	$campaign_keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'ttclid', 'msclkid');
	foreach ($campaign_keys as $key) {
		if (!empty($params[$key])) { return true; }
	}
	return false;
}

function zyrus_classify_activity_channel($source = '', $referrer = '', $page_url = '', $target_url = '') {
	$source_norm = strtolower(remove_accents((string)$source));
	if (zyrus_url_has_campaign_params($referrer) || zyrus_url_has_campaign_params($page_url) || zyrus_url_has_campaign_params($target_url) || false !== strpos($source_norm, 'campaign') || false !== strpos($source_norm, 'campana') || false !== strpos($source_norm, 'ads')) {
		return 'Campana';
	}
	$social_hosts = array('facebook.com', 'instagram.com', 't.co', 'twitter.com', 'linkedin.com', 'tiktok.com', 'youtube.com', 'whatsapp.com', 'wa.me');
	$search_hosts = array('google.', 'bing.com', 'yahoo.', 'duckduckgo.com', 'yandex.', 'baidu.com');
	$ref_host = zyrus_extract_url_host($referrer);
	$page_host = zyrus_extract_url_host($page_url);
	foreach ($social_hosts as $host) {
		if ('' !== $ref_host && false !== strpos($ref_host, $host)) { return 'Redes sociales'; }
	}
	foreach ($search_hosts as $host) {
		if ('' !== $ref_host && false !== strpos($ref_host, $host)) { return 'Organico'; }
	}
	if ('' !== $ref_host) {
		if ('' !== $page_host && $ref_host === $page_host) { return 'Directo'; }
		return 'Referido';
	}
	return 'Directo';
}

function zyrus_collect_unified_records($limit = 0) {
	global $wpdb;
	$max_rows = (int)$limit;
	$max_rows = $max_rows > 0 ? $max_rows : 0;
	$rows = array();
	$post_args = array(
		'post_type' => array('zyrus_lead', 'zyrus_wa_lead'),
		'posts_per_page' => $max_rows > 0 ? $max_rows : -1,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
	);
	$posts = get_posts($post_args);
	foreach ($posts as $record) {
		$row = array(
			'fecha_hora' => get_the_date('Y-m-d H:i:s', $record->ID),
			'tipo' => 'Consulta',
			'nombre' => '',
			'correo' => '',
			'telefono' => '',
			'mensaje' => '',
			'origen_visita' => '',
			'url_origen' => '',
			'ip' => '',
			'_source' => '',
			'_referrer' => '',
			'_page_url' => '',
			'_target_url' => '',
			'_sort_ts' => (string)get_post_time('U', true, $record->ID),
		);
		if ('zyrus_lead' === $record->post_type) {
			$row['tipo'] = 'Web Lead';
			$row['nombre'] = (string)get_post_meta($record->ID, '_lead_name', true);
			$row['correo'] = (string)get_post_meta($record->ID, '_lead_email', true);
			$row['telefono'] = (string)get_post_meta($record->ID, '_lead_phone', true);
			$row['mensaje'] = (string)get_post_meta($record->ID, '_lead_message', true);
			$row['_page_url'] = (string)get_post_meta($record->ID, '_lead_page_url', true);
			$row['url_origen'] = $row['_page_url'];
			$row['_source'] = 'formulario_contacto';
		} elseif ('zyrus_wa_lead' === $record->post_type) {
			$row['tipo'] = 'WhatsApp Lead';
			$row['_source'] = (string)get_post_meta($record->ID, '_whatsapp_source', true);
			$row['_target_url'] = (string)get_post_meta($record->ID, '_whatsapp_target_url', true);
			$row['_page_url'] = (string)get_post_meta($record->ID, '_whatsapp_page_url', true);
			$row['ip'] = (string)get_post_meta($record->ID, '_whatsapp_ip', true);
			$row['url_origen'] = $row['_page_url'];
			$row['mensaje'] = "Clic hacia: " . $row['_target_url'];
		}
		$row['origen_visita'] = zyrus_classify_activity_channel($row['_source'], $row['_referrer'], $row['_page_url'], $row['_target_url']);
		$rows[] = $row;
	}
	usort($rows, static function ($a, $b) {
		$left = (int)($a['_sort_ts'] ?? 0);
		$right = (int)($b['_sort_ts'] ?? 0);
		return $right <=> $left;
	});
	if ($max_rows > 0 && count($rows) > $max_rows) {
		$rows = array_slice($rows, 0, $max_rows);
	}
	foreach ($rows as $index => $row) {
		unset($row['_sort_ts'], $row['_source'], $row['_referrer'], $row['_page_url'], $row['_target_url']);
		$rows[$index] = $row;
	}
	return $rows;
}

function zyrus_write_unified_csv_file() {
	$rows = zyrus_collect_unified_records(0);
	$filepath = zyrus_get_csv_storage_path();
	$output = @fopen($filepath, 'w');
	$write_target = $filepath;
	if (false === $output) {
		$fallback_path = zyrus_get_legacy_csv_path();
		$output = @fopen($fallback_path, 'w');
		$write_target = $fallback_path;
	}
	if (false === $output) {
		return new WP_Error('zyrus_csv_write_failed', 'No se pudo escribir registros_completos.csv');
	}
	fwrite($output, chr(0xEF) . chr(0xBB) . chr(0xBF));
	$headers = zyrus_get_activity_csv_headers();
	fputcsv($output, $headers, ';');
	foreach ($rows as $row) {
		$line = array();
		foreach ($headers as $column) {
			$line[] = (string)($row[$column] ?? '');
		}
		fputcsv($output, $line, ';');
	}
	fclose($output);
	update_option('zyrus_csv_last_write_path', $write_target);
	return true;
}

function zyrus_export_unified_csv() {
	if (!current_user_can('manage_options')) { wp_die('No autorizado.'); }
	check_admin_referer('zyrus_export_unified_csv');
	$rows = zyrus_collect_unified_records(0);
	$filename = 'zyrus-registros-' . gmdate('Ymd-His') . '.csv';
	$delimiter = ';';
	nocache_headers();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=' . $filename);
	$output = fopen('php://output', 'w');
	if (false === $output) { wp_die('No se pudo generar el CSV.'); }
	fwrite($output, chr(0xEF) . chr(0xBB) . chr(0xBF));
	$headers = zyrus_get_activity_csv_headers();
	fputcsv($output, $headers, $delimiter);
	foreach ($rows as $row) {
		$line = array();
		foreach ($headers as $column) { $line[] = (string)($row[$column] ?? ''); }
		fputcsv($output, $line, $delimiter);
	}
	fclose($output);
	exit;
}
add_action('admin_post_zyrus_export_unified_csv', 'zyrus_export_unified_csv');

function zyrus_save_csv_to_disk() {
	if (!current_user_can('manage_options')) { wp_die('No autorizado.'); }
	check_admin_referer('zyrus_save_csv_to_disk');
	$result = zyrus_write_unified_csv_file();
	if (is_wp_error($result)) { wp_die($result->get_error_message()); }
	wp_redirect(admin_url('edit.php?post_type=zyrus_lead&page=zyrus-gsheet-config&csv_saved=1'));
	exit;
}
add_action('admin_post_zyrus_save_csv_to_disk', 'zyrus_save_csv_to_disk');

function zyrus_gsheet_config_page_html() {
	if (!current_user_can('manage_options')) { return; }
    
    // Save the Google Sheet URL if submitted
    if (isset($_POST['zyrus_gsheet_url_save']) && check_admin_referer('zyrus_save_gsheet_url')) {
        update_option('zyrus_google_sheet_url', sanitize_url(wp_unslash($_POST['zyrus_google_sheet_url'])));
        update_option('zyrus_google_script_url', sanitize_url(wp_unslash($_POST['zyrus_google_script_url'])));
        echo '<div class="notice notice-success is-dismissible"><p>Configuración guardada correctamente.</p></div>';
    }

	if (isset($_GET['csv_saved'])) {
		echo '<div class="notice notice-success is-dismissible"><p>Archivo <strong>registros_completos.csv</strong> generado con exito.</p></div>';
	}
	$last_write_path = get_option('zyrus_csv_last_write_path', '');
	$csv_export_url = wp_nonce_url(admin_url('admin-post.php?action=zyrus_export_unified_csv'), 'zyrus_export_unified_csv');
    $sheet_url = get_option('zyrus_google_sheet_url', '');
    $script_url = get_option('zyrus_google_script_url', '');
?>
	<div class="wrap">
		<h1>Configuracion de Registro CSV</h1>
		<div style="position: sticky; top: 32px; z-index: 50; background: #ffffff; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); padding: 15px 20px; margin-top: 16px;">
			<strong>Accesos rapidos</strong>
			<p style="margin: 0; padding-top: 8px;">
				<a class="button button-primary" href="<?php echo esc_url($csv_export_url); ?>">Descargar CSV Completo</a>
				<a class="button button-secondary" href="<?php echo esc_url(wp_nonce_url(admin_url('admin-post.php?action=zyrus_save_csv_to_disk'), 'zyrus_save_csv_to_disk')); ?>">Actualizar CSV Ahora</a>
                <?php if (!empty($sheet_url)): ?>
                    <a class="button button-secondary" href="<?php echo esc_url($sheet_url); ?>" target="_blank" rel="noopener noreferrer">Abrir en Google Sheets <span class="dashicons dashicons-external" style="margin-top: 3px;"></span></a>
                <?php else: ?>
                    <span class="button button-secondary disabled" aria-disabled="true">Abrir en Google Sheets (Falta URL)</span>
                <?php endif; ?>
			</p>
		</div>
        
        <div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin-top: 20px;">
            <h2>Enlace a Google Sheets</h2>
            <form action="" method="post">
                <?php wp_nonce_field('zyrus_save_gsheet_url'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="zyrus_google_sheet_url">URL del archivo en Google Sheets</label></th>
                        <td>
                            <input type="url" id="zyrus_google_sheet_url" name="zyrus_google_sheet_url" value="<?php echo esc_attr($sheet_url); ?>" class="regular-text" style="width: 100%; max-width: 600px;" placeholder="https://docs.google.com/spreadsheets/d/...">
                            <p class="description">Pega el enlace de la hoja de cálculo. Esto activará el botón rápido de arriba.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="zyrus_google_script_url">Webhook Web App URL (Apps Script)</label></th>
                        <td>
                            <input type="url" id="zyrus_google_script_url" name="zyrus_google_script_url" value="<?php echo esc_attr($script_url); ?>" class="regular-text" style="width: 100%; max-width: 600px;" placeholder="https://script.google.com/macros/s/.../exec">
                            <p class="description">Despliega un Apps Script como Aplicación Web (con permisos de acceso publico) y pega el enlace aquí para enviar los datos automáticamente cada vez que se registre un lead o clic de WhatsApp.</p>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" name="zyrus_gsheet_url_save" id="submit" class="button button-primary" value="Guardar URL">
                </p>
            </form>
        </div>

		<div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin-top: 20px;">
			<p>Modo activo: <strong>CSV local protegido</strong>. Este archivo se actualiza automaticamente con formularios y clics.</p>
			<code><?php echo esc_html(zyrus_get_csv_storage_path()); ?></code>
			<?php if (!empty($last_write_path)): ?>
				<p class="description">Ultima ruta de escritura: <code><?php echo esc_html($last_write_path); ?></code></p>
			<?php endif; ?>
		</div>
		<div style="background: #fff; padding: 20px; border: 1px solid #ccd0d4; box-shadow: 0 1px 1px rgba(0,0,0,.04); margin-top: 20px;">
			<h2>Registros Unificados (Ultimos 50)</h2>
			<?php
			$args = array(
				'post_type' => array('zyrus_lead', 'zyrus_wa_lead'),
				'posts_per_page' => 50,
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$records = get_posts($args);
			if (empty($records)) {
				echo '<p>No hay registros todavia.</p>';
			} else {
				echo '<table class="wp-list-table widefat fixed striped table-view-list">';
				echo '<thead><tr><th>Fecha</th><th>Tipo</th><th>Nombre</th><th>Correo</th><th>Telefono</th><th>Detalles</th></tr></thead><tbody>';
				foreach ($records as $rec) {
					$type_label = ''; $type_color = ''; $name = ''; $email = ''; $phone = ''; $details = '';
					$date = get_the_date('Y-m-d H:i:s', $rec->ID);
					if ($rec->post_type === 'zyrus_lead') {
						$type_label = 'Formulario'; $type_color = '#2271b1';
						$name = get_post_meta($rec->ID, '_lead_name', true);
						$email = get_post_meta($rec->ID, '_lead_email', true);
						$phone = get_post_meta($rec->ID, '_lead_phone', true);
						$msg = get_post_meta($rec->ID, '_lead_message', true);
						$page_url = get_post_meta($rec->ID, '_lead_page_url', true);
						$details = "<strong>Mensaje:</strong> " . esc_html($msg) . "<br><strong>Pagina:</strong> " . esc_html($page_url);
					} elseif ($rec->post_type === 'zyrus_wa_lead') {
						$type_label = 'WhatsApp'; $type_color = '#46b450';
						$source = get_post_meta($rec->ID, '_whatsapp_source', true);
						$target = get_post_meta($rec->ID, '_whatsapp_target_url', true);
						$page_url = get_post_meta($rec->ID, '_whatsapp_page_url', true);
						$details = "<strong>Origen:</strong> " . esc_html($source) . "<br><strong>Destino:</strong> " . esc_html($target) . "<br><strong>Pagina:</strong> " . esc_html($page_url);
					}
					echo "<tr><td>" . esc_html($date) . "</td><td><span style=\"display:inline-block; padding: 3px 8px; border-radius: 12px; color: #fff; font-size: 11px; font-weight: bold; background-color: " . esc_attr($type_color) . ";\">" . esc_html($type_label) . "</span></td><td>" . esc_html($name) . "</td><td>" . esc_html($email) . "</td><td>" . esc_html($phone) . "</td><td>" . wp_kses_post($details) . "</td></tr>";
				}
				echo '</tbody></table>';
			}
			?>
		</div>
	</div>
<?php
}

function zyrus_theme_admin_menu_csv() {
	add_submenu_page(
		'edit.php?post_type=zyrus_lead',
		'Registro CSV',
		'Registro CSV',
		'manage_options',
		'zyrus-gsheet-config',
		'zyrus_gsheet_config_page_html'
	);
}
add_action('admin_menu', 'zyrus_theme_admin_menu_csv');
