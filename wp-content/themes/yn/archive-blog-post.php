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

get_header(); 
$ezor = get_query_var('איזור');

?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
			<div class="cats">
				<ul class="flex">
					<li class="currentL"><a href="http://www.yanush.co.il/blog-post/?%D7%90%D7%99%D7%96%D7%95%D7%A8=%D7%94%D7%A0%D7%93%D7%A1%D7%94-%D7%95%D7%91%D7%A0%D7%99%D7%9F">הכל</a></li>
					<?php
					$terms = get_terms( array(
    'taxonomy' => 'blog-cat',
    'hide_empty' => false,
) );
					
					//print_r($terms);
					foreach($terms as $term){
						?>
					
					<li><a href="<?php
						$newLink = add_query_arg( 'איזור', $ezor, get_term_link($term->term_id) );
						echo $newLink ;
						
						?>"><?php echo $term->name;?></a></li>
					
					<?php
					}
					
					?>
					
				</ul>
				
			</div>
			
			
			
			
<ul class="postList">
			<?php if ( have_posts() ) : ?>



			<?php
	$layoutIndex = 0;
					// Start the Loop.
					while ( have_posts() ) : the_post();
	
	
	/*switch($layoutIndex){
			
		case 0:
			$layout='third';
			$layoutIndex++;
			break;
			
		case 1:
			$layout='third';
			$layoutIndex++;
			break;
			
		case 2:
			$layout='third';
			$layoutIndex++;
			break;
			
		case 3:
		$layout='third';
			$layoutIndex++;
			break;
			
			case 4:
			$layout = 'twoThirds';
			$layoutIndex++;
			break;
			
			case 5:
			$layout = 'big';
			$layoutIndex=0;
			break;
			
	}*/
	
	
	
	
	$imageUrl = get_the_post_thumbnail_url(get_the_ID(),'full');
	$title = get_the_title();
	$content = get_the_content();
$content = preg_replace("/<embed[^>]+\>/i", "(embed) ", $content); 		
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
$layout=returnMeta('layout');
	$trimmed = wp_trim_words( $content,  17, '...' );
	$vdo = returnMeta('vdo');
	
	?>

	<li class="<?php if($vdo){echo 'vdoPost';};?> archivePost <?php echo $layout;?>" >
		
		
		<a href="<?php 
				 
				 $newLink = add_query_arg( 'איזור', $ezor ,get_permalink() );
						echo $newLink ;
				
				 
				 
				 ?>">
	<div class="imgConP">
		<span class="vidIConCon"><span class="vidCirc"><span class="vidPlay"></span></span></span>
		<img src="<?php echo $imageUrl;?>" alt="<?php echo $title;?>" />
		
		</div>
		<div class="dets">
			<h2><?php echo $title;?></h2>
			<div class="summary">
				<p><?php echo $trimmed;?></p>
				<div class="dateAndMore">
					<div class="datebl"><?php echo get_the_date('d/m/Y');?></div>
					<div class="morebl">קרא עוד</div>
					
				</div>
			</div>
		</div>
		</a>
	</li>
			
			<?php
					endwhile;
				
				endif;
			?>
			</ul>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
