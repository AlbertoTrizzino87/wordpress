<?php
// create custom plugin settings menu
add_action('admin_menu', 'menu_admin_sidn');

function menu_admin_sidn() {

	//create new top-level menu
	add_menu_page('Opciones del tema sidn', 'Tema SIDN', 'administrator', __FILE__, 'maquetacion_menu_sidn' , get_template_directory_uri().'/img/icono-settings.png' );

	//call register settings function
	add_action( 'admin_init', 'opciones_admin_sidn' );
}


function opciones_admin_sidn() {
	//register our settings
    register_setting( 'opciones_sidn', 'posicion-menu' );
    register_setting( 'opciones_sidn', 'logotipo-theme' );
    register_setting( 'opciones_sidn', 'logotipo-theme-retina' );
    register_setting( 'opciones_sidn', 'gtm-head' );
    register_setting( 'opciones_sidn', 'gtm-body' );

}

function cargaScriptsBackendParaElTheme() {
    wp_enqueue_media();
    wp_enqueue_script( 'settings-sidn', get_template_directory_uri().'/opciones-plantilla/js/settings.js');
}
add_action( 'admin_enqueue_scripts', 'cargaScriptsBackendParaElTheme' );

function maquetacion_menu_sidn() {
?>
<div class="wrap">
    <form method="post" action="options.php">
        <?php 
        settings_fields( 'opciones_sidn' );
        do_settings_sections( 'opciones_sidn' );
        $posicionMenu = get_option('posicion-menu');
        $gtmHead = get_option('gtm-head');
        $gtmBody = get_option('gtm-body');


        if($posicionMenu === 'menu-izquierda')
        {
            $menuIzq = 'checked="checked"';
            $menuDcha = '';
            $menuCentro = '';
            $menuCustomizado = '';
        }
        else if($posicionMenu === 'menu-derecha')
        {
            $menuIzq = '';
            $menuDcha = 'checked="checked"';
            $menuCentro = '';
            $menuCustomizado = '';
        }
        else if($posicionMenu === 'menu-centro')
        {
            $menuIzq = '';
            $menuDcha = '';
            $menuCentro = 'checked="checked"';
            $menuCustomizado = '';
        }
        else if($posicionMenu === 'menu-otro')
        {
            $menuIzq = '';
            $menuDcha = '';
            $menuCentro = '';
            $menuCustomizado = 'checked="checked"';
        }
         ?>
        <h2>Opciones del menú:</h2>
        <p>
            <input id="menu-izq" type="radio" name="posicion-menu" value="menu-izquierda" <?php echo $menuIzq; ?>/>
            <label for="menu-izq">Menú con el logo a la izquierda</label>
        </p>
        <p>
            <input id="menu-dcha" type="radio" name="posicion-menu" value="menu-derecha" <?php echo $menuDcha; ?>/>
            <label for="menu-dcha">Menú con el logo a la derecha</label>
        </p>
        <p>
            <input id="menu-centro" type="radio" name="posicion-menu" value="menu-centro" <?php echo $menuCentro; ?>/>
            <label for="menu-centro">Menú con el logo en el centro</label>
        </p>
        <p>
            <input id="menu-otro" type="radio" name="posicion-menu" value="menu-otro" <?php echo $menuCustomizado; ?>/>
            <label for="menu-otro">Menú customizado</label>
        </p>
        <p>
            <h3>Logotipo</h3>
            <?php botonSubidaLogotipo( 'logotipo-theme', $width = 115, $height = 115 ); ?>
        </p>
        <p>
            <h3>Logotipo retina</h3>
            <?php botonSubidaLogotipo( 'logotipo-theme-retina', $width = 115, $height = 115 ); ?>
        </p>
        <hr/>
        <h2>Google tag manager</h2>
        <p>
            <label for="campo-gtm-head">Código de Google Tag manager justo antes de la etiqueta "head"</label><br/>
            <textarea style="width:70%; height:150px;" id="campo-gtm-head" name="gtm-head"><?php echo $gtmHead; ?></textarea>
        </p>
        <p>
            <label for="campo-gtm-body">Código de Google Tag manager justo antes de la etiqueta "head"</label><br/>
            <textarea style="width:70%; height:150px;" id="campo-gtm-body" name="gtm-body"><?php echo $gtmBody; ?></textarea>
        </p>
        <hr/>
        <?php submit_button(); ?>
    </form>
</div>
<?php 
} 

function botonSubidaLogotipo( $nombre, $width, $height ) {

    // Set variables
    $logotipoTheme = get_option( $nombre );

    if ( !empty( $logotipoTheme ) ) {
        $value = $logotipoTheme;
    } else {
        $value = get_template_directory_uri().'/screenshot.png';;
    }

    // Print HTML field
    echo '
        <div class="upload">
            <img data-src="' . $value . '" src="' .$value. '" width="' . $width . 'px" height="' . $height . 'px" />
            <div>
                <input type="hidden" name="'.$nombre.'" id="'.$nombre.'" value="' . $value . '" />
                <button class="subir_logotipo_web">Subir logotipo</button>
                <button class="quitar_logotipo_web">&times;</button>
            </div>
        </div>
    ';
}