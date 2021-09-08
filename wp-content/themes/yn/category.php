<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 
$catId = get_cat_id( single_cat_title("",false) );
?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
       


<ul class="catList">

<li>
<div class="merkazier">
<div class="table ft">
<div class="tableCell">
<h1><?php single_cat_title();?></h1>
<div><?php echo category_description();?></div>

</div>
</div>
</div>
</li>
			<?php 
			
		query_posts($query_string . '&order=menu_order&order=ASC'); 
			if ( have_posts() ) : 
			
			?>

		

			<?php
				$num=1;
					while ( have_posts() ) : the_post();
	


if($catId!=11){
?>
<style>
.marketing_label{
position: absolute;
height: 70px;
width: 70px;
-webkit-transform: rotate( 16deg);
transform: rotate( 16deg);
top: 10px;
right: 12px;
font-family: inherit;
font-size: 15px;
letter-spacing: 1.3px;
background: rgb(202 220 201 / 50%);
border-radius: 50%;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
text-align: center;
line-height: 1;
}
.invite_label {
position: absolute;
top: 0;
left: 0;
font-family: inherit;
font-size: 18px;
background: rgb(215 248 219 / 80%);
padding: 9px 12px;
}
		</style>

   <li class="ws" style="background-image:url(<?php 
   
   $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
   ?>);">
       
        <a href="<?php the_permalink();?>" class="categoryDes">
          <div class="invite_label">
			<font style="vertical-align: inherit;">
			<font style="vertical-align: inherit;"><?php the_field('status');?></font></font>
		</div>
		<div class="marketing_label">
			<font style="vertical-align: inherit;">
			<font style="vertical-align: inherit;"><?php echo get_the_category( $post->ID )[0]->name;?> </font>
			</font>
		</div>  
        <div class="catHover" style="background-image:url(<?php the_field('cat_icon',$category);?>);"></div>
         <div class="categoryDesTable">
          <div class="categoryDesTableCell projectPage">
         <div class="h2con">
        <h2> <span class="projectNum">
          <?php
		  if ($num<10){
			  
			echo '0'.$num;  
		  }else{
			  echo $num;  
		  }
		  $num++;
		  ?>
          
          </span><br><?php the_title();?></h2>
         
        <p><?php the_field('short_description');?> </p>
        <ul class="tags">
        <?php
		$tags = get_the_tags();
		foreach ( $tags as $tag ) {
	?>
    
    <li>
    <?php
	$svgContetn = file_get_contents(get_field('tag_icon',$tag ));
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
	</li>
	
    
    
   
    <?php
}
?>
		
		</ul></div>
      
        </div>
        
        </div>
        
       
        
        
        </a>
        </li>



<?php
		}	else{
			
			
			
			
			
			
			
			
			
			?>
			
			
			
			
			
			
			   <li class="govLi">
        <a href="<?php the_permalink();?>" class="categoryDes">
        <div class="catHover"></div>
        <span class="categoryDes">
      
         <div class="categoryDesTable">
          <div class="categoryDesTableCell projectPage">
         
        <h2> <span class="projectNum">
          <?php
		
		
		$svgContetn = file_get_contents( esc_url( home_url( '/' ) ).'/wp-content/themes/yn/images/lock.svg');
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		
		
		  ?>
          
          </span><br><?php the_title();?></h2>
         
        <p><?php the_field('short_description');?> </p>
        <ul class="tags">
        <?php
		$tags = get_the_tags();
		foreach ( $tags as $tag ) {
	?>
    
    <li>
    <?php
	$svgContetn = file_get_contents(get_field('tag_icon',$tag ));
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
	</li>
	
    
    
   
    <?php
}
?>
		
		</ul>
      
        </div>
        
        </div>
        
       
        
        
        </span>
        </a>
        </li>
        
        
        
        
        
        
        
        
			<?php
			
			
			
		}

					endwhile;
				

				endif;
			?>
            </ul>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
