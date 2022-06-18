<?php
// die(site_url());
if (site_url() == "http://final.test") {
    define("VERSION", time());
} else {
    define("VERSION", wp_get_theme()->get("version"));
}
// echo VERSION;
// die();
// theme bootstraping



if (class_exists('Attachments')) {
    // die();
    require_once "lib/attachment.php";
}
// load tgm file 
require_once get_theme_file_path('/inc/tgm.php');



function alpha_bootstraping()
{
    load_theme_textdomain("alpha");
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('audio', 'image', 'video', 'gallery'));
    $alpha_custom_header_details = array(
        'header_text' => true,
        'default_text_color' => '#222',
        'width' => 1200,
        'height' => 600,
        'flex-width' => true,
        'flex-height' => true,
    );
    add_theme_support('custom-header', $alpha_custom_header_details);
    $alpha_custom_logo_details = array(
        'width' => '100',
        'height' => '100',
        'background-color' => '#222',
    );
    add_theme_support("custom-background");
    add_theme_support('custom-logo', $alpha_custom_logo_details);
    add_theme_support('html5', array('search-form'));
    register_nav_menu("topmenu", __("Top menu", "alpha"));
    register_nav_menu("footermenu", __("Footer menu", "alpha"));
}
add_action("after_setup_theme", "alpha_bootstraping");

// all file loaded in your theme
function alpha_assets()
{
    wp_enqueue_style("tiny-slider", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css");
    wp_enqueue_style("dashicons");
    wp_enqueue_style("bootrap", "//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
    wp_enqueue_style("feather-light-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_style("alpha", get_stylesheet_uri(), null, VERSION);

    wp_enqueue_script("tiny-slider", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", null, VERSION, "true");
    wp_enqueue_script("feather-light-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), VERSION, "true");
    wp_enqueue_script("mainJs", get_theme_file_uri("/assets/js/main.js"), array("jquery", "feather-light-js"), VERSION, "true");
    wp_enqueue_script("attachment", get_theme_file_uri("/assets/js/attachment.js"), array("jquery", "feather-light-js"), VERSION, "true");
}
add_action("wp_enqueue_scripts", "alpha_assets");

// create a widgets in your theme
function alpha_init_widgets($id)
{
    register_sidebar(array(
        'name' => 'right sidebar Title',
        'id'   => 'sidebar-1',
        'description' => __('this is caption', 'alpha'),
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'left footer',
        'id'   => 'left-footer',
        'description' => __('this is caption', 'alpha'),
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'right footer',
        'id'   => 'right-footer',
        'description' => __('this is caption', 'alpha'),
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'alpha_init_widgets');


// comment a password dite chaile
// if you want password in comment section
function alpha_comment_form($excerpt)
{
    if (!post_password_required()) {
        return $excerpt;
    } else {
        echo get_the_password_form();
    }
}
add_filter("the_excerpt", "alpha_comment_form");

// password deoya post er title change korte chaile
// if you want to change the title of the protected post 
function alpha_change_password_text()
{
    return "This post is Locked : %s";
}
add_filter("protected_title_format", "alpha_change_password_text");

// menu te css add korte hole
// to add css to the menu
function alpha_menu_add_class($classes, $item)
{
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class", "alpha_menu_add_class", 10, 2);

// file er head er modde load korte chaile
// when need to load a file in the head
function alpha_about_page_background_image()
{
    if (is_page()) {
        $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
?>
        <style>
            .page-header {
                background-image: url(<?php echo $alpha_feat_image; ?>);
                background-size: cover;
                width: 100%;
                height: auto;
            }
        </style>
        <?php
    }
    if (is_front_page()) {
        if (current_theme_supports("custom-header")) {
        ?>
            <style>
                .header {
                    /* theme background image load */
                    background-image: url(<?php echo header_image(); ?>);
                    background-size: cover;
                }

                .header h1.heading a,
                h3.tagline {
                    /* theme heading text color */
                    color: #<?php echo get_header_textcolor(); ?>
                }

                <?php
                if (display_header_text()) {
                    echo "display:none;";
                }
                ?>
            </style>
<?php
        }
    }
}
add_action("wp_head", "alpha_about_page_background_image");


// body_class & post_class remove class and add class
function alpha_body_class($classes)
{
    // remove body class
    unset($classes[array_search("single-format-video", $classes)]);
    unset($classes[array_search("page-id-51", $classes)]);
    // add body class
    $classes[] = "new_class";
    return $classes;
}
add_filter("body_class", "alpha_body_class");
/*
function alpha_highlight_results($text)
{
    $keys = explode(' ', get_search_query());
    $regSearch = '\'(?!((<.*?)|(<a.*?)))(\b' . implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
    $text = preg_replace($regSearch, '<strong class="search-highlight">\0</strong>', $text);
    return $text;
}
add_filter('the_content', 'alpha_highlight_results');
add_filter('the_excerpt', 'alpha_highlight_results');
add_filter('the_title', 'alpha_highlight_results');
*/

function search_content_highlight()
{
    $content = get_the_content();
    $keys = implode('|', explode(' ', get_search_query()));
    $content = preg_replace('/(' . $keys . ')/iu', '<strong class="search-highlight">\0</strong>', $content);

    echo '<h1>' . $content . '</h1 v>';
}
