<?php
/**
 * @package Scrawl
 */

$formats = get_theme_support( 'post-formats' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! has_post_thumbnail() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'scrawl' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list && ! is_wp_error( $tags_list ) ) :
		?>
		<span class="tags-links clear">
			<?php echo $tags_list; ?>
		</span>
		<?php endif; // End if $tags_list ?>

		
		<!-- .entry-meta -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
