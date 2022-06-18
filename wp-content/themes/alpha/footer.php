<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php 
                    if(is_active_sidebar("left-footer")){
                        dynamic_sidebar("left-footer");
                    }
                ?>
            </div>
            <div class="col-md-6">
                <?php 
                    if(is_active_sidebar("right-footer")){
                        dynamic_sidebar("right-footer");
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>