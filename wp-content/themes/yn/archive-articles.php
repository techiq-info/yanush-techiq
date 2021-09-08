<?php
/**
 * The template for displaying Archive pages
 * Template Name: ארכיון בלוגים
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

<section id="secondary-sidebar-blog">	

	<div id="sidebar-blog">
				<ul>
					 <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
					<div  class="widget-area center" role="complementary">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
					</div>
					<?php endif; ?>

				</ul>
			</div>	
</section>
	<section id="primary-archive" class="content-area">


		<div id="content" class="site-content" role="main">
		
			<div class="usTop">


			<?php $my_post_type = new WP_Query(array(
				'post_type' => 'articles'
			)); ?>
			<?php while($my_post_type->have_posts()) : $my_post_type->the_post(); ?>
				<?php $withcomments = 1 ?>
					<?php get_template_part( 'content','article'); ?>

				<?php comments_template(); ?> <!-- / .allow comments-->
			<?php endwhile; // end of the loop. ?>
			<!-- /main content -->		
		</div><!-- #usTop -->
	</div><!-- #primary -->

</section>

<?php get_footer(); ?>


