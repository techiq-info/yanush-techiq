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
        
        
       


<ul class="catList yzCatList">

<li>
<div class="pabs">
<div class="table ft">
<div class="tableCell">
<h1><?php the_field('yz_projects_lobby_title','option');?></h1>
<p><?php echo  the_field('yz_projects_lobby_summary','option');?></p>

</div>

</div>
</div>
</li>
			<?php 
			query_posts($query_string . '&order=menu_order&order=ASC'); 
			if ( have_posts() ) : ?>

		

			<?php
				$num=1;
					while ( have_posts() ) : the_post();




?>


   <li class="ws" style="background-image:url(<?php 
   
   $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
   ?>);">
       
        <a href="<?php the_permalink();?>" class="categoryDes">
        <div class="catHover yzCatHover" style="background-image:url(<?php the_field('cat_icon',$category);?>);"></div>
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
         
        <p><?php the_field('yz_project_summary');?> </p>




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
		?>
	</li>
	
    
    
   
    <?php
}
?>
		
		</ul>
        
      
        </div>
        
        </div>
        
       
        
        
        </a>
        </li>



<?php
		

					endwhile;
				

				endif;
			?>
            <li class="morep">
            <a href="<?php echo get_bloginfo('url'); ?>/הנדסה-ובנין/סוגי-פרוייקטים/פרוייקטי-מגורים/"><?php
$svgContetn = file_get_contents( esc_url( home_url( '/' ) ).'wp-content/themes/yn/images/nmh.svg');
$sp =  explode("<svg", $svgContetn);
		echo '<div class="svgConD"><svg '.$sp[1].'</svg></div>';
		?>לצפייה בפרוייקטי מגורים נוספים -  ינושבסקי הנדסה ובניין <span class="leftArr"></span></a>
            
            </li>
            </ul></div>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
