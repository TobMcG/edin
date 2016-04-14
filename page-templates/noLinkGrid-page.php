<?php
/**
 * Template Name: NoLinkGrid Page
 *
 * @package Edin
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<?php if ( '' != $post->post_content ) : // only display if content not empty ?>

	<div class="content-wrapper">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .content-wrapper -->

	<?php endif; ?>

	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'meta_key'		 => 'rowType',
			'orderby'  		 => array( 'meta_value' => 'DESC', 'menu_order' => 'ASC'),
			'post_parent'    => $post->ID,
			'posts_per_page' => 999,
			'no_found_rows'  => true,
		) );
	?>

	<?php if ( $child_pages->have_posts() ) : ?>

		<div id="quaternary" class="grid-area">
			<div class="grid-wrapper clear">

				<?php $rowTypeOuter = ''; $firstPass = true; ?>
				<?php while ( $child_pages->have_posts() ) : $child_pages->the_post();
					$rowTypeInner = get_post_meta(get_the_ID(), 'rowType', true);
					if ($rowTypeOuter != $rowTypeInner) : $rowTypeOuter = $rowTypeInner; ?>

						<?php if (!$firstPass) : ?>
							</div><!-- .rowTypeInner -->
						<?php endif; ?>

						<div class="<?php echo $rowTypeInner ?>">

					<?php $firstPass = false; endif; ?>

					<div class="grid">
						<?php get_template_part( 'content', 'noLinkGrid' ); ?>
					</div><!-- .grid -->

				<?php endwhile; ?>
				</div><!-- .rowTypeInner -->

			</div><!-- .grid-wrapper -->
		</div><!-- #quaternary -->
	<?php
		endif;
		wp_reset_postdata();
	?>

<?php get_footer(); ?>