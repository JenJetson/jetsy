<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jetsy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="img__wrap">
  	<div class="page-header"> <!-- beginning featured image -->
	<?php 
	if (has_post_thumbnail ()) {?>
	<figure class="featured-image full-bleed">
		<?php 
		the_post_thumbnail('jetsy-full-bleed');
		?>
	</figure>
	<?php } ?>
	</div><!--  end page header with featured image -->
	<p class="img__description">
	
<a href="<?php echo esc_url( __( '/wp/contact/', 'flexjet' ) ); ?>">
				<?php
				printf( esc_html__( 'Hire Me %s', 'flexjet' ), '');
				?></a></p>
</div>


<div class="page-content">
	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				
		<?php
		the_content();
			?>
				
	</div><!-- end entry content -->
		


</div><!-- .page-content -->

</article><!-- #post-## -->



