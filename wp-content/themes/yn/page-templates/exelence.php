<?php
/**
 * Template Name: מצוינות
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
		
     <ul class="xList">
     
     <?php
$side=1;
if( have_rows('x_bullets') ):

    while ( have_rows('x_bullets') ) : the_row();

       ?>
       
       <li  class="<?php if($side==1){
		   echo " lefti";
		  $side=0;}else{
			 $side=1; 
			   echo " righti";
		  }; 
		   ?>">
       <div class="pa">
       
      
      
      
       <div class="table">
       
       
       
     
           
                <div class="table-cell riboon">      <div class="table-cell">  <img src="<?php echo esc_url( home_url( '/' ) );?>wp-content/themes/yn/images/ribbon.svg" alt="<?php the_title();?>">
       <h3><?php the_sub_field('x_general');?></h3></div></div>
      
       
       
         <div class="table-cell exText" <?php if(get_sub_field('x_img')){echo 'style="background-image:url('.get_sub_field('x_img').');"';};?>><div class="table-cell"><span class="tcc"> <span class="tcb"><span class="tc"><h2><?php the_sub_field('x_ac');
       if(get_sub_field('x_year')){
       ?><span class="year"><?php the_sub_field('x_year');?></span><?php } ?></h2></span></span></span>
       
       <div class="exOver">
       
       <h2><?php the_sub_field('over_title');?></h2>
       <p>
	   
	   <?php if(get_sub_field('over_text_proj')){
		  ?>
          <b>פרוייקט:</b><?php the_sub_field('over_text_proj');?><br>
          <?php
		   };?>
       
       
        
	   <?php if(get_sub_field('over_text_cat')){
		  ?>
          <b>קטגוריה:</b><?php the_sub_field('over_text_cat');?><br>
          <?php
		   };?>
           
           
            
	   <?php if(get_sub_field('over_text_qt')){
		  ?>
          <b>ציטוט שופטים:</b>"<?php the_sub_field('over_text_qt');?>"<br>
          
          <?php
		   };?>
           
           
           <?php if(get_sub_field('view_pdf')){
		  ?>
          <a class="xpdf" target="_blank" href="<?php the_sub_field('view_pdf');?>"><b>צפה בתעודה</b><span class="leftArr"></span></a>
          
          <?php
		   };?>
           
       </p>
       </div>
       </div>
       </div>
           
        
        
        
        
        
        
        
        
        
    
       
       
     
       
       
       
       
       
       
        
        
        
       </div>
       
       
       
       
       
       
       </div>
       </li>
       
       <?php

    endwhile;



endif;

?>
     
     </ul>           

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
