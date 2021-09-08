<?php
function returnMeta($field,$id=null,$type='post'){
	
	
	switch ($id){
			
		case null:
			$id=get_the_ID();
	}
	
	
	
	switch ($type){
		case 'post':
			$data = get_post_meta($id,$field,true);
			break;
			
		case 'term':
			$data = get_term_meta($id,$field,true);
			break;
			
			
	}
	
	
	return $data;
	
}

function imageUrl($field,$id=null,$type='post'){
	
	switch ($id){
			
		case null:
			$id=get_the_ID();
	}
	
	switch ($type){
		case 'post':
			$imgId = (int)(get_post_meta($id,$field,true));
			
			break;
			
		case 'term':
			$imgId  = (int)(get_term_meta($id,$field,true));
			break;
			
			
	}
	
	$imgUrl =  wp_get_attachment_url($imgId);
	return $imgUrl;
	
}

function getSvgContent($url,$alt){
	 $svgContetn = file_get_contents($url);
	 $sp =  explode("<svg", $svgContetn);
$typeIcon = '<div class="svgCon" role="img" alt="'.$alt.'"><svg '.$sp[1].'</div>';
					   return $typeIcon;
}



function echoMeta($field,$id=null,$type='post'){
	
	
	switch ($id){
			
		case null:
			$id=get_the_ID();
	}
	
	
	
	switch ($type){
		case 'post':
			$data = get_post_meta($id,$field,true);
			break;
			
		case 'term':
			$data = get_term_meta($id,$field,true);
			break;
			
			
	}
	
	
	echo $data;
	
}
function returnRepeter($repeaterName,$fileds,$id=null,$type='post'){
	
  $returndArray = array();
	
	switch ($id){
			
		case null:
			$id=get_the_ID();
	}
  //$rpt = returnMeta($repeaterName);
	
	switch ($type){
		case 'post':
			$rpt  = get_post_meta($id,$repeaterName,true);
			break;
			
		case 'term':
			$rpt = get_term_meta($id,$repeaterName,true);
			break;
			
			
	}
	
	for($i=0;$i<$rpt;$i++){
		$temArr = array();
		for($j=0;$j<count($fileds);$j++){
			$tem = returnMeta($repeaterName.'_'.$i.'_'.$fileds[$j],$id,$type);
			$temArr[$fileds[$j]] = $tem;

			//array_push($temArr[$fileds[$j]],'a');

			
		}
		array_push($returndArray,$temArr);
	}
	
	
	return $returndArray;
}