<?php echo get_page_template(); ?>
<?php 
$alpha_single_page_layout_class = "col-md-8";
if(!is_active_sidebar("sidebar-1")){
    $alpha_single_page_layout_class = "col-md-10 offset-md-1";
}
?>


<?php get_header(); ?>
<body <?php body_class(array("first_class","second_class")); ?>>
<?php get_template_part("/common-template/hero"); ?>



<div class="container">
    <div class="row">
        <div class="<?php echo $alpha_single_page_layout_class; ?>">
            <div class="posts">
                <?php
                while(have_posts()){
                    the_post();
                    ?>
                <div class="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="post-title"><?php the_title(); ?> </h2>
                                <p>
                                    <strong><?php the_author(); ?> </strong><br/>
                                    <?php echo get_the_date(); ?>

                                    <?php echo get_the_tag_list('<ul class=\"list-unstyled\"><li>', '</li><li>', '</li></ul>' ); ?>

                                    </p>
                                <!-- <ul class="list-unstyled">
                                    <li>dhaka</li>
                                </ul> -->
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="slider">
                                             <?php 
                                                if ( class_exists( 'Attachments' ) ) {
                                                        $attachments = new Attachments( 'slider' );
                                                        if( $attachments->exist() ){
                                                            while( $attachment = $attachments->get() ){
                                                                ?>
                                                                <div>
                                                                <?php
                                                                    echo $attachments->image( 'large' ); 
                                                                ?>
                                                                </div>
                                                                <?php 
                                                            }
                                                    }
                                                }
                                             ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ( !class_exists( 'Attachments' ) ) : ?>
                                <!-- <p class="imagsize"> -->
                                <?php
                                    
                                    if(has_post_thumbnail()){
                                        $thumbnail_url = get_the_post_thumbnail_url(null,"large");
                                    //   echo  '<a href=".$thumbnail_url." data-featherlight="myimage.png">';
                                    //   printf('<a href="%s" data-featherlight="image">',$thumbnail_url);
                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                        the_post_thumbnail('post-thumbnail',array('class' => 'img-fluid'));
                                        echo "</a>";
                                    }
                                ?>
                                <!-- </p> -->
                                <?php endif ?>
                                <p>
                                    <?php 
                                    the_content();
                                    wp_link_pages();
                                    ?>
                                    <div class="authorsection">
                                        <div class="row">
                                            <div class="col-md-2 authorimage">
                                                <?php 
                                                    echo get_avatar(get_the_author_meta("id"));
                                                ?>
                                            </div>
                                            <div class="col-md-8 offset-md-1" class="authordescription">
                                                <h1>
                                                    <?php echo  get_the_author_meta('first_name'); ?>
                                                    <?php  echo  get_the_author_meta("last_name"); ?>
                                                </h1>
                                                <p>
                                                    <?php echo  get_the_author_meta('description'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    <?php 
                                        if( is_single() && comments_open() ){
                                            comments_template();
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>  
                <?php
                }
                ?>
            </div>
        </div>

        <?php if(is_active_sidebar("sidebar-1")): ?>
        <div class="col-md-4">
            <?php 
                if(is_active_sidebar("sidebar-1")){
                    dynamic_sidebar("sidebar-1");
                }
            ?>
        </div>
        <?php endif; ?>
    </div>
</div>



<?php get_footer(); ?>