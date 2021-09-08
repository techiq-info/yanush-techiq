<?php
/**
 * Template Name: שאל את השכן
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
				<section>
		<ul class="catList">
           
            
            
            
            <li class="secondOfThree">
            <div class="thirdOfThreeIn ft">
            <div class="table">
            <div class="tableCell">
            <h2><?php the_field('an_first_p');?></h2>
              <p><?php the_field('an_sub_title');?></p>
           
            
            </div>
            
            </div>
            </div>
            
            </li>
            
            
            
            
                        
            
    
      
       
    
          <?php
$itemID=1;
$even=false;
if( have_rows('an_q_area') ):

    while ( have_rows('an_q_area') ) : the_row();
?>
<li class="thCo <?php if ($even==false){echo ' rightS';}else{echo ' leftS';};?>"> <div class="thumb ft" style="background-image:url(<?php the_sub_field('an_q_img');?>);"></div></li>
<li class="parCo <?php if ($even==false){echo ' leftS';$even=true;}else{echo ' rightS';$even=false;};?>">
<div class="table">
<div class="table-cell qtc">
<p class="qtd"><?php the_sub_field('an_q_q');?></p>
<p  class="qtdi"><?php the_sub_field('an_q_q_d');?></p></div>
</div>
</li>

        <?php
    endwhile;



endif;

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
