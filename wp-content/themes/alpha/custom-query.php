<?php

/**
 * Template Name:Custom Query
 */
?>
<?php get_header(); ?>

<body <?php body_class(); ?>>
    <?php get_template_part("/common-template/hero"); ?>
    <div class="posts">
        <?php
        $paged = get_query_var("paged") ? get_query_var("paged") : 1;
        $total_post_ID = array(626, 604, 584, 120, 107, 92, 45, 36, 10);
        $post_page_num = 3;
        $post_ID = get_posts(array(
            'posts_per_page' => $post_page_num,
            'post__in' => $post_ID,
            'order' => 'asc'
        ));
        foreach ($post_ID as $post) {
            setup_postdata($post);
        ?>
            <div class="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                        </div>
                    </div>

                </div>
            </div>
        <?php
            wp_reset_postdata();
        }
        ?>
    </div>
    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                echo  paginate_links(array(
                    'total' => ceil(count($total_post_ID) / $post_page_num)
                ));
                ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>