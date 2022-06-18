<?php

/**
 * Template Name: single category 
 */
?>
<?php echo get_page_template(); ?>
<?php get_header(); ?>

<body <?php body_class(); ?>>
    <?php get_template_part("/common-template/hero"); ?>
    <div class="posts">
        <?php


        $paged = get_query_var("paged") ? get_query_var("paged") : 1;
        $post_id = array(626, 604, 584, 120, 107, 92, 45, 36, 10);
        $post_per_page = 2;

        $post_wordprss_to_display = new WP_Query(array(
            // 'post__in' => $post_id,
            // 'category_name' => 'uncategorized',
            'posts_per_page' => $post_per_page,
            'orderby' => 'post__in',
            'paged' => $paged,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array('travel'),
                ),
                array(
                    'taxonomy' => 'tag',
                    'field'    => 'slug',
                    'terms'    => array('bangladesh'),
                )
            )
        ));


        while ($post_wordprss_to_display->have_posts()) {
            $post_wordprss_to_display->the_post();
        ?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <strong><?php the_author(); ?> </strong><br />
                                <?php echo get_the_date(); ?>

                                <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>', '</li><li>', '</li></ul>'); ?>
                                <?php
                                $alpha_post_formate = get_post_format();
                                if ($alpha_post_formate == "image") {
                                    echo '<span class="dashicons dashicons-format-image"></span>';
                                } else if ($alpha_post_formate == "video") {
                                    echo '<span class="dashicons dashicons-format-video"></span>';
                                } else if ($alpha_post_formate == "gallery") {
                                    echo '<span class="dashicons dashicons-format-gallery"></span>';
                                }
                                ?>

                            </p>
                            <!-- <ul class="list-unstyled">
                        <li>dhaka</li>
                    </ul> -->
                        </div>
                        <div class="col-md-8">
                            <p class="imagsize">
                                <?php
                                if (the_post_thumbnail()) {
                                    the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                }
                                ?>
                            </p>
                            <p>
                                <?php the_excerpt(); ?>
                                <!-- <?php
                                        if (is_single()) {
                                            the_content();
                                        } else {
                                            the_excerpt();
                                        }
                                        ?> -->
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        <?php
        }
        wp_reset_query();
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $post_wordprss_to_display->max_num_pages,
                        'current' => $paged,
                        'prev_next' => true,
                        'prev_text' => __('New Post', 'alpha'),
                        'next_text' => __('Old post', 'alpha'),
                    ));
                    ?>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php get_footer(); ?>