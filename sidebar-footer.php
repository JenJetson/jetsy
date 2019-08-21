<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jetsy
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="footer-widgets" role="complementary">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #secondary -->

