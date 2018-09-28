<?php if(get_theme_mod('coller_square_enable')&& is_front_page()):?>
    <div id="featured-square" class="featured-section-area">
        <div class="col-md-12 col-sm-12">
            <?php
            if(get_theme_mod('coller_square_title')):?>
                <div class="section-title">
                    <?php
                    echo get_theme_mod('coller_square_title');
                    ?>
                </div>
            <?php endif;?>
            <?php /* Start the Loop */ $count=0; ?>
            <?php
            $args = array( 'posts_per_page' => 3, 'category' => get_theme_mod('coller_square_cat') );
            $lastposts = get_posts( $args );
            foreach ( $lastposts as $post ) :
                setup_postdata( $post ); ?>

                <div class="square-wrapper col-md-4 col-sm-4">
                    <a href="<?php the_permalink() ?>">
                    <div class="featured-thumb">
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <div title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('coller-pop-thumb'); ?></div>
                            <?php else : ?>
                                <div title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></div>
                            <?php endif; ?>

                            <p class="description">
                                <?php echo substr(get_the_excerpt(),0,120).(get_the_excerpt() ? "..." : "" ); ?>
                            </p>
                        </div>

                        <h2><?php the_title(); ?></h2>
                        <h3><?php coller_posted_on_date('l, F j, Y');?></h3>
                    </div>
                    </a>
                </div>
                <?php $count++;
                if ($count == 4) break;
            endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </div>

    </div>
<?php endif;?>