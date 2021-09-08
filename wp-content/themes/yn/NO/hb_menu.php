<div class="hb_menu <?php if (!is_front_page()&&!is_page(119)){echo 'closedHbMenu';};?>">
<div class="hbMenuTop">
<div class="close">
<div class="closeTable">
<div class="closeTableCell">
<div class="kacCon">
<div class="kav fk"></div>
<div class="kav mk"></div>
<div class="kav lk"></div>
</div>
</div>

</div>

</div>
<h3>ינושבסקי הנדסה ובנין</h3>

</div>
<div class="menuBottom">
<!--<div class="notifier"></div>-->
<nav class="hb_nav">
<div class="menuKav"></div>
<ul>
<?php
/*$num=1;
$items = wp_get_nav_menu_items( 2 ); 
foreach  ($items as $item){
	?>
    <li><span class="num">0<?php echo $num; $num++;?></span> <a href="<?php echo $item->url  ;?>"><?php echo $item->title;?></a></li>
    
    <?php
}*/
$defaults = array(
	
	'menu'            => '2',
	
);

wp_nav_menu( $defaults );

?>
</ul>
</nav>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>תמא-38" class="yzLink">ייזום ופיתוח<span class="leftArr"></span></a>
</div>

</div>