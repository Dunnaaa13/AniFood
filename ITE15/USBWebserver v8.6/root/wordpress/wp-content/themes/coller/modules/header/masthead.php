<header id="masthead" class="site-header" role="banner">
    <div class="layer">
        <div class="container">
            <div class="site-branding">
                <?php if ( get_theme_mod('coller_logo') != "" ) : ?>
                    <div id="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_theme_mod('coller_logo'); ?>"></a>
                    </div>
                <?php endif; ?>
                <div id="text-title-desc">
                    <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                </div>
            </div>

            <div class="social-icons">
                <?php get_template_part('modules/social/social', 'soshion'); ?>
            </div>

        </div>

    </div>
</header><!-- #masthead -->