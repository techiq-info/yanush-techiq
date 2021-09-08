<?php



get_header(); 
$terms = wp_get_post_terms( get_the_ID(), 'blog-cat');
$catId = $terms[0]->term_id;
$ezor = get_query_var('איזור');
//echo  $ezor ;

if(!$ezor){
	$ezor = 'הנדסה-ובנין';
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<div class="cats">
				<ul class="flex">
					<li><a href="http://www.yanush.co.il/blog-post/?%D7%90%D7%99%D7%96%D7%95%D7%A8=%D7%94%D7%A0%D7%93%D7%A1%D7%94-%D7%95%D7%91%D7%A0%D7%99%D7%9F">הכל</a></li>
					<?php
					$terms = get_terms( array(
    'taxonomy' => 'blog-cat',
    'hide_empty' => false,
) );
					
					//print_r($terms);
					foreach($terms as $term){
						?>
					
					<li <?php if($catId==$term->term_id){echo ' class="currentL"';};?>><a href="<?php
						$newLink = add_query_arg( 'איזור', $ezor, get_term_link($term->term_id) );
						echo $newLink ;
						
						?>"><?php echo $term->name;?></a></li>
					
					<?php
					}
					
					?>
					
				</ul>
				
			</div>
		<?php if ( have_posts() ) : ?>


			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();?>
				
			<div class="singleWrapper">
				
				<div class="article">
					<h1><?php the_title();?></h1>
					<?php the_content();?>
					<button id="fbShare" class="shareBtn">שתף</button>
					<a href="whatsapp://send?text=<?php echo home_url( $wp->request );?>"  id="waS" class="shareBtn" data-action="share/whatsapp/share">שתף</a>

				</div>
				<?php 
						$featureds = returnMeta('lookalikes');
				if($featureds){
				?>
			
				
				<div class="featured">
					<h2>אולי יעניין אותך </h2>
					
					<ul>
						<?php 
						
						foreach($featureds as $featured){?>
						
						
						<li><a href="<?php 
							 $newLink = add_query_arg( 'איזור', $ezor ,get_permalink($featured) );							 
														 
														 echo  $newLink;?>"><?php echo get_the_title($featured);?></a>
						
						<?php
							
						}
						?>
						
					</ul>
					
						<div class="social singleSoc desktop">
            <span>עקבו אחרינו</span>
             <?php 
		$defaults = array(
	
	'menu'            => '4',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="fSep"></span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );
		
		
		?>
            
            
            </div>
				</div>
				
				<?php  } ?>
			</div>
			
			<div class="joinNl">
				<h2>הרשם לניוזלטר שלנו</h2>
				<h3>רוצה להשאר מעודכן? הרשם עכשיו לניוזלטר שלנו</h3>
				<?php echo do_shortcode('[contact-form-7 id="2380" title="הרשמה לניוזלטר"]');?>
			</div>
			
			
			<script>
				var currentUrl = window.location.href;
				var fbShareLink = "https://www.facebook.com/sharer/sharer.php?u="+currentUrl;
				$('#fbShare').click(function(e){
		
		e.preventDefault();
		window.open(fbShareLink,'targetWindow','toolbar=no,location=no, status=no,menubar=no,scrollbars=yes,resizable=yes, width=700, height=500');
	});
			</script>
			
			<?php
			endwhile;

			
		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
