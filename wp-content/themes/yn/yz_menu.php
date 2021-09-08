<div class="yz_menu <?php if (!is_front_page()&&!is_page(246)){echo 'closedYzMenu';};?>">
<div class="yzMenuTop">
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
<h3>ינושבסקי ייזום ופיתוח</h3>

</div>
<div class="menuBottom">

<nav class="yz_nav">
<div class="menuKav"></div>
<ul>
<?php
/*$num=1;
$items = wp_get_nav_menu_items( 20 ); 
foreach  ($items as $item){
	?>
    <li><span class="num">0<?php echo $num; $num++;?></span> <a href="<?php echo $item->url  ;?>"><?php echo $item->title;?></a></li>
    
    <?php
}*/

$defaults = array(
	
	'menu'            => '20',
	
);

wp_nav_menu( $defaults );



?>
</ul>
</nav>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>הנדסה-ובנין" class="hbLink">הנדסה ובנין<span class="rightArr"></span></a>
</div>
</div>