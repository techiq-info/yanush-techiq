<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
$theId = get_queried_object_id () ;
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
       
        
        
        
        
          <div class="lightBox">
        <div class="lightBoxTable">
          <div class="lightBoxTableCell">
            <div class="lightBoxContent">
              <div class="theCon"> </div>
              <p class="theNum"></p>
            <h3><?php the_title();?></h3>
            <p></p>
            </div>
          </div>
        </div>
      </div>
      
			<?php

			//$categories = get_the_category();
//$category_id = $categories[0]->cat_ID;
query_posts( 'post_type="yz-projects"&orderby=menu_order&order=ASC' );
$num;
$numLoop=1;

while (have_posts()) : the_post();

//echo ' '.get_the_ID();
	if($theId==get_the_ID()){
		
		$num = $numLoop;
		break;
	}
	$numLoop++;
endwhile;
 wp_reset_query() ;
			
			?>
           <ul class="catList">
           
            <li class="firstOfThree" style="background-image:url(<?php  $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image; ?>);">
 <div class="thirdOfThreeIn ft">
<div class="table"><div class="tableCell"><h1><span class="prNum">


<?php
			 if($num<10){
			 echo '0'.$num;
			 }else{
				  echo $num;
			 }
			 echo '</span>';
			 the_title();?></h1>
             
             
             
               
             <ul class="tags">
        <?php
		$tags = wp_get_post_terms(get_the_ID(),'yz-project-feature');
		foreach ( $tags as $tag ) {
	?>
    
    <li>
    <?php
	$svgContetn = file_get_contents(get_field('tag_icon',$tag ));
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		echo $tag->name;
		?>
	</li>
	
    
    
   
    <?php
}
?>
		
		</ul>
        
        
             
               <?php if(get_field('sale_link')){
				?>
                <a href="<?php echo get_post_permalink(get_field('sale_link')); ?>" class="csLink">דירות למכירה מהפרוייקט<span class="leftArr bl"></span></a>
                
                <?php
				
				}?>
            
            
              </div>
              </div>
            </div> 
             </li>
            
            
            <li class="secondOfThree">
            <div class="thirdOfThreeIn ft">
            <div class="table">
            <div class="tableCell">
            <p><?php the_field('short_description_yz_self');?></p>
            
          
            
            </div>
            
            </div>
            </div>
            
            </li>
            
            
             <li class="thirdOfThree mb">
             <div class="thirdOfThreeIn ft">
            <div class="table">
            <div class="tableCell">
            <div class="table statusT">
            
            
            <div class="tableRow">
           
            <div class="tableCell ic">
            <?php
$svgContetn = file_get_contents(esc_url( home_url( '/' ) ).'wp-content/themes/yn/images/adrichalim_icon.svg');
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
            
            
          </div>
              <div class="tableCell sT">אדריכלות</div>
            <div class="tableCell stv"><?php the_field('yz_arcitecture');?></div>
            
            
            </div>       
            
            
            
            
                  <div class="tableRow sT">
             <div class="tableCell ic">
               <?php
$svgContetn = file_get_contents(esc_url( home_url( '/' ) ).'wp-content/themes/yn/images/picuach_icon.svg');
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
            
             
             </div>
            <div class="tableCell sT">פיקוח</div>
            <div class="tableCell stv"><?php the_field('yz_inspection');?></div>
            
            
            </div>  
            
            
            
            
                  <div class="tableRow">
             <div class="tableCell ic">
               <?php
$svgContetn = file_get_contents(esc_url( home_url( '/' ) ).'wp-content/themes/yn/images/status_icn.svg');
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
             
             </div>
            <div class="tableCell sT">סטטוס</div>
            <div class="tableCell stv"><?php the_field('yz_status');?></div>
            
            
            </div>  
            
            
                 
            </div>
            
            </div>
            
            </div>
</div>   </li>           
            
    
      
       
    
          <?php
$itemID=1;
if( have_rows('yz_project_gallery') ):

    while ( have_rows('yz_project_gallery') ) : the_row();
?>
          <li class="mediaLibrary" id="item<?php echo $itemID; $itemID++;?>"<?php  if(get_sub_field('yz_media_type')=='Image'){
		
			
			echo 'data-imgUrl="'.get_sub_field('yz_gallery_img').'" '; 
			echo 'data-type="img"'; }
		else if(get_sub_field('yz_media_type')=='Video'){
			
			
			
			
			// get iframe HTML
$iframe =get_sub_field('yz_gallery_vdo_url');


// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];


// add extra params to iframe src
$params = array(
    
    'autoplay'    => 1
);

$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0"';

$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


// echo $iframe
//echo $iframe;


			//$iframe = get_sub_field('video_link');
			echo 'data-videoDt=\''.$iframe.'\'';
			 echo ' data-type="vid"';
			
			};
			echo 'data-text="'.get_sub_field('yz_des').'"';
			?>>
            	<p class="description"><?php the_sub_field('yz_des');?></p>
            <div class="thumb ft" style="background-image:url(<?php the_sub_field('yz_thumb');?>)">
              <div class="tmBg">
                <?php if(get_sub_field('yz_media_type')=='Video'){echo '<div class="vidPl ft"></div>';};?>
              </div>
            </div>
           
          </li>
          <?php
    endwhile;



endif;

?>
        
<?php 

if(get_field('tes_name')){
	
	?>
    <li style="background-image:url(<?php the_field('tes_img');?>);">
    <div class="tes">
    <div class="table">
    <div class="tableCell">
    <h3><?php the_field('tes_name');?></h3>
    <h4><?php the_field('tes_title');?></h4>
    <p><?php the_field('tes_txt');?></p>
    </div>
    
    </div>
    
    </div>
    
    
    </li>
    
    
    <?php
	
	}



?>
            
            </ul>
            
            
            
           
			
			
			
			
			<?php
			
			
			
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();