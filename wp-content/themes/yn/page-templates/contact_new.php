<?php
/**
 * Template Name: צור קשר - חדש
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 

$myvalue=get_query_var('איזור');
//$global 
//echo 'aaaaaa'.$myvalue; // outputs "whatever"
?>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
		<section class="contactTop" style="background-image:url(<?php the_field('c_img','option');?>);">
        
        <h1><?php the_field('contact_page_head','option');?></h1>
        <div class="cc">
        <div class="table nf">
       
       
       
        <div class="table-cell bo">
        <div class="table">
        <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_location.svg" alt="כתובת">
        
        </div>
        <div class="table-cell p">
        <b><?php the_field('street','option');?></b>&nbsp;<?php the_field('number','option');?><br>
        <b><?php the_field('city','option');?></b>&nbsp;<?php the_field('zip','option');?>
        </div>
        </div>
        </div>
        
        
        <div class="table-cell bo">
             <div class="table nf">
            <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_phone.svg" alt="כתובת">
        
        </div>
		     <div class="table-cell ltr p">
		   <?php the_field('phone','option');?>&nbsp;<b>P</b><br>
        <?php the_field('fax','option');?>&nbsp;<b>F</b>
        </div>
      </div>
        </div>
        
        
        <div class="table-cell bo">
             <div class="table nf">
           <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_envelope.svg" alt="כתובת">
        
        </div>
           <div class="table-cell p">
          <a href="mailto:<?php the_field('mail','option');?>"><?php the_field('mail','option');?></a>
          </div>
          </div>
        </div>
        
        
        <div class="table-cell soc">
        
        
        
           
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
        </div>
        
        </section>
        
        <section class="contactForm">
        <h2>צור קשר</h2>
        
        <?php //echo do_shortcode('[contact-form-7 id="686" title="טופס צור קשר"]');?>
        <ul class="tabs">
        
        
        <?php

// check if the repeater field has rows of data
if( have_rows('tabs_and_forms') ):
$count=0;
 	// loop through the rows of data
    while ( have_rows('tabs_and_forms') ) : the_row();?>

			<li <?php if($count==0){echo 'class="active"';}?> id="bt<?php echo $count;$count++;?>"><button><?php the_sub_field('tab_title');?></button></li>
       
       
        
<?php
    endwhile;



endif;

?>
        
        
		</ul>
       
       <div class="formsArea">
            <ul class="forms">
        
        
        <?php

// check if the repeater field has rows of data
if( have_rows('tabs_and_forms') ):
$count=0;
 	// loop through the rows of data
    while ( have_rows('tabs_and_forms') ) : the_row();?>

			<li id="frm<?php echo $count;$count++;?>"><?php 
				//$sc = 
				
				echo do_shortcode(get_sub_field('form_shortcode'));?></li>
       
       
        
<?php
    endwhile;



endif;

?>
        
        
		</ul>
        </div>
        </section>
                

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<script>
	<?php
	
	 $args = array(
	'posts_per_page'   => 9999,
	
	'post_type'        => 'yz-sale',
	
);
$posts_array = get_posts( $args ); 
$proj='';	
	foreach($posts_array as $pst){
		
		$proj.='"'.$pst->post_title.'",';
		
	}
	
	$proj=  substr($proj, 0, -1);
	?>

	
	
	var projects = [<?php echo $proj;?>];	
	
	
</script>

<?php

get_footer();
