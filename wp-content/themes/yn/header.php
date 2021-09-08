<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
// First try loading jQuery from Google's CDN
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<?php

 $myvalue=get_query_var('איזור');
 $myvalue2=get_query_var('עמוד-נחיתה');
 
	

	
	
 ?>
 	<link rel="alternate" href="http://www.yanush.co.il/" hreflang="he-il" />
 	<meta name="google-site-verification" content="MGDVBI3U5haq6ZslSJE-6oZ0xpGQS0fTXi__SG7mMrU" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    
    <?php if($myvalue2==1){
		echo '<meta name="robots" content="noindex,nofollow">';
	}?>
   



	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    <?php include_once("analyticstracking.php") ?>

	<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	    ga('send', 'event', 'Contact Form', 'submit');
	}, false );
	</script>

</head>

<body <?php body_class(); 

?>>

<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
	</div>
	<?php endif; ?>

	<?php if($myvalue2!=1){
		
		?>
    
    <header id="masthead" class="site-header" role="banner">
    
    
    <div class="mobile topMenu">
    <div class="cba">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="mobileHome"></a>
    <div class="homeLink">
    <span class="top">
    <?php
	//echo $pagename;
	if(is_home()){
	$blog_page_id = get_option('page_for_posts');
	echo get_page($blog_page_id)->post_title;
		
	}
	else if(is_front_page()){
	}else if(is_page()||is_single()){
		if(mb_strlen(get_the_title())>16){
			
	$mystring =	mb_substr(get_the_title(),0,16);
		echo $mystring.'...';
		}else{
			the_title();
		}
 //the_title();
	}else if(is_archive()){
		$mystring = get_the_archive_title();
 if(mb_strlen($mystring)>19){
	// echo strlen(get_the_archive_title());
	 $mystring =	mb_substr($mystring,0,19);
		echo $mystring.'...';
 }else{
	echo $mystring;
 }
 
 
		
		}
 ?>

    
    
     
 
 <?php if(is_singular('post')||is_singular('blog-post')||is_home()||is_category()||is_post_type_archive('post')||$post->post_parent == 119||is_post_type_archive('hb-case-study')||is_singular('hb-case-study')||$myvalue=='הנדסה-ובנין'){
	 echo '<span class="bottom">ינושבסקי הנדסה ובניין</span>';
	
	 };?>
     
     
     
  <?php if(is_post_type_archive('yz-projects')||$post->post_parent == 246||is_post_type_archive('yz-sale')||is_singular('yz-sale')||is_singular('yz-projects')||$myvalue=='ייזום-ופיתוח'){
	 echo '<span class="bottom">ינושבסקי ייזום ופיתוח</span>';
	 
	 };?>
 
 
 
 <!-- mobile hamburger right side -->
 </span>
    </div>
    <?php if(is_front_page()||is_singular('blog-post')||is_home()||is_post_type_archive('post')||$post->post_parent == 119||is_post_type_archive('hb-case-study')||$myvalue=='הנדסה-ובנין'||is_post_type_archive('yz-projects')||$post->post_parent == 246||is_post_type_archive('yz-sale')||$myvalue=='ייזום-ופיתוח'|| is_post_type_archive('articles')|| is_singular('articles')||is_page(246)){
    echo '<div class="mobileMenuBtn"></div>';
	}?>
    
    
    </div>
     <div class="tmcn">
    <div class="theMenu">
    <div class="hbMobileMenu">
     <a href="#" class="mh"><span class="icn"><?php
$svgContetn = file_get_contents(get_field('hb_icon','option'));
$sp =  explode ("<svg", $svgContetn);
		echo '<div class="svgConM"><svg '.$sp[1].'</svg></div>';
		?></span><span class="ib">ינושבסקי הנדסה ובניין</span></a>
      <div class="tm">
    <?php
	$defaults = array(
	
	'menu'            => '2',
	
);

wp_nav_menu( $defaults );
?>
  </div>
    
     </div>
      <div class="yzMobileMenu">
     <a class="mh" href="#"><span class="icn"><?php
$svgContetn = file_get_contents(get_field('yp_iocn','option'));
$sp =  explode ("<svg", $svgContetn);
		echo '<div class="svgConM"><svg '.$sp[1].'</svg></div>';
		?></span><span class="ib">ינושבסקי ייזום ופיתוח</span></a>
     <div class="tm">
    <?php
	$defaults = array(
	
	'menu'            => '20',
	
);

wp_nav_menu( $defaults );
?>
  </div>  
    </div>
    
    
    
    
       <div class="genMobileMenu">
    <?php
	$defaults = array(
	
	'menu'            => '3',
	'walker'          => new hb_walker()
	
);

wp_nav_menu( $defaults );
?>
    
    </div>
    
     <div class="langMenuMob">
            <a href="http://yanush.co.il/en">EN.</a>&nbsp;<span class="curLang">HE.</span>
            </div>
    
    
    </div>
    </div>
	</div>
    <?php 
	
	
	
	
	if(is_front_page()||$myvalue=='הנדסה-ובנין'||is_page(119)){
		?>
        <?php 
		
		
		

		$defaults = array(
	
	'menu'            => '3',
	'container'       => 'div',
	'container_class' => 'topMenuCon',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="sep">|</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new hb_walker()
);

wp_nav_menu( $defaults );
		
		echo '<div class="topMenuConRight">';
		
$defaults = array(
	
	'menu'            => '3',
	'container'       => 'div',
	'container_class' => 'menuHolder',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="sep">|</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new yz_walker()
);

wp_nav_menu( $defaults );
	echo '<div class="homeLinkCon"><div class="homeLinkConTc"><a class="homeLink" href="'. esc_url( home_url( '/' ) ). '"></a></div></div>';
echo '<div class=table-cell tt"></div>';
			echo '</div>';
echo '<div class="topMenuConLeft">';
			echo '<div class=table-cell tt"></div>';
			echo '<div class="homeLinkCon"><div class="homeLinkConTc"><a class="homeLink" href="'. esc_url( home_url( '/' ) ). '"></a></div></div>';

$defaults = array(
	
	'menu'            => '3',
	'container'       => 'div',
	'container_class' => 'menuHolder',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="sep">|</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new hb_walker()
);

wp_nav_menu( $defaults );
		echo '</div>';
		?>
        
        <?php
		
		
		
		}else if(is_singular('post')||is_singular('blog-post')||is_home()||is_category()||is_post_type_archive('post')||$post->post_parent == 119||is_post_type_archive('hb-case-study')||is_singular('hb-case-study')|| is_post_type_archive('articles')|| is_singular('articles') || is_page(1990)|| is_page(1987)){
			echo '<div class="topMenuConLeft">';
			echo '<div class=table-cell tt"></div>';
			echo '<div class="homeLinkCon"><div class="homeLinkConTc"><a class="homeLink" href="'. esc_url( home_url( '/' ) ). '"></a></div></div>';
			$defaults = array(
	
	'menu'            => '3',
	'container'       => 'div',
	'container_class' => 'menuHolder',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="sep">|</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new hb_walker()
);

wp_nav_menu( $defaults );


			echo '</div>';
			?>
            
            
            <?php
			
		}else if(is_post_type_archive('yz-projects')||is_page(246)||$post->post_parent == 246||is_post_type_archive('yz-sale')||is_singular('yz-sale')||is_singular('yz-projects')||$myvalue=='ייזום-ופיתוח'){
			
				echo '<div class="topMenuConRight">';
			$defaults = array(
	
	'menu'            => '3',
	'container'       => 'div',
	'container_class' => 'menuHolder',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="sep">|</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => new yz_walker()
);

wp_nav_menu( $defaults );
			echo '<div class="homeLinkCon"><div class="homeLinkConTc"><a class="homeLink" href="'. esc_url( home_url( '/' ) ). '"></a></div></div>';
echo '<div class=table-cell tt"></div>';
			echo '</div>';
			
			
		}
		
		
		

		
		?>
		
	</header><!-- #masthead -->

	<div id="main" class="site-main">

		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	    <?php if(function_exists('bcn_display'))
	    {
	        if(!is_home() && !is_front_page() && !is_post_type_archive('articles') && !is_singular('articles')){bcn_display();}
	    }?>
		</div>
    <?php
	
	}else{
	echo '<div id="main2" class="site-main">';	
	}
	?>
    
    <?php
	if($myvalue2!=1){
	if(is_front_page()){
		require_once('yz_menu.php');
		require_once('hb_menu.php');
	}else if(is_home()||is_singular('post')||is_singular('blog-post')||is_post_type_archive('post')||is_category()||$post->post_parent == 119||is_post_type_archive('hb-case-study')||$myvalue=='הנדסה-ובנין'||is_page(119)){
		require_once('hb_menu.php');
	}else if(is_category()){
				echo '<div class="bac"><div class="table-cell"><a href="/הנדסה-ובנין/סוגי-פרוייקטים" class="backArrow"></a></div></div>';

	}else if(is_singular('post')){
		$qoid = get_queried_object_id();
		$actid = get_the_category ($qoid)[0]->term_id;
		
		echo '<div class="bac"><div class="table-cell"><a href="'.get_category_link($actid).'" class="backArrow"></a></div></div>';
		
	}else if(is_singular('hb-case-study')){
		echo '<div class="bac"><div class="table-cell"><a href="/הנדסה-ובנין/ניתוח-פרוייקטים" class="backArrow"></a></div></div>';
	}
	
	
	else if(is_post_type_archive('yz-projects')||is_singular('yz-projects')||is_singular('yz-sale')||is_page(246)||$post->post_parent == 246||is_post_type_archive('yz-sale')||$myvalue=='ייזום-ופיתוח' ){
		require_once('yz_menu.php');
	}else if(is_singular('yz-sale')){
				echo '<div class="bac left"><div class="table-cell"><a href="/ייזום-ופיתוח/פרוייקטים-למכירה" class="backArrow"></a></div></div>';

	}else if(is_singular('yz-projects')){
						echo '<div class="bac left"><div class="table-cell"><a href="/ייזום-ופיתוח/פרוייקטים-יזום-ופיתוח" class="backArrow"></a></div></div>';

	}
	}




			?>

