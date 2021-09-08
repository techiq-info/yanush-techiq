<?php
/**
 * Template Name:רשימת נחיתה
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">



	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
			<?php
			
			query_posts('post_type="yz-sale"'); 
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
				
                <a href="<?php the_permalink();?>?עמוד-נחיתה=1"><?php the_title();?></a><br>

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
