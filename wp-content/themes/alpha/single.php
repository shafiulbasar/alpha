<?php
$alpha_layout_class = "col-md-8";
$alpha_text_class   = "";
if (!is_active_sidebar("sidebar-1")) {
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_text_class   = "text-center";
}
?>

<?php get_header(); ?>

<body <?php body_class(array("first_class", "second_class")); ?>>
    <?php get_template_part("/common-template/hero"); ?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alpha_layout_class; ?>">
                <div class="posts" <?php ?>>
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <div <?php post_class(array("first_class", "second_class")); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_text_class; ?>">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="<?php echo $alpha_text_class; ?>">
                                            <em><?php the_author_posts_link(); ?></em><br />
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (class_exists('Attachments')) {
                                            $attachments = new Attachments('slider');
                                            if ($attachments->exist()) {
                                                echo '<div class="slider">';
                                                while ($attachment = $attachments->get()) { ?>
                                                    <div>
                                                        <?php echo $attachments->image('large'); ?>
                                                    </div>
                                        <?php
                                                }
                                                echo '</div>';
                                            } else if (has_post_thumbnail()) {
                                                $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                                printf('<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url);
                                                the_post_thumbnail("large", array("class" => "img-fluid"));
                                                echo '</a>';
                                            }
                                        }
                                        ?>

                                        <div>
                                            <?php
                                            if (!class_exists('Attachments')) {
                                                echo 'No Slider';
                                                if (has_post_thumbnail()) {
                                                    $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                                    printf('<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url);
                                                    the_post_thumbnail("large", array("class" => "img-fluid"));
                                                    echo '</a>';
                                                }
                                            }
                                            the_content();
                                            ?>
                                            <?php
                                            if (get_post_format() == 'image' && function_exists(('the_field'))) :
                                                // if(get_post_format() && function_exists(('the_field'))): *** tahole sob ghula farmat a data asbe
                                            ?>
                                                <div class="meta-info py-3">
                                                    <h2 class="text-center">
                                                        Custom Value
                                                    </h2>
                                                    <strong>Camera Name: </strong>
                                                    <?php the_field('image_name'); ?><br>

                                                    <strong>Camera Location: </strong>
                                                    <?php
                                                    $alpha_location = get_field('location');
                                                    echo esc_html($alpha_location);
                                                    echo '<br>';
                                                    ?>
                                                    <strong>Capture Date: </strong>
                                                    <?php the_field('date'); ?><br>

                                                    <?php
                                                    if (get_field('camera_model')) : ?>
                                                        <?php
                                                        echo apply_filters('the_content', get_field('download'));
                                                        ?>
                                                    <?php
                                                    endif;
                                                    ?>

                                                    <p>
                                                        <?php
                                                        $alpha_image_filed = get_field('image');
                                                        $alpha_image_src = wp_get_attachment_image_src($alpha_image_filed, "medium");
                                                        // print_r($alpha_image_src);
                                                        // echo $alpha_image_src;
                                                        // echo '<img src='".esc_url($alpha_image_src(0))."' alt="image">';
                                                        echo "<img src='" . esc_url($alpha_image_src[0]) . "'/>'";
                                                        // echo "<img src='" . esc_url($alpha_image_src[0]) . "'>";

                                                        ?>
                                                    </p>
                                                    <p>
                                                        <?php
                                                        $file = get_field("attachment");
                                                        if ($file) {
                                                            $file_thumb = get_field("thumbnail", $file);
                                                            $file_url = wp_get_attachment_url($file);
                                                            if ($file_thumb) {
                                                                $file_thumb_details_src = wp_get_attachment_image_src($file_thumb, "medium ");

                                                                echo "<a target='_blank' href='{$file_url}'>
                                                                    <img src='" . esc_url($file_thumb_details_src[0]) . "' />
                                                                </a>";
                                                            } else {
                                                                echo "<a target='_blank' href='{$file_url}'>
                                                                    {$file_url}
                                                                </a>";
                                                            }
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                            <?php

                                            wp_link_pages();

                                            ?>
                                        </div>
                                    </div>

                                    <div class="authorsection">
                                        <div class="row">
                                            <div class="col-md-2 authorimage">
                                                <?php
                                                echo get_avatar(get_the_author_meta("ID"));
                                                ?>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>
                                                    <?php echo get_the_author_meta("display_name"); ?>
                                                </h4>
                                                <p>
                                                    <?php echo get_the_author_meta("description"); ?>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <?php if (comments_open()) : ?>
                                        <div class="col-md-12">
                                            <?php
                                            comments_template();
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>

                    <div class="container post-pagination">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <?php
                                the_posts_pagination(array(
                                    "screen_reader_text" => ' ',
                                    "prev_text"          => "New Posts",
                                    "next_text"          => "Old Posts"
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (is_active_sidebar("sidebar-1")) :
            ?>
                <div class="col-md-4">
                    <?php
                    if (is_active_sidebar("sidebar-1")) {
                        dynamic_sidebar("sidebar-1");
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_footer(); ?>