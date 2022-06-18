

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h2>
                <?php  _e("Testimonial Area","alpha"); ?>
                <!-- <?php  echo __("Testimonial Area","alpha"); ?> -->
            </h2>
            <div class="testimonial slider">
            <?php
                                            if ( class_exists( 'Attachments' ) ) {
                                                $attachments = new Attachments( 'testimonial' );
                                                if ( $attachments->exist() ) {
                                                    while ( $attachment = $attachments->get() ) { ?>
                                                        <div>
                                                            <?php echo $attachments->image( 'thumbnail' ); ?>
                                                            <h1><?php echo esc_html($attachments->field( 'name' )); ?> </h1>
                                                            <h4>
                                                                <?php echo esc_html($attachments->field( 'position' )); ?>
                                                            </h4>
                                                            <h4>
                                                                <?php echo esc_html($attachments->field( 'company' )); ?>
                                                            </h4>
                                                            <p>
                                                            <?php echo esc_html($attachments->field( 'testimonial' )); ?>
                                                            </p>

                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
            </div>
        </div>
    </div>
</div>