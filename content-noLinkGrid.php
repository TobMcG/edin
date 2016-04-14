<?php
/**
 * The template used for displaying featured page content in page-templates/front-page.php
 *
 * @package Edin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php edin_post_noLinkThumbnail(); ?>

	<?php the_title( sprintf( '<header class="entry-header"><h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1></header>' ); ?>

	<div class="entry-summary">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

	<?php edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
