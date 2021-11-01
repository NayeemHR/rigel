<?php
require_once get_theme_file_path( '/inc/tgm.php' );
require_once get_theme_file_path( '/inc/acf-mb.php' );
require_once get_theme_file_path( '/inc/cmb2.php' );
function rigel_supports(){
    load_theme_textdomain('rigel');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support( 'html5', array('search-form') );
    $rigel_custom_header_details = array(
        'header-text' => true,
        'default-text-color' => '#222',
    );
    add_theme_support('custom-header', $rigel_custom_header_details);
    add_theme_support( 'custom-background' );

    add_image_size( 'rigel-square', 400, 400, array('center','top') );

	add_theme_support('post-formats', array('audio','video','image','link', 'quote'));
}
add_action( 'after_setup_theme', 'rigel_supports');

function rigel_assets(){
// echo get_page_template();
    wp_enqueue_style( 'test', get_template_directory_uri(  ). '/assets/test/test.css' );
    //bootstrap.min css
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/bootstrap.min.css' );
    // featherlight css
    wp_enqueue_style( 'featherlight-css', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
    //Ionic Icon Css
    wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/assets/plugins/Ionicons/css/ionicons.min.css' );
    //animate
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/plugins/animate-css/animate.css');
    // Magnify Popup
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/plugins/magnific-popup/magnific-popup.css');
    // Owl Carousel
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/slick/slick.css');
    wp_enqueue_style('dashicons');
    wp_enqueue_style( 'rigel', get_stylesheet_uri() );

    // wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jq-js', get_template_directory_uri() .  '/assets/plugins/jQuery/jquery.min.js', array("jquery"), '1.0.0', true );
    wp_enqueue_script( 'script-js', get_template_directory_uri() .  '/assets/js/script.js', array("jquery"), '1.0.0', true );
    wp_enqueue_script( 'featherlight-js', '//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array("jquery"), '1.0.0', true );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() .  '/assets/plugins/slick/slick.min.js', array("jquery"), '1.0.0', true );
    wp_enqueue_script( 'magnific-js', get_template_directory_uri() .  '/assets/plugins/magnific-popup/jquery.magnific-popup.min.js', array("jquery"), '1.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'rigel_assets' );

// function rigel_admin_assets($hook){
//     if('post.php' == $hook ){
//     wp_enqueue_script( 'admin-js', get_theme_file_uri("/assets/js/admin.js"), array("jquery"), '1.2.0', true );
//     }
// }
// add_action( 'admin_enqueue_scripts', 'rigel_admin_assets' );

function rigel_sidebar(){
    register_sidebar(
        array(
            'name' => __('Single Post Sidebar', 'rigel'),
            'id'=> 'single_post_sidebar',
            'description' => __('anthing you want', 'rigel'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'rigel_sidebar' );

function alpha_the_excerpt($excerpt){
    if(!post_password_required()) {
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}
add_filter( 'the_excerpt', 'alpha_the_excerpt' );
function risel_remove_protected_from_title(){
    return "%s";
}
add_filter( 'protected_title_format', 'risel_remove_protected_from_title' );

if(!function_exists('alpha_about_page_title')){
    
function alpha_about_page_title(){
    if(is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null,'large');
        ?>
        <style>
            .page-banner{
                background-image:url(<?php echo $alpha_feat_image; ?>);
            }
        </style>
        <?php
    }
    if(is_front_page()){
        if(current_theme_supports("custom-header")){
            ?>
            <style>
            .custom-title-header{
                background-image:url(<?php echo header_image(); ?>);
                background-size: cover;
                background-position: center;
            }
            .custom-title-header h1, p{
                color: #<?php echo get_header_textcolor(); ?> !important;
                font-weight: bold !important;
                <?php
                if(!display_header_text()){
                    echo 'display: none;';
                }
                ?>
            }
            </style>
            <?php
        }
    }
}
add_action( 'wp_head', 'alpha_about_page_title', 12 );
}

include 'attachment.php';
function rigel_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('.join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter( 'the_title', 'rigel_highlight_search_results' );
add_filter( 'the_content', 'rigel_highlight_search_results' );
add_filter( 'the_excerpt', 'rigel_highlight_search_results' );


// add_filter('acf/settings/show_admin', '__return_false');

?>