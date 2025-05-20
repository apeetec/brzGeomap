<?php
// REDIRECT 404
add_action('template_redirect','redirect_404');
function redirect_404() {
    if(is_404()) {
        wp_redirect(home_url());
    }
}
// FIM REDIRECT 404

add_action( 'template_redirect', 'attachment_page_redirect', 10 );
function attachment_page_redirect() {
    if( is_attachment() ) {
        $url = wp_get_attachment_url( get_queried_object_id() );
        wp_redirect( home_url(), 301 );
    }
    return;
}

// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );
// Disable X-Pingback to header
add_filter( 'wp_headers', 'disable_x_pingback' );
function disable_x_pingback( $headers ) {
    unset( $headers['X-Pingback'] );
return $headers;
}

// Disable comments
function disable_comments() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type,'comments')) {
            remove_post_type_support($post_type,'comments');
            remove_post_type_support($post_type,'trackbacks');
        }
    }
}
add_action('admin_init','disable_comments');

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
add_theme_support( 'post-thumbnails' );
show_admin_bar(false);

add_action( 'send_headers', 'add_header_xframeoptions' );
function add_header_xframeoptions() {
header( 'X-Frame-Options: SAMEORIGIN' );
}

// Prevent Multi Submit on WPCF7 forms
add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>

<script type="text/javascript">
var disableSubmit = false;
jQuery('input.wpcf7-submit[type="submit"]').click(function() {
    jQuery(':input[type="submit"]').attr('value',"Enviando...")
    if (disableSubmit == true) {
        return false;
    }
    disableSubmit = true;
    return true;
})
  
var wpcf7Elm = document.querySelector( '.wpcf7' );
if(wpcf7Elm){
wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
    jQuery(':input[type="submit"]').attr('value',"Enviar")
    disableSubmit = false;
}, false );
}
</script>
<?php
}

// ##################### SCRIPTS ##################### //
function custom_script() {

    // De-register the built in jQuery
    wp_deregister_script('jquery');
    // Register the CDN version
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, false); 
    // Load new jquery
    wp_enqueue_script( 'jquery' );
    // Máscaras
    // wp_enqueue_script('mask-scripts', get_template_directory_uri() .'/js/jquery.mask.js', array('jquery'), null, true); 
    // Extra scripts
    // wp_enqueue_script('extra-scripts', get_template_directory_uri() .'/js/extra-scripts.js', array('jquery'), null, true);

}

add_action( 'wp_enqueue_scripts', 'custom_script' );
// ##################### END SCRIPTS ##################### //

////////// Disable some endpoints for unauthenticated users
add_filter( 'rest_endpoints', 'disable_default_endpoints' );
function disable_default_endpoints( $endpoints ) {
    $endpoints_to_remove = array(
        '/oembed/1.0',
        '/wp/v2',
        '/wp/v2/media',
        '/wp/v2/types',
        '/wp/v2/statuses',
        '/wp/v2/taxonomies',
        '/wp/v2/tags',
        '/wp/v2/users',
        '/wp/v2/comments',
        '/wp/v2/settings',
        '/wp/v2/themes',
        '/wp/v2/blocks',
        '/wp/v2/oembed',
        '/wp/v2/posts',
        '/wp/v2/pages',
        '/wp/v2/block-renderer',
        '/wp/v2/search',
        '/wp/v2/categories'
    );

    if ( ! is_user_logged_in() ) {
        foreach ( $endpoints_to_remove as $rem_endpoint ) {
            // $base_endpoint = "/wp/v2/{$rem_endpoint}";
            foreach ( $endpoints as $maybe_endpoint => $object ) {
                if ( stripos( $maybe_endpoint, $rem_endpoint ) !== false ) {
                    unset( $endpoints[ $maybe_endpoint ] );
                }
            }
        }
    }
    return $endpoints;
}

// Importandos os metaboxes
$dirbase = get_template_directory();
// Post type empreendimentos
require_once $dirbase . '/inc/posttype_empreendimento.php';
// Categoria de estados dos empreendimentos
require_once $dirbase . '/inc/estados_empreendimentos.php';
// Categoria Cidades dos empreendimentos
require_once $dirbase . '/inc/cidades_empreendimentos.php';
// Campos para categorias de Estados
require_once $dirbase . '/inc/campo_uf_da_categoria_estados.php';
// Tabs
require_once $dirbase . '/inc/tabs_metacampos.php';
// Página de institucional
require_once $dirbase . '/inc/metabox-pagina-institucional.php';


?>