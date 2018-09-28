<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'lzrestaurant_above_product_page' ); ?>

<section id="feature-pro">
	<div class="container">
        <?php if( get_theme_mod('lzrestaurant_title') != ''){ ?>
        	<h4><?php echo esc_html(get_theme_mod('lzrestaurant_title1',__('Best Of Photos','lzrestaurant'))); ?></h4>
            <h3><?php echo esc_html(get_theme_mod('lzrestaurant_title',__('Feature Products','lzrestaurant'))); ?></h3>
            <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_border',get_template_directory_uri().'/assets/images/border.png')); ?>" alt="">
        <?php }?>

		<div class="col-md-12">
			<?php $pages = array();
			for ( $count = 0; $count <= 0; $count++ ) {
				$mod = intval( get_theme_mod( 'lzrestaurant_product_page' . $count ));
				if ( 'page-none-selected' != $mod ) {
				  $pages[] = $mod;
				}
			}
			if( !empty($pages) ) :
			  $args = array(
			    'post_type' => 'page',
			    'post__in' => $pages,
			    'orderby' => 'post__in'
			  );
			  $query = new WP_Query( $args );
			  if ( $query->have_posts() ) :
			    $count = 0;
					while ( $query->have_posts() ) : $query->the_post(); ?>
					    <div class="box-image">
					        <p><?php the_content(); ?></p>
					        <div class="clearfix"></div>
					    </div>
					<?php $count++; endwhile; ?>
			  <?php else : ?>
			      <div class="no-postfound"></div>
			  <?php endif;
			endif; 
			wp_reset_postdata(); ?>
		    <div class="clearfix"></div>
		</div>
	</div>
</section>

<?php do_action( 'lzrestaurant_below_product_page' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>