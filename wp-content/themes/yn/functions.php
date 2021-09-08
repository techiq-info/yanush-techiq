
<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
include_once "my_functions.php"; 

if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	//add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog archive and single widget area', 'twentyfourteen' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears Blog archive and single widget area.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$query_args = array(
			'family' => urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );	
		//מה מעניין אתכם hover effect in מאמרים page slider
	wp_enqueue_script( 'twentyfourteen-script-articles-menu', get_template_directory_uri() . '/js/articles_aside.js', array( 'jquery' ), '25012017', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}



/*CUSTOM
/////
/////
*/


//remove admin bar

add_filter('show_admin_bar', '__return_false');

//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');


//customize header
function mytheme_customize_header()
{
	global  $post;
	 $myvalue=get_query_var('איזור');
	?>
     
    <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/yn_style.css?u=<?php echo time();?>">
	<link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/queries.css?u=<?php echo time();?>">
    <script src=" <?php echo get_template_directory_uri();?>/js/tweenmax.js"></script>
    <script src=" <?php echo get_template_directory_uri();?>/js/main.js"></script>
  
    <?php
    
	if(is_front_page()){
		?>
         <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick.css">
         <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick-theme.css">
        <script src=" <?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/hp.js"></script>

         <?php
	}else if(is_home()||is_category()||is_singular('post')||is_singular('blog-post')||is_post_type_archive('blog-post')||is_post_type_archive('hb-case-study')){
		
		?>
        
            <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>

         <?php
		
	}else if(is_singular('hb-case-study')){
		
		?>
        <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick.css">
         <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick-theme.css">
        <script src=" <?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
          <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>
		<script src=" <?php echo get_template_directory_uri();?>/js/hb-cs.js"></script>
        
        <?php
		
	}else if(is_post_type_archive('yz-projects')){
		?>
         <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>
            

         <?php
	}else if(is_singular('yz-projects')){
		?>
         <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/yz-single.js"></script>

         <?php
	}else if(is_post_type_archive('yz-sale')){
		?>
            <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/yz-sale-archive.js"></script>

         <?php
	}else if(is_singular('yz-sale')){
		?>
        <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick.css">
         <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick-theme.css">
        <script src=" <?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/yz-sale-single.js"></script>

         <?php
	}else if(is_page_template('page-templates/contact_new.php')){
		?>
                    <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick.css">
         <link rel="stylesheet" type="text/css" href=" <?php echo get_template_directory_uri();?>/css/slick-theme.css">
        <script src=" <?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
            <script src=" <?php echo get_template_directory_uri();?>/js/contact.js"></script>


        <?php
		
		}else if(is_page_template('page-templates/us.php')){
		?>
                    <script src=" <?php echo get_template_directory_uri();?>/js/us.js"></script>
                             <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

   <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>


        <?php
		
		}else if(is_page_template('page-templates/faq.php')){
		?>
                   

           <script src=" <?php echo get_template_directory_uri();?>/js/faq.js"></script>
                    <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

        
        <?php
		
		}else if(is_page_template('page-templates/green-tama.php')){
		?>
                     <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

           <script src=" <?php echo get_template_directory_uri();?>/js/green-tama.js"></script>
           
                   

        
        <?php
		
		}else if(is_page_template('page-templates/partners.php')){
		?>
                    <script src=" <?php echo get_template_directory_uri();?>/js/partners.js"></script>
                    <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

   <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>

        
        <?php
		
		}else if(is_page_template('page-templates/vacancies_new.php')){
		?>
                    <script src=" <?php echo get_template_directory_uri();?>/js/drushim.js"></script>
                    <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

	   <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>

        
        <?php
		
		}else if(is_page_template('page-templates/press.php')){
		?>
         <script src=" <?php echo get_template_directory_uri();?>/js/masonry.js"></script>
                             <script src=" <?php echo get_template_directory_uri();?>/js/ddslick.js"></script>

                    <script src=" <?php echo get_template_directory_uri();?>/js/press.js"></script>
                    <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

   <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>
                    
                  
                        <?php 

        
       
		
		}else if(is_singular('job')){
        ?>
         <script src=" <?php echo get_template_directory_uri();?>/js/new_jobs.js"></script>
    <?php }
	else 
		
		if($myvalue=='ייזום-ופיתוח'){
		?>
         <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>
            

         <?php
	}else 
		
		if($myvalue=='הנדסה-ובנין'||$post->post_parent == 119||is_page(119)){
		
		?>
        
            <script src=" <?php echo get_template_directory_uri();?>/js/hb.js"></script>

         <?php
		
	}else 
	if($post->post_parent == 246||is_page(246)){
		?>
        
            <script src=" <?php echo get_template_directory_uri();?>/js/yz.js"></script>

         <?php
	}
	
	if(is_post_type_archive('blog-post')||is_tax('blog-cat')){?>
		         <script src=" <?php echo get_template_directory_uri();?>/js/pknr.js"></script>
         <script src=" <?php echo get_template_directory_uri();?>/js/blog-archive.js"></script>

		<?php
	}
	

	
}


add_action( 'wp_head', 'mytheme_customize_header');



//rernaming posts to stallions

add_post_type_support( 'post', 'page-attributes' );
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'הנדסה ובנין - פרוייקטים';
  
    $submenu['edit.php'][10][0] = 'הוסף פרוייקט';
    $submenu['edit.php'][16][0] = 'הוסף תג';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'הנדסה ובנין - פרוייקטים';
    $labels->singular_name = 'הנדסה ובנין - פרוייקט';
    $labels->add_new = 'הוסף פרוייקט';
    $labels->add_new_item = 'הוסף פרוייקט';
    $labels->edit_item = 'ערוך פרוייקט';
    $labels->new_item = 'פרוייקטים';
    $labels->view_item = 'צפה בפרוייקטים';
    $labels->search_items = 'חפש';
    $labels->not_found = 'לא נמצאו פריטים';
    $labels->not_found_in_trash = 'לא נמצאו פריטים בפח';
    $labels->all_items = 'כל הפרוייקטים';
    $labels->menu_name = 'פרוייקטים';
    $labels->name_admin_bar = 'פרוייקטים';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

add_theme_support( 'html5', array( 'search-form' ) );


/*add_action( 'add_meta_boxes', 'add_custom_page_attributes_meta_box' );
function add_custom_page_attributes_meta_box(){
    global $post;
    if ( 'page' != $post->post_type && post_type_supports($post->post_type, 'page-attributes') ) {
        add_meta_box( 'custompageparentdiv', __('Template'), 'custom_page_attributes_meta_box', NULL, 'side', 'core');
    }
}

function custom_page_attributes_meta_box($post) {
    $template = get_post_meta( $post->ID, '_wp_page_template', 1 ); ?>
    <select name="page_template" id="page_template">
        <?php $default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' ); ?>
        <option value="default"><?php echo esc_html( $default_title ); ?></option>
        <?php page_template_dropdown($template); ?>
    </select><?php
}

add_action( 'save_post', 'save_custom_page_attributes_meta_box' );*/






function save_custom_page_attributes_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    if ( ! empty( $_POST['page_template'] ) && get_post_type( $post_id ) != 'page' ) {
        update_post_meta( $post_id, '_wp_page_template', $_POST['page_template'] );
    }
}


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



//options page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'הגדרות נוספות' ,
		'menu_title'	=> 'הגדרות נוספות',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'parent_slug' => '',
		'position' => false ,
		
		'icon_url'		=> false
	));
	
	
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'פוטר',
		'menu_title'	=> 'פוטר',
		'menu_slug' 	=> 'footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
		acf_add_options_sub_page(array(
		'page_title' 	=> 'עמוד פרוייקטים',
		'menu_title'	=> 'עמוד פרוייקטים',
		'menu_slug' 	=> 'project_page_text',
		'parent_slug'	=> 'edit.php?post_type=yz-projects',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'פרטי יצירת קשר',
		'menu_title'	=> 'פרטי יצירת קשר',
		'menu_slug' 	=> 'contact-details',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'תפריט מובייל',
		'menu_title'	=> 'תפריט מובייל',
		'menu_slug' 	=> 'mobile-menu',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'טקסט משמאל לטופס צור קשר',
		'menu_title'	=> 'טקסט משמאל לטופס צור קשר',
		'menu_slug' 	=> 'sale-contact',
		'parent_slug'	=> 'edit.php?post_type=yz-sale',
	));
	
}



/*
 * Meta Box Removal
 */
 
 
  
  function remove_post_custom_fields() {
	remove_meta_box( 'formatdiv', 'post', 'normal' );
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );


function rudr_post_tags_meta_box_remove() {
	$id = 'tagsdiv-post_tag'; // you can find it in a page source code (Ctrl+U)
	$post_type = 'post'; // remove only from post edit screen
	$position = 'side';
	remove_meta_box( $id, $post_type, $position );
}
add_action( 'admin_menu', 'rudr_post_tags_meta_box_remove');


/*
 * Add
 */
function rudr_add_new_tags_metabox(){
	$id = 'rudrtagsdiv-post_tag'; // it should be unique
	$heading = 'Tags'; // meta box heading
	$callback = 'rudr_metabox_content'; // the name of the callback function
	$post_type = 'post';
	$position = 'side';
	$pri = 'default'; // priority, 'default' is good for us
	add_meta_box( $id, $heading, $callback, $post_type, $position, $pri );
}
add_action( 'admin_menu', 'rudr_add_new_tags_metabox');
 
/*
 * Fill
 */
function rudr_metabox_content($post) {  
 
	// get all blog post tags as an array of objects
	$all_tags = get_terms('post_tag', array('hide_empty' => 0) ); 
 
	// get all tags assigned to a post
	$all_tags_of_post = get_the_terms( $post->ID, 'post_tag' );  
 
	// create an array of post tags ids
	$ids = array();
	if ( $all_tags_of_post ) {
		foreach ($all_tags_of_post as $tag ) {
			$ids[] = $tag->term_id;
		}
	}
 
	// HTML
	echo '<div id="taxonomy-post_tag" class="categorydiv">';
	echo '<input type="hidden" name="tax_input[post_tag][]" value="0" />';
	echo '<ul>';
	foreach( $all_tags as $tag ){
		// unchecked by default
		$checked = "";
		// if an ID of a tag in the loop is in the array of assigned post tags - then check the checkbox
		if ( in_array( $tag->term_id, $ids ) ) {
			$checked = " checked='checked'";
		}
		$id = 'post_tag-' . $tag->term_id;
		echo "<li id='{$id}'>";
		echo "<label><input type='checkbox' name='tax_input[post_tag][]' id='in-$id'". $checked ." value='$tag->slug' /> $tag->name</label><br />";
		echo "</li>";
	}
	echo '</ul></div>'; // end HTML
}


//add_image_size( 'custom-size', 217, 155 ); 



// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
// Place this in your WordPress functions.php file
/*
function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'news':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-203', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     		break;

     	

      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');
*/

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

require_once(rtrim( dirname( __FILE__ ), '/' ) . '/acf-taxonomy-depth-rule.php'); 


//taxonomy first child unselect
class Category_Checklist {

function init() {
    add_filter( 'wp_terms_checklist_args', array( __CLASS__, 'checklist_args' ) );
}

function checklist_args( $args ) {
    add_action( 'admin_footer', array( __CLASS__, 'script' ) );

    $args['checked_ontop'] = false;

    return $args;
}

// Scrolls to first checked category
function script() {
?>
<script type="text/javascript">
(function($){
    $('[id$="-all"] > categorychecklist-holder ul.acf-checkbox-list').each(function() {
        var list = $(this);
        var firstChecked = list.find(':checked').first();

        if ( !firstChecked.length )
            return;

        var pos_first = list.find(':checkbox').position().top;
        var pos_checked = firstChecked.position().top;

        list.closest('.tabs-panel').scrollTop(pos_checked - pos_first + 5);
    });

    $(".acf-checkbox-list>li>label input").each(function(){
        if ($(this).parent().next('ul').hasClass('children')) {
            $(this).remove();
        }
    });

})(jQuery);
</script>
<?php
    }
}

//Category_Checklist::init();



//register variables
function my_query_vars($vars) {
  $vars[] = "איזור";
  return $vars;
}
add_filter('query_vars', 'my_query_vars');


function my_query_vars2($vars) {
  $vars[] = "עמוד-נחיתה";
  return $vars;
}
add_filter('query_vars', 'my_query_vars2');

//function my_rewrite_endpoint(){
  // Use EP_PERMALINK | EP_PAGES for pages and posts both
 // add_rewrite_endpoint( 'איזור', EP_PAGES );
//}
//add_filter('init','my_rewrite_endpoint');


//csutom walker



class hb_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth=0, $args=NULL,$id=0)
      {
           global $wp_query;
		   $myvalue=get_query_var('איזור');
		   if(!$myvalue){
			   $myvalue="הנדסה-ובנין";
		   }
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           if($item->ID!=1932){$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'?איזור='.$myvalue.'"' : '';}else{
			   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   }
		  
			// $attributes .= "?t=000";
          
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



class yz_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args=NULL,$id=0)
      {
           global $wp_query;
		   $myvalue=get_query_var('איזור');
		   if(!$myvalue){
			   $myvalue="ייזום-ופיתוח";
		   }
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           if($item->ID!=1932){$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'?איזור='.$myvalue.'"' : '';}else{
			   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   }
			// $attributes .= "?t=000";
          
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}


//repair custom post parents menu

// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
// Place this in your WordPress functions.php file

function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'hb-case-study':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-205', $classes))
     		{
     		   $classes[] = 'current_page_parent';
         }
     		break;

     	case 'yz-projects':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-251', $classes))
     		{
     		   $classes[] = 'current_page_parent';
               }
     		break;
			
		case 'yz-sale':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-393', $classes))
     		{
     		   $classes[] = 'current_page_parent';
               }
     		break;

      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');


add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
		
		
	

    return $title;

});



add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
		
		
	

    return $title;

});


// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


function my_modify_main_query( $query ) {
if ( $query->is_post_type_archive('blog-post') && $query->is_main_query() ) { // Run only on the homepage

$query->query_vars['posts_per_page'] = 999; // Show only 5 posts on the homepage only
}
}
// Hook my above function to the pre_get_posts action
add_action( 'pre_get_posts', 'my_modify_main_query' );





