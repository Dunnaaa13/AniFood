<?php
/**
 * @package Coller
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid coller-club'); ?>>


            <div class="col-md-4 col-sm-4 fthumb_wrapper">
                <div class="featured-thumb">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('coller-thumb'); ?></a>
                    <?php else: ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
                    <?php endif; ?>
                </div><!--.featured-thumb-->
                <a href="<?php the_permalink() ?>">
                    <span class="readmore"><?php _e('Read More','coller'); ?></span>
                </a>
            </div>


            <div class="col-md-8 col-sm-8 fout_wrapper">
                    <div class="out-thumb">
                        <header class="entry-header">
                            <h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                            <div class="postedon"><?php coller_posted_on(); ?></div>
                            <span class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,200).(get_the_excerpt() ? "..." : "" ); ?></span>
                        </header>

                    </div><!--.out-thumb-->
            </div>
    </article><!-- #post-## -->