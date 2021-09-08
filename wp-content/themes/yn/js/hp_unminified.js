// JavaScript Document
var hbMenuOpened=true;

var yzMenuOpened=true;


var hbOpened=false;
var hbImages;
var hbImagesLoaded=0;


var yzOpened=false;
var yzImages;
var yzImagesLoaded=0;


var hbGalleryCreated = false;
var yzGalleryCreated = false;

$(document).ready(function(e) {
    hpInit();
});

function loadHbImages(){
		hbImagesLoaded=0;
	hbImages = $('.hbGal .hbGalImg.unpopulated').length;
	$('.hbGal .hbGalImg.unpopulated').each(function(index, element) {
        
		var src = $(this).attr('data-bgimg');
		var thisEl = this;
		$('<img>').attr('src',src).load(function(e){
			
			$(thisEl).css({'background-image':'url('+src+')'});
			hbImagesLoaded++;
			
			if(hbImagesLoaded==hbImages){
			
				$('.hbGal').slick({
					autoplay:true,
					initialSlide:hbImages,
					fade:true,
					 speed: 1000
			
		
		
   
 });
			hbGalleryCreated = true;	
			}
			
			});
		
		
		
    });
	
}


function loadYzImages(){
	
		yzImagesLoaded=0;
		yzImages = $('.yzGal .yzGalImg.unpopulated').length;
	$('.yzGal .yzGalImg.unpopulated').each(function(index, element) {
        
		var src = $(this).attr('data-bgimg');
		var thisEl = this;
		$('<img>').attr('src',src).load(function(e){
			
			$(thisEl).css({'background-image':'url('+src+')'});
			yzImagesLoaded++;
			
			if(yzImagesLoaded==yzImages){
			
				$('.yzGal').slick({
					autoplay:true,
					initialSlide:yzImages,
					fade:true,
					 speed: 1000
			
		
		
   
 });
				yzGalleryCreated = true;	
			}
			
			});
		
		
		
    });
	
	
}
function hpInit(){
	
	
	
	//gallery
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	TweenMax.to($('.fk'),0,{rotation:45,top:'9px'});
	TweenMax.to($('.lk'),0,{rotation:-45,bottom:'9px'});
	TweenMax.to($('.mk'),0,{opacity:0});
	
	
	
	
	TweenMax.set($('.gath'),{perspective:1000});
	TweenMax.set($('.hb_side'),{perspective:1000});
	TweenMax.set($('.yz_side'),{perspective:1000});
	
	$('.hb_side').click(function(e){
		
		var _this = $(this);
		var th = this;
		_this.css({'z-index':3});
		_this.removeClass('unclikced');
		TweenMax.to(_this,.5,{width:'100%',height:'100vh',ease:Sine.easeOut});
		if(!isMobile){
		TweenMax.to($('.yz_side'),.5,{width:'100%',left:'-100%',ease:Sine.easeOut});
		}else{
TweenMax.to($('.yz_side'),.5,{width:0,left:'-100%',ease:Sine.easeOut});		}
		
		TweenMax.to($('.mainInfo'),.5,{right:'60%',display:'none',ease:Sine.easeOut});
		TweenMax.fromTo($('.contentB',th),.5,{left:100,opacity:0},{left:0,opacity:1,display:'block'});
		TweenMax.to($('.contentA',this),.2,{opacity:0,right:200,ease:Sine.easeOut,display:'none',onComplete:function(){
			
			
			TweenMax.delayedCall(2,loadHbImages);
			hbOpened=true;
			
			
				
				TweenMax.to($('.hb_menu'),.3,{right:'0',ease:Sine.easeOut});
			}});
				TweenMax.to($('.topMenuConLeft'),.4,{opacity:1,display:'table'});
$( ".hb_side").unbind( "click" );
	});
	
	
	$('.yz_side').click(function(e){
		//yzOpened=true;
		
		var _this = $(this);
		var th = this;
		_this.css({'z-index':3});
		_this.removeClass('unclikced');
		TweenMax.to(_this,.5,{width:'100%',height:'100vh',ease:Sine.easeOut});
		
		
		if(!isMobile){
	TweenMax.to($('.hb_side'),.5,{width:'100%',left:'100%',ease:Sine.easeOut});
		}else{
TweenMax.to($('.hb_side'),.5,{width:0,left:'100%',ease:Sine.easeOut});	}


		
		TweenMax.to($('.mainInfo'),.4,{left:'60%',display:'none',ease:Sine.easeOut});
				TweenMax.fromTo($('.contentB',th),.5,{right:100,opacity:0},{right:0,opacity:1,display:'block'});

		TweenMax.to($('.contentA',this),.5,{opacity:0,left:200,ease:Sine.easeOut,display:'none',onComplete:function(){
			
			
			TweenMax.delayedCall(2,loadYzImages);
			yzOpened=true;
			
				TweenMax.to($('.yz_menu'),.3,{left:'0',ease:Sine.easeOut});
			}});
				TweenMax.to($('.topMenuConRight'),.4,{opacity:1,display:'table'});
$( ".yz_side").unbind( "click" );
	});
	
	$('.yzLink').click(function(e){
		e.preventDefault();
	
		var _this = $('.yz_side');
		var th = '.yz_side';
		_this.css({'z-index':4});
		_this.removeClass('unclikced');
	
	if(hbGalleryCreated){
		$('.hbGal').slick('slickPause');
	}
		
		
		
		TweenMax.to(_this,.5,{left:0,ease:Sine.easeOut});
		TweenMax.to($('.hb_side'),.5,{left:'100%',ease:Sine.easeOut});
		TweenMax.to($('.hb_menu'),.3,{right:'-29.3rem',ease:Sine.easeOut});
		TweenMax.fromTo($('.contentB',th),.5,{right:100,opacity:0},{right:0,opacity:1,display:'block'});
		TweenMax.to($('.contentA',th),.5,{opacity:0,display:'none',onComplete:function(){
			
		
				
				
			TweenMax.to($('.yz_menu'),.3,{left:'0',ease:Sine.easeOut});
			
			if(!yzGalleryCreated){
			TweenMax.killDelayedCallsTo(loadYzImages);
			TweenMax.delayedCall(2,loadYzImages);
				}else{
					$('.yzGal').slick('slickPlay');
				}
				
				
			}});
			TweenMax.to($('.topMenuConLeft'),.4,{opacity:0,display:'none'});
			TweenMax.to($('.topMenuConRight'),.4,{opacity:1,display:'table'});
				
				

	});
	
	
	$('.hbLink').click(function(e){
			e.preventDefault();
		

		var _this = $('.hb_side');
		var th = '.hb_side';
		_this.css({'z-index':4});
		_this.removeClass('unclikced');
			TweenMax.to(_this,.5,{width:'100%',left:0,ease:Sine.easeOut});
		TweenMax.to($('.yz_side'),.5,{left:'-100%',ease:Sine.easeOut});
		TweenMax.to($('.yz_menu'),.3,{left:'-29.3rem',ease:Sine.easeOut});
				TweenMax.fromTo($('.contentB',th),.5,{left:100,opacity:0},{left:0,opacity:1,display:'block'});
				if(yzGalleryCreated){
		$('.yzGal').slick('slickPause');
				}
		TweenMax.to($('.contentA',th),.5,{opacity:0,display:'none',onComplete:function(){
			
				
				TweenMax.to($('.hb_menu'),.3,{right:'0',ease:Sine.easeOut});
				
				if(!hbGalleryCreated){
			TweenMax.killDelayedCallsTo(loadHbImages);
			TweenMax.delayedCall(2,loadHbImages);
			}else{
				$('.hbGal').slick('slickPlay');
			}
			
			
			}});
			TweenMax.to($('.topMenuConRight'),.4,{opacity:0,display:'none'});
			TweenMax.to($('.topMenuConLeft'),.4,{opacity:1,display:'table'});
			
	});
	
	
	$('.hb_menu .close').click(function(){
		
		if(hbMenuOpened){
			hbMenuOpened=false;
			$('.hb_menu').addClass('closedHbMenu');
		TweenMax.to($('.hb_menu'),.3,{right:'-29.3rem',ease:Sine.easeOut});
		TweenMax.to($('.hb_menu .fk'),.3,{rotation:0,top:0});
	TweenMax.to($('.hb_menu .lk'),0.3,{rotation:0,bottom:0});
	TweenMax.to($('.hb_menu .mk'),.3,{opacity:1});
		}else{
			hbMenuOpened=true;
			
		TweenMax.to($('.hb_menu'),.3,{right:'0',ease:Sine.easeOut,onComplete:function(){$('.hb_menu').removeClass('closedHbMenu');}});
		TweenMax.to($('.hb_menu .fk'),.3,{rotation:45,top:'9px'});
	TweenMax.to($('.hb_menu .lk'),.3,{rotation:-45,bottom:'9px'});
	TweenMax.to($('.hb_menu .mk'),.3,{opacity:0});
		}
		
		
		
		});
		
		
		
		
		$('.yz_menu .close').click(function(){
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
	
	
	
	
	
}