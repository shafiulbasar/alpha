<?php get_header(); ?>

<body <?php body_class(); ?>>
    <?php get_template_part("/common-template/hero"); ?>
    <div class="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <?php
                    echo get_avatar(get_the_author_meta("id"));
                    ?>
                </div>
                <div class="col-md-8 offset-md-1">
                    <h1>
                        <?php echo strtoupper(get_the_author_meta('first_name')); ?>
                        <?php echo  get_the_author_meta("last_name"); ?>
                    </h1>
                    <p>
                        <?php echo  get_the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                            <br>
                        </h1>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'screen_reader_text' => ' ',
                        'mid_size'  => 3,
                        'prev_text' => __('Back', 'alpha'),
                        'next_text' => __('Onward', 'alpha'),
                    ));
                    ?>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php get_footer(); ?>