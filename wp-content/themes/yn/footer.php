<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->
<?php
$myvalue2=get_query_var('עמוד-נחיתה');
if($myvalue2!=1){
	?>
		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="social">
            <span class="desktop">עקבו אחרינו</span>
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
            <div class="copyright"><?php the_field('copyright_text','option');?></div>
            <div class="td langMenuCon">
            <div class="langMenu">
            <a href="http://yanush.co.il/en">EN.</a>&nbsp;<span class="curLang">HE.</span>
            </div>
            </div>
		</footer><!-- #colophon -->
        
        <?php
		
}
?>
        
	</div><!-- #page -->
<span class="isMobile"></span>

	<?php wp_footer(); ?>

</body>
</html>