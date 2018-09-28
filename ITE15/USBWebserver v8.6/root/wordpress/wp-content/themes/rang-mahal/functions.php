<?php
/**
 * Rang Mahal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rma
 */

	if ( ! function_exists( 'rang_mahal_re' ) ) :
		function rang_mahal_re($str){
			
			$str = str_replace(get_template_directory(), '', $str);
			$str_arr = explode('.', $str);
			array_pop($str_arr);
			return implode('.', $str_arr);
			
		}
	endif;	
	if ( ! function_exists( 'rang_mahal_template_part' ) ) :
		function rang_mahal_template_part($str){
			
			$str = rang_mahal_re($str);
			get_template_part($str);
			
		}
	endif;	
	function rang_mahal_add_editor_styles() {
		add_editor_style( 'editor-style.css' );
	}
	add_action( 'admin_init', 'rang_mahal_add_editor_styles' );	
	/**
	 * Enqueue scripts and styles.
	 */
	function rang_mahal_scripts() {
		wp_enqueue_style( 'rma-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'rma-front-style', get_stylesheet_directory_uri() . '/assets/css/front-styles.css' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}		
	}
	add_action( 'wp_enqueue_scripts', 'rang_mahal_scripts' );

	function rang_mahal_setup() {
		$GLOBALS['content_width'] = apply_filters( 'rang_mahal_content_width', 800 );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
			
		add_theme_support( 'custom-header', apply_filters( 'rang_mahal_custom_header_args', array(
			'default-image'          => get_stylesheet_directory_uri() . '/assets/images/interior-380435_640.jpg',
			'default-text-color'     => 'ffffff',
			'width'                  => 1440,
			'height'                 => 500,
			'flex-height'            => true,
			'flex-width'             => true,
			'wp-head-callback'       => 'rang_mahal_header_style',
		) ) );		
		
		add_theme_support( 'custom-background', apply_filters( 'rang_mahal_custom_background_args', array(
			'default-color' => 'f8f9fa',
			'default-image' => '',
		) ) );
	}
	add_action( 'after_setup_theme', 'rang_mahal_setup', 0 );
	
	
	if ( ! function_exists( 'rang_mahal_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function rang_mahal_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
	
		if ( is_singular() ) :
		?>
	
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
	
		<?php else : ?>
	
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
		</a>
	
		<?php endif; // End is_singular().
	}
	endif;
	
	if ( ! function_exists( 'rang_mahal_posted_on' ) ) :
		/**
		 * Prints HTML with meta information for the current post-date/time and author.
		 */
		function rang_mahal_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}
	
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);
	
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'rang-mahal' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
	
			$byline = sprintf(
				/* translators: %s: post author. */
				esc_html_x( 'by %s', 'post author', 'rang-mahal' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
	
			echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	
		}
	endif;	
		
	class rang_mahal_walker_nav_menu extends Walker_Nav_menu {
	
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$object      = $item->object;
			$type        = $item->type;
			$title       = $item->title;
			$description = $item->description;
			$permalink   = $item->url;
	
			$active_class = '';
			if( in_array('current-menu-item', $item->classes) ) {
				$active_class = 'active';
			}
	
			$dropdown_class = '';
			$dropdown_link_class = '';
			if( $args->walker->has_children && $depth == 0 ) {
				$dropdown_class = 'dropdown';
				$dropdown_link_class = 'dropdown-toggle';
			}
	
			$output .= "<li class='nav-item $active_class $dropdown_class " .  implode(" ", $item->classes) . "'>";
	
			if( $args->walker->has_children && $depth == 0 ) {
				$output .= '<a href="' . esc_url($permalink) . '" class="nav-link ' . $dropdown_link_class . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			}
			else {
				$output .= '<a href="' . esc_url($permalink) . '" class="nav-link">';
			}
	
			$output .= $title;
	
			if( $description != '' && $depth == 0 ) {
				$output .= '<small class="description">' . $description . '</small>';
			}
	
			$output .= '</a>';
		}
	
		function start_lvl( &$output, $depth=0, $args = array() ){
			$submenu = ($depth > 0) ? ' sub-menu' : '';
			$output .= "<ul class='dropdown-menu $submenu depth_$depth'>";
		}
	
	
	}
	

	if ( ! function_exists( 'rang_mahal_header_style' ) ) :
		/**
		 * Styles the header image and text displayed on the blog.
		 *
		 * @see rang_mahal_custom_header_setup().
		 */
		function rang_mahal_header_style() {
	
			if ( get_header_image() ) : ?>
				<style type="text/css">
					.wb-bp-front-page .wp-bs-4-jumbotron {
						background-image: url(<?php echo esc_url( get_header_image() ); ?>);
					}
					.wp-bp-jumbo-overlay {
						background: rgba(33,37,41, 0.7);
					}
				</style>
			<?php
			endif;
	
			$header_text_color = get_header_textcolor();
	
			/*
			 * If no custom options for text are set, let's bail.
			 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
			 */
			if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
				return;
			}
	
			// If we get this far, we have custom styles. Let's do this.
			?>
			<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
			?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
				// If the user has set a custom color for the text use that.
				else :
			?>
				.site-title a,
				.navbar-dark .navbar-brand,
				.navbar-dark .navbar-nav .nav-link,
				.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus,
				.navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus,
				.navbar-dark .navbar-nav .show > .nav-link, .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .nav-link.active,
				.site-description {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
			<?php endif; ?>
			</style>
			<?php
		}
	endif;
		
	function rang_mahal_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Two', 'rang-mahal' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'rang-mahal' ),
			'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title h6">',
			'after_title'   => '</h5>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 5', 'rang-mahal' ),
			'id'            => 'footer-5',
			'description'   => esc_html__( 'Add widgets here.', 'rang-mahal' ),
			'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title h6">',
			'after_title'   => '</h5>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 6', 'rang-mahal' ),
			'id'            => 'footer-6',
			'description'   => esc_html__( 'Add widgets here.', 'rang-mahal' ),
			'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title h6">',
			'after_title'   => '</h5>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 7', 'rang-mahal' ),
			'id'            => 'footer-7',
			'description'   => esc_html__( 'Add widgets here.', 'rang-mahal' ),
			'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title h6">',
			'after_title'   => '</h5>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 8', 'rang-mahal' ),
			'id'            => 'footer-8',
			'description'   => esc_html__( 'Add widgets here.', 'rang-mahal' ),
			'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title h6">',
			'after_title'   => '</h5>',
		) );
	}
	add_action( 'widgets_init', 'rang_mahal_widgets_init' );	
	
	
	if ( ! function_exists( 'rang_mahal_entry_footer' ) ) :
		/**
		 * Prints HTML with meta information for the categories, tags and comments.
		 */
		function rang_mahal_entry_footer() {
			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) { ?>
	
				<span class="cat-links">
					<span class="badge badge-light badge-pill"><?php the_category( '</span> <span class="badge badge-light badge-pill">' ); ?></span>
				</span>
	
				<span class="tags-links">
					<?php the_tags( ' <span class="badge badge-light badge-pill text-muted">#', '</span> <span class="badge badge-light badge-pill text-muted">#', '</span>' ); ?>
				</span>
	
			<?php
			}
	
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'rang-mahal' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
	
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rang-mahal' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}
	endif;
	