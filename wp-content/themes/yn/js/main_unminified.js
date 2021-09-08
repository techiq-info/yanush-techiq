var isSubOpened=false;
var num=1;
var isMobile;
//var isContectOPened



$(window).resize(function(e){
		isMobile = ($('.isMobile').css('opacity')==1) ?true:false;
	
});
$(window).load(function(e){
	
	//($('.isMobile').css('opacity')==1) : isMobile=true ? isMobile=false;
	isMobile = ($('.isMobile').css('opacity')==1) ?true:false;
	
	var st = $(document).scrollTop();
		var kav = $('.hb_nav .menuKav');
			if($('.hb_nav .menu').children('.current_page_item').length > 0){
				
				var ofT = $('.hb_nav .menu .current_page_item a').offset().top+($('.hb_nav .menu .current_page_item a').outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}else if($('.hb_nav .menu').children('.current_page_parent').length > 0){
				
				var ofT = $('.hb_nav .menu .current_page_parent a').offset().top+($('.hb_nav .menu .current_page_parent a').outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}
	
	
	var kav = $('.yz_nav .menuKav');
			if($('.yz_nav .menu').children('.current_page_item').length > 0){
				
				var ofT = $('.yz_nav .menu .current_page_item a').offset().top+($('.yz_nav .menu .current_page_item a').outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}else if($('.yz_nav .menu').children('.current_page_parent').length > 0){
				
				var ofT = $('.yz_nav .menu .current_page_parent a').offset().top+($('.yz_nav .menu .current_page_parent a').outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}
	})
$(function(){
	
		
	//add number to menu
	
	$('.hb_nav li a').each(function(index, element) {
		
        $(this).prepend('<span class="num">0'+num+'</span');
		num++;
    });
	
	
	num =1;
	$('.yz_nav li a').each(function(index, element) {
        $(this).prepend('<span class="num">0'+num+'</span');
		num++;
    });
	
	
	
	
	
	
	$('.hb_nav li a').mouseover(function(e){
		
		var st = $(document).scrollTop();
		var kav = $('.hb_nav .menuKav');
		var ofT = $(this).offset().top+($(this).outerHeight()/2)-(kav.outerHeight()/2)-st;
		TweenMax.to(kav,.3,{top:ofT,opacity:1,ease:Sine.easeOut})
		
		
		});
		
		
		
		
	
	$('.yz_nav li a').mouseover(function(e){
		
		var st = $(document).scrollTop();
		var kav = $('.yz_nav .menuKav');
		var ofT = $(this).offset().top+($(this).outerHeight()/2)-(kav.outerHeight()/2)-st;
		TweenMax.to(kav,.3,{top:ofT,opacity:1,ease:Sine.easeOut})
		
		
		});
		
		
		
		
		
		
		
		
		
		
		
		
		$('.hb_nav .menu').mouseout(function(e){
			var st = $(document).scrollTop();
			var kav = $('.hb_nav .menuKav');
			if($(this).children('.current_page_item').length > 0){
				
				var ofT = $('.current_page_item a',this).offset().top+($('.current_page_item a',this).outerHeight()/2)-(kav.outerHeight()/2)-st;
				TweenMax.to(kav,.3,{top:ofT,opacity:1,ease:Sine.easeOut})
			}else if($(this).children('.current_page_parent').length > 0){
				
				var ofT = $('.current_page_parent a',this).offset().top+($('.current_page_parent a',this).outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}else{
				TweenMax.to(kav,.5,{top:0,opacity:0,ease:Sine.easeOut})
				
			}
			
			})
			
			
			
			$('.yz_nav .menu').mouseout(function(e){
				var st = $(document).scrollTop();
			var kav = $('.yz_nav .menuKav');
			if($(this).children('.current_page_item').length > 0){
				
				var ofT = $('.current_page_item a',this).offset().top+($('.current_page_item a',this).outerHeight()/2)-(kav.outerHeight()/2)-st;
				TweenMax.to(kav,.3,{top:ofT,opacity:1,ease:Sine.easeOut})
			}else if($(this).children('.current_page_parent').length > 0){
				
				var ofT = $('.current_page_parent a',this).offset().top+($('.current_page_parent a',this).outerHeight()/2)-(kav.outerHeight()/2)-st;
				kav.css({'top':ofT+'px','opacity':1});
			}else{
				TweenMax.to(kav,.5,{top:0,opacity:0,ease:Sine.easeOut})
				
			}
			
			})
		
		
	
	$('header a').click(function(e){
		
		
		
		var par = $(this).parent();
		
		if(par.has( ".sub-menu" )){
			
			
			
			
			
			$('.sub-menu').addClass('close');
			$('.sub-menu').removeClass('open');
			$('.sub-menu',par).removeClass('close');
			$('.sub-menu',par).addClass('open');
		
		$('.close').slideUp('200');
		$('.open').slideDown('200');
		
	
			
			
			
			
			
			
			
		}
	});
			//mobile menu
			
			
			$('.mobileMenuBtn').click(function(e){
				
				if(!$('.theMenu').hasClass('openendMM')){
					$('.theMenu').addClass('openendMM');
					TweenMax.to($('.theMenu'),.3,{right:'0',ease:Sine.easeInOut});
					TweenMax.to($('#masthead,.sub-menu'),.3,{right:'80%',ease:Sine.easeInOut});
				}else{
					$('.theMenu').removeClass('openendMM');
					TweenMax.to($('#masthead,.sub-menu'),.3,{right:'0',ease:Sine.easeInOut});
					TweenMax.to($('.theMenu'),.3,{right:'-80%',ease:Sine.easeInOut});
				}
				
				});
		//mobile inner menus
		
		$('.mh').click(function(e){
			e.preventDefault();
			var tp = $(this).parent();
			if(!$('.tm',tp).hasClass('openendM')){
				$('.openendM').slideUp('200');
				$('.openendM').removeClass('openendM');
				$('.tm',tp).slideDown('200');
				$('.tm',tp).addClass('openendM');
			}else{
				$('.openendM').slideUp('200');
				$('.openendM').removeClass('openendM');
				
				
			}
			
			
			});
		
	
	
	});