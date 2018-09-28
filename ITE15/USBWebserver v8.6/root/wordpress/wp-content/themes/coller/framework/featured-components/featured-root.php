<?php if(get_theme_mod('coller_root_enable') && is_front_page()):?>
    <div id="f1_container">
        <div id="f1_card" class="col-md-12">
            <?php
            if(get_theme_mod('coller_root_title')):?>
                <div class="section-title">
                    <?php
                    echo get_theme_mod('coller_root_title');
                    ?>
                </div>
            <?php endif;?>
            <?php /* Start the Loop */ $count=0; ?>
            <?php
                $args = array( 'posts_per_page' => 3, 'category' => get_theme_mod('coller_root_cat') );
                $lastposts = get_posts( $args );
                foreach ( $lastposts as $post ) :
                    setup_postdata( $post ); ?>

            <div class="root-wrapper col-md-4 col-sm-4">
                <a href="<?php the_permalink() ?>">
                        <div class="front face">
                            <?php if (has_post_thumbnail()) : ?>
                                <div title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('coller-pop-thumb'); ?></div>
                            <?php else : ?>
                                <div title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></div>
                            <?php endif; ?>
                            <div class="mobile-screen">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </div>
                        <div class="back face center">
                            <h2><?php the_title(); ?></h2>
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