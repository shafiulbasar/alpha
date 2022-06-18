<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part("/common-template/hero"); ?>
<div class="posts">
                <h1 class="text-center taghead">
                    Posts Under : <?php 
                        if(is_month()){
                            $month = get_query_var("monthnum");
                            $dateobj = DateTime::createFromFormat("!m",$month);
                            echo $dateobj->format("F");
                        }else if(is_year()){
                            echo esc_html(get_query_var("year"));
                        }else if(is_day()){
                            // echo get_query_var("day")."/".get_query_var("monthnum"). "/".get_query_var("year");
                            // printf("%s / %s / %s",get_query_var("day"),get_query_var("monthnum"),get_query_var("year"));
                            $day = get_query_var("day");
                            $month = get_query_var("monthnum");
                            $year = get_query_var("year");
                            printf("%s - %s - %s",$day,$month,$year);
                        }
                    ?>
                </h1>
    <?php
    while(have_posts()){
        the_post();
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
                        <strong><?php the_author(); ?> </strong><br/>
                        <?php echo get_the_date(); ?>

                        <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>', '</li><li>', '</li></ul>' ); ?>
                        <?php 
                            $alpha_post_formate = get_post_format();
                            if($alpha_post_formate == "image"){
                                echo '<span class="dashicons dashicons-format-image"></span>';
                            }else if($alpha_post_formate == "video"){
                                echo '<span class="dashicons dashicons-format-video"></span>';
                            }else if($alpha_post_formate == "gallery"){
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
                        if(the_post_thumbnail()){
                            the_post_thumbnail('post-thumbnail',array('class' => 'img-fluid'));

                        }
                        ?>
                    </p>
                    <p>
                        <?php the_excerpt(); ?>
                       <!-- <?php 
                        if(is_single()){
                            the_content();
                        }else{
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
                    'prev_text' => __( 'Back', 'alpha' ),
                    'next_text' => __( 'Onward', 'alpha' ),
                ) );
                ?>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
<?php get_footer(); ?>