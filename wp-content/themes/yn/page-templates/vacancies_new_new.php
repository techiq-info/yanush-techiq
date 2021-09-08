<?php
/**
 * Template Name: דרושים חדש חדש
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 
 $ezor = get_query_var('איזור');

?>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
		<div class="drushimGrdid">
        <section class="dt">
            <div class="contactTopNew" style="background-image:url(<?php echo imageUrl('top_img');?>);">
      
        
        </div>  
            
            <p><?=returnMeta('top_text');?></p>    
            </section> 
           
<section class="dr">
       
       
       
              
       
       
       
       
       
       
       
       
        <h2 class="mp">משרות פנויות</h2>
        
        
        <ul class="drushim">
        
      
<?php
            
        $args = array('post_type'=>'job');
         $new_query = new WP_Query( $args ); 
   while ( $new_query->have_posts() ) : $new_query->the_post(); 
            
            ?>

<li>
<a href="<?php 
      $newURL = add_query_arg( array(
    'איזור' => $ezor,
    
),  get_permalink() );   
         
         
       echo $newURL;?>" class="toForm">
<div class="pa">
<div>
<div class="tp1">
    <p class="loca"><?php the_field('reg');?></p>
<h3><?php the_title();?></h3>
<p class="misra"><?php the_field('mis');?></p>

	
</div>
</div>
</div>
</a>
</li>
<?php
              endwhile;

    wp_reset_postdata(); 
            ?>
        
        
        </ul>
        
        
        
        
        
        
        </section>
             </div>
<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
