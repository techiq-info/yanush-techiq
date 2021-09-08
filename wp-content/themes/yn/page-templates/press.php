<?php
/**
 * Template Name: בתקשורת
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
		<h1><?php the_field('press_page_title');?></h1>
        
        
        <div class="sc">
        הצג את הכתבות לפי נושא:
        <select id="pressSubject">
        <option value="כל הכתבות">כל הכתבות</option>
        <?php
		$field_key = "field_56c4710a11212";
$field = get_field_object($field_key);

if( $field )
{
    
        foreach( $field['choices'] as $k => $v )
        {
            echo '<option value="' . $k . '">' . $v . '</option>';
        }
    
}
?>
        
        </select>
        </div>
        
        <ul class="pressList">
        <li  class="grid-sizer"></li>
        <?php
		if( have_rows('items') ):

 	// loop through the rows of data
    while ( have_rows('items') ) : the_row();
		?>
        <li class="item <?php if(get_sub_field('big_item')==1){echo ' bigItem';};?>"<?php
		if(get_sub_field('item_image')){echo ' style="background-image:url('.get_sub_field('item_image').');"';};
		?> data-category="<?php the_sub_field('item_sunject');?>">
         <a <?php 
		 if(get_sub_field('item_link')){
		 echo 'href="'.get_sub_field('item_link').'"';
		 }else if(get_sub_field('press_pdf')){
			 
			  echo 'href="'.get_sub_field('press_pdf').'"';
			
		 }
		  ?>" target="_blank">
          
          
          
       <div class="content">
        <h2><?php the_sub_field('item_text');?></h2>
        <h3><?php the_sub_field('item_origin');?></h3>
        <?php if(get_sub_field('item_link')){
		?>
        <span class="wl">לצפייה בכתבה המלאה<span class="leftArr"></span></span>
        
        <?php
			
			
			}else if(get_sub_field('press_pdf')){
				?>
                
                       <span class="wl">להורדת הכתבה<span class="leftArr"></span></span>

                <?php
				
			};?>
        
        </div>
        </a>
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
