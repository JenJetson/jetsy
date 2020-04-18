
<!--call custom header.  for this to work, only use the part of the name that is not php and not header-->
<?php get_header('alt'); ?>

            <div class="alt-page">
                <?php include ('alt-front.php');?>


            </div>

<!--doesn't show on front-page but need for hidden WP things EX: admin header menu (when logged in)-->
<?php wp_footer(); ?>
</html>
