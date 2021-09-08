<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			

			

			

<ul class="csList">
<?php
$terms = get_terms('feature', 'orderby=menu_order&hide_empty=0' );
$side=1;
$num=1;
foreach($terms as $term) {
	?>
    <li>

<?php if($side==1){
	?>
   
<div class="featureInfo">

    <div class="featureInfoTable">
            <div class="featureInfoTableCell">
<span class="csTitle">case study</span>
<span class="csNum">
<?php
echo '0'.$num;
$num++;

?>
</span>
<h2><?php echo $term->name; ?></h2>
<div class="overCon">
<p><?php echo $term->description; ?></p>
<ul class="projectsListCS">

<?php $args = array(
	'posts_per_page'   => 3,
	'orderby'=>'menu_order',
	'order'=>'ASC',
	'post_type'        => 'hb-case-study',
	 'feature' => $term->slug
);
$myposts = get_posts( $args ); 
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="leftArr"></span></a>
	</li>
<?php endforeach; 
wp_reset_postdata();?>
</ul>
</div>
</div>
</div>
</div>


 <div class="featureImage" style="background-image:url(<?php the_field('feature_image',$term);?>);">
 
 <img src="<?php the_field('feature_icon',$term);?>" alt="<?php echo $term->name; ?>" class="leftIcn">
 </div>
    <?php
$side=0;}else{
		?>
         <div class="featureImage" style="background-image:url(<?php the_field('feature_image',$term);?>);">
          <img src="<?php the_field('feature_icon',$term);?>" alt="<?php echo $term->name; ?>" class="rightIcn">

         </div>
        <div class="featureInfo">
        
           <div class="featureInfoTable">
            <div class="featureInfoTableCell">
<span class="csTitle">case study</span>
<span class="csNum">
<?php
echo '0'.$num;
$num++;

?>
</span>
<h2><?php echo $term->name; ?></h2>
<div class="overCon">
<p><?php echo $term->description; ?></p>
<ul class="projectsListCS">

<?php $args = array(
	'posts_per_page'   => 3,
	
	'post_type'        => 'hb-case-study',
	 'feature' => $term->slug
);
$myposts = get_posts( $args ); 
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="leftArr"></span></a>
	</li>
<?php endforeach; 
wp_reset_postdata();?>
</ul>
</div></div>
</div>
</div>
        <?php
		
		$side=1;}?>


</li>
    
    <?php
}

?>


</ul>

					
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
