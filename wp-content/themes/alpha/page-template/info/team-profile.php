<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (class_exists('Attachments')) {
                $attachments = new Attachments('team_profile');
                if ($attachments->exist()) {
                    echo '<div class="col-md-4 teamProfile" class="team_profile">';
                    while ($attachment = $attachments->get()) { ?>
                        <div class="info-design">
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
</div>