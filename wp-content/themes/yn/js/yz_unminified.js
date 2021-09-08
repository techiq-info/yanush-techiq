var yzMenuOpened;


	$(function(){
		
		
		
		if($('.yz_menu').hasClass('closedYzMenu')){
		yzMenuOpened=false;
	}else{
			yzMenuOpened=true;
	}
	
		$('.yz_menu .close').click(function(){
			
			//alert(yzMenuOpened);
		if(yzMenuOpened){
			yzMenuOpened=false;
			$('.yz_menu').addClass('closedYzMenu');
		TweenMax.to($('.yz_menu'),.3,{left:'-29.3rem',ease:Sine.easeOut});
		TweenMax.to($('.yz_menu .fk'),.3,{rotation:0,top:0});
	TweenMax.to($('.yz_menu .lk'),0.3,{rotation:0,bottom:0});
	TweenMax.to($('.yz_menu .mk'),.3,{opacity:1});
		}else{
			yzMenuOpened=true;
			
		TweenMax.to($('.yz_menu'),.3,{left:'0',ease:Sine.easeOut,onComplete:function(){$('.yz_menu').removeClass('closedYzMenu');}});
		TweenMax.to($('.yz_menu .fk'),.3,{rotation:45,top:'9px'});
	TweenMax.to($('.yz_menu .lk'),.3,{rotation:-45,bottom:'9px'});
	TweenMax.to($('.yz_menu .mk'),.3,{opacity:0});
		}
		
		
		
		});
	});