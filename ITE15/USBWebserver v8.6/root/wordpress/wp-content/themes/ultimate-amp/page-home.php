<?php
/*
Template Name: Homepage
*/

get_header();
global $post;
?>

 <div class="ultimate-amp-home">

	<section class="trending-titles">
		<div class="container">
			<div class="left-panel">
				<i class="fa fa-bullhorn"></i>
				<h2 class="section-title">
					<?php echo esc_html__('Trending:','ultimate-amp');?>		
				</h2>
			</div><!-- /.left-panel -->

			<div class="right-panel">
				<div class="title-slider owl-carousel owl-theme">

	        	<?php
	        		$do_not_duplicate = array();
					$count = 5;
					$sticky = get_option( 'sticky_posts' );
					$query_args = array(
					  	'post_type' 			=> 'post',
					  	'posts_per_page' 		=> 5,
						'post__not_in'          => $sticky,
						'post_status' 	 		=> 'publish',
						'ignore_sticky_posts' 	=> false,
					);
					$trending_query = new WP_Query( $query_args );	        	
		        	if ( $trending_query->have_posts() ) { while ( $trending_query->have_posts() ) { $trending_query->the_post();

		        		$do_not_duplicate[] = $post->ID;

					  	$terms = wp_get_post_terms( get_the_ID(), 'category', array("fields" => "all"));  
					  	$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'ultimate-amp-slider-thumb' ) );

					  	$t = array();                    
					  	foreach($terms as $term)
					    	$t[] = $term->slug;
				    ?>

					
						<div class="item">
							<article>
								<h3 class="entry-title">
									<a href="<?php the_permalink();?>">
										<i class="fa fa-play-circle-o"></i>
										<?php the_title();?>
									</a>
								</h3>
							</article>
						</div><!-- /.item -->
						
		        	<?php } } wp_reset_postdata(); ?>


				</div><!-- /.title-slider -->
			</div><!-- /.right-panel -->
		</div><!-- /.container -->
	</section><!-- /.trending-titles -->



	  <section class="banner-section banner-posts">

	  	<?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  	$sticky = get_option( 'sticky_posts' );
		  	$ultimate_amp_featured_block_big_query_args = array(
		  		'post_type' 	 => 'post',
		  		'post_status' 	 => 'publish',
		  		'post__in'       => $sticky,
		  		'posts_per_page' => 1,
		  		'ignore_sticky_posts' 	=> true,
		  		'post__not_in' 	 => $do_not_duplicate,
		  		'paged'          => $paged		  		
		  	);

		  	$ultimate_amp_featured_block_big = new WP_Query( $ultimate_amp_featured_block_big_query_args );
			
			if ( $ultimate_amp_featured_block_big->have_posts() ) { while ( $ultimate_amp_featured_block_big->have_posts() ) { $ultimate_amp_featured_block_big->the_post();
				
				$do_not_duplicate[] = $post->ID;

				$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'ultimate-amp-featured-thumb' ) );
				$terms = wp_get_post_terms( get_the_ID(), 'category', array("fields" => "all"));  
			?>

				<div class="col-md-6">
					<article id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-thumbnail">						
							<?php if( has_post_thumbnail() ){ the_post_thumbnail('ultimate-amp-featured-thumb'); }?>
						</div><!-- /.entry-thumbnail -->
						<div class="entry-content">
							<span><?php 
								foreach ($terms as $term) {
									$url = get_term_link($term->slug, 'category');
									echo "<a href='$url' class='category'>{$term->name}</a>";
							} ?></span><!-- /.category -->
							<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2><!-- /.entry-title -->
							<div class="entry-meta">
								<?php echo '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';?>
	    						<span><i class="fa fa-clock-o"></i> <time datetime="PT5M"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?></time></span>
	    						<span><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i> <span class="count"><?php comments_number( '0', '1', '%' );?></span></a></span>
							</div><!-- /.entry-meta -->
						</div><!-- /.entry-content -->
					</article><!-- /.post -->
				</div>

	    	<?php } } wp_reset_postdata(); ?>




	    <div class="col-md-6">

	  		<?php

		  	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  	$sticky = get_option( 'sticky_posts' );
		  	$ultimate_amp_featured_block_query_args = array(
		  		'post_type' 	 => 'post',
		  		'post_status' 	 => 'publish',
		  		'post__in'       => $sticky,
		  		'posts_per_page' => 4,
		  		'offset'         => 1,
		  		'ignore_sticky_posts' 	=> true,
		  		'post__not_in' 	 => $do_not_duplicate,
		  		'paged'          => $paged		  		
		  	);


		  	$ultimate_amp_featured_block_square = new WP_Query( $ultimate_amp_featured_block_query_args );
			
			if ( $ultimate_amp_featured_block_square->have_posts() ) { while ( $ultimate_amp_featured_block_square->have_posts() ) { $ultimate_amp_featured_block_square->the_post();
				
				$do_not_duplicate[] = $post->ID;

				$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'videostories-blog' ) );
				$terms = wp_get_post_terms( get_the_ID(), 'category', array("fields" => "all"));  			
			?>

				<div class="col-sm-6">
					<article id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-thumbnail">						
							<?php if( has_post_thumbnail() ){ the_post_thumbnail('ultimate-amp-featured-square-thumb'); }?>
						</div><!-- /.entry-thumbnail -->
						<div class="entry-content">
							<span><?php 
									foreach ($terms as $term) {
										$url = get_term_link($term->slug, 'category');
										echo "<a href='$url' class='category'>{$term->name}</a>";										
							} ?></span><!-- /.category -->
							<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2><!-- /.entry-title -->
							<div class="entry-meta">
								<?php echo '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';?>
	    						<span><i class="fa fa-clock-o"></i> <time datetime="PT5M"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?></time></span>
	    						<span><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i> <span class="count"><?php comments_number( '0', '1', '%' );?></span></a></span>
	    						
							</div><!-- /.entry-meta -->
						</div><!-- /.entry-content -->
					</article><!-- /.post -->
				</div>

			<?php } } wp_reset_postdata(); ?>


	    </div>





	  </section><!-- /.banner-section -->




	  
</div>

<?php
get_footer();
