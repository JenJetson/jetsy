<!--call custom header named header-alt.php -->
<?php get_header('alt'); ?>

<div class="alt-page">
    <?php include('alt-front.php'); ?>
</div>

<!--doesn't show on front-page but need for WP things EX: admin header menu (when logged in)-->
<?php wp_footer(); ?>
</html>
