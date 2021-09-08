

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

 




<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
<ul class="catList">
		<?php
			
			
    $args = array(
	'show_option_all'    => '',
	'orderby'            => 'menu_order',
	'order'              => 'ASC',
	'style'              => 'list',
	'show_count'         => 0,
	'hide_empty'         => 0,
	'use_desc_for_title' => 1,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => 1,
	'title_li'           => __( 'Categories' ),
	'show_option_none'   => __( '' ),
	'number'             => null,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => null
    );
    $categories = get_categories( $args ); 
	
	foreach ( $categories as $category ) {
		if($category->term_id!=52&&$category->term_id!=11&&$category->term_id!=1){
		?>
        <li class="ws" style="background-image:url(<?php the_field('cat_img',$category);?>);">
       
        <a href="<?php echo get_category_link( $category->term_id )?>" class="categoryDes">
        <div class="catHover" style="background-image:url(<?php the_field('cat_icon',$category);?>);"></div>
         <div class="categoryDesTable">
          <div class="categoryDesTableCell">
        <h2><?php echo $category->cat_name;?></h2>
        <p><?php echo $category->description;?></p>
        </div>
        
        </div>
        
       
        
        
        </a>
        </li>
      
        
        <?php
		
     
    }
	}
	foreach ( $categories as $category ) {
		if($category->term_id==11){
			?>
            
             <li class="ws" style="background-image:url(<?php the_field('cat_img',$category);?>);">
       
        <a href="<?php echo get_category_link( $category->term_id )?>" class="categoryDes">
        <div class="catHover" style="background-image:url(<?php the_field('cat_icon',$category);?>);"></div>
         <div class="categoryDesTable">
          <div class="categoryDesTableCell">
        <h2><?php echo $category->cat_name;?></h2>
        <p><?php echo $category->description;?></p>
        </div>
        
        </div>
        
       
        
        
        </a>
        </li>
            
            <?php
		}
		
	}
		?>
</ul>
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php

get_footer();
