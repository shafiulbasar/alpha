<?php
// die(site_url());
if(site_url()=="http://final.test"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("version"));
}
// echo VERSION;
// die();


function launcher_theme_regitation(){
    load_theme_textdomain("launcher");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme","launcher_theme_regitation");

function launcher_assets(){
    // echo basename(get_page_template());
    // die();
    if(is_page()){
        $template_name = basename(get_page_template());
        if($template_name == "launcher.php"){
            wp_enqueue_style("animation",get_theme_file_uri("/assets/css/animate.css"));
            wp_enqueue_style("icomoon",get_theme_file_uri("/assets/css/icomoon.css"));
            wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));
            wp_enqueue_style("style",get_theme_file_uri("/assets/css/style.css"));
            wp_enqueue_style("launcher",get_stylesheet_uri(),null,VERSION);



            wp_enqueue_script("easing",get_theme_file_uri("/assets/js/jquery.easing.1.3.js"),array("jquery"),null,true);
            wp_enqueue_script("bootstrap",get_theme_file_uri("/assets/js/bootstrap.min.js"),array("jquery"),null,true);
            wp_enqueue_script("waypoints",get_theme_file_uri("/assets/js/jquery.waypoints.min.js"),array("jquery"),null,true);
            wp_enqueue_script("simplyCountdown",get_theme_file_uri("/assets/js/simplyCountdown.js"),array("jquery"),null,true);
            wp_enqueue_script("main",get_theme_file_uri("/assets/js/main.js"),array("jquery"),null,true);

            $launcher_year = get_post_meta(get_the_ID(),"year",true);
                $launcher_month = get_post_meta(get_the_ID(),"month",true);
                $launcher_day = get_post_meta(get_the_ID(),"day",true);


                wp_localize_script("main","jsID",array(
                    "year" => $launcher_year,
                    "month" => $launcher_month,
                    "day" => $launcher_day,
                ));
        }else{
            wp_enqueue_style("launcher",get_stylesheet_uri(),null,VERSION);
            wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));


        }
    }


}
add_action("wp_enqueue_scripts","launcher_assets");

function launcher_init_widgets($id) {
    register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-left',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
    register_sidebar(array(
        'name' => 'Footer Right',
        'id'   => 'footer-right',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init','launcher_init_widgets');



function launcher_head_details(){
if(is_page()){
    $home_page_bg = get_the_post_thumbnail_url(null,"large");
    ?>
        <style>
            .home-bg-image{
                background-image: url(<?php echo $home_page_bg; ?>);
                background-size: cover;
            }
        </style>
    <?php
}
}
add_action("wp_head","launcher_head_details");