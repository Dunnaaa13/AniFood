<nav id="site-navigation" class="main-navigation front" role="navigation">
    <div class="container">
        <?php
        // Get the Appropriate Walker First.
        if (has_nav_menu(  'primary' ) && !get_theme_mod('coller_disable_nav_desc',true) ) :
            $walker = new Coller_Menu_With_Description;
        else :
            $walker = new Coller_Menu_With_Icon;
        endif;

        if (!has_nav_menu('primary')) { $walker = ''; }
        //Display the Menu.
        wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
    </div>
</nav><!-- #site-navigation -->