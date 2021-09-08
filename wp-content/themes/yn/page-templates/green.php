<?php
/**
 * Template Name: בניה ירוקה
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
			

				// Start the Loop.
				while ( have_posts() ) : the_post();

					?>
                    <section class="pageParagraphs">
                    <h1><?php the_title();?></h1>
                    <p class="rightP"><?php the_field('green_right_paragraph');?></p>
                    <p  class="leftP"><?php the_field('green_left_paragraph');?></p>
                    </section>
                    
                    <section class="moreProjects">
                    <div class="moreProjectsCon">
                    <h2>פרוייקטי בנייה ירוקה</h2>
                    </div>
                   <ul class="catList">
                    <?php
					
					query_posts( 'posts_per_page=3&&tag_id=15' );
					while ( have_posts() ) : the_post();
   
   ?>
   
    <li style="background-image:url(<?php 
   
   $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
   ?>);">
       
        <a href="<?php the_permalink();?>" class="categoryDes">
        <div class="catHover" style="background-image:url(<?php the_field('cat_icon',$category);?>);"></div>
         <div class="categoryDesTable">
          <div class="categoryDesTableCell projectPage">
         
        <h3> <?php the_title();?></h3>
         
        <p><?php the_field('short_description');?> </p>
       </div>
       </div>
       </a>
       </li>
		<?php
endwhile;
wp_reset_query();

					?>
                    </ul>
                    </section>
                    
                    
                    <?php
					
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
