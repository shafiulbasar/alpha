<?php
/*
 * Template Name: About Page Template
 */
get_header();
?>

<body <?php body_class(); ?>>
    <?php get_template_part("/common-template/hero"); ?>
    <!-- <?php get_template_part("/page-template/about/hero-page"); ?> -->
    <div class="container">
        <?php if (is_front_page()) : ?>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (class_exists('Attachments')) {
                        $attachments = new Attachments('team_profile', 127);  // create page ID is 127(team-profile.php)
                        if ($attachments->exist()) {
                            echo '<div class="col-md-4 teamProfile" class="team_profile">';
                            while ($attachment = $attachments->get()) { ?>
                                <div>
                                    <?php echo $attachments->image('medium'); ?>
                                    <h4>
                                        <?php echo esc_html($attachments->field('name')); ?>
                                    </h4>
                                    <h6 class="needmargin">
                                        <strong>
                                            <?php echo esc_html($attachments->field('position')); ?>
                                        </strong>
                                        <?php echo esc_html($attachments->field('company')); ?>
                                    </h6>
                                    <p>
                                        <?php echo esc_html($attachments->field('details')); ?>
                                    </p>
                                    <h3>
                                        <?php echo esc_html($attachments->field('email')); ?>
                                    </h3>
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
                </div>
            </div>
        <?php endif ?>
    </div>
    <div class="posts">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <div class="post" <?php post_class(); ?>>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="post-title text-center">
                                <?php the_title(); ?>
                            </h2>
                            <p class="text-center">
                                <em><?php the_author(); ?></em><br />
                                <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                                <?php
                                if (has_post_thumbnail()) {
                                    $thumbnail_url = get_the_post_thumbnail_url(null, "large");
                                    printf('<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url);
                                    the_post_thumbnail("large", array("class" => "img-fluid"));
                                    echo '</a>';
                                }

                                the_content();

                                /*next_post_link();
                            echo "<br/>";
                            previous_post_link();*/

                                ?>
                            </p>
                        </div>
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

    <?php
    get_template_part("/page-template/about/info-page");
    ?>
    <?php get_footer(); ?>