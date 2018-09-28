<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package Catch_Inspire
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hentry-inner">
		<?php if ( has_post_thumbnail() ) : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php
			$thumbnail = 'catch-inspire-featured';
			the_post_thumbnail( $thumbnail );
			?>
		</a>
		<?php endif; ?>

		<div class="entry-container">
			<header class="entry-header">
				<div class="entry-meta">
					<?php echo catch_inspire_entry_category(); ?>
				</div><!-- .entry-meta -->
				
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
			</header>
			<?php
				$excerpt = get_the_excerpt();

				echo '<div class="entry-summary"><p>' . $excerpt . '</p></div><!-- .entry-summary -->';  ?>
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article>
