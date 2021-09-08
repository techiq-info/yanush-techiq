var hbMenuOpened;
var currentMediaItem;
var totalMediaItems;


function closeLightBox(){
	TweenMax.to($('.lightBox'),.3,{opacity:0,display:'none',onComplete:function(){
		
		$('.theCon').removeClass('theConVid');
		$('.theCon').html('');
		
		
		}});
	
}


function openLightBox(type,data,txt){
	
TweenMax.to($('.lightBox'),.3,{opacity:1,display:'block'});


switch (type){
			case 'img':
			$('.theCon').html(' <div class="cls"></div><div class="next"></div><div class="prev"></div><img src="'+data+'">');
			
			break;
			
			case 'vid':
			
			$('.theCon').html( '<div class="cls"></div><div class="next"></div><div class="prev"></div>'+data);
			$('.theCon').addClass('theConVid');
			break;
	
}

$('.lightBoxContent p').text(txt);
$('.theNum').text(currentMediaItem+'/'+totalMediaItems);

}

$(function () {
	
	if($('.hb_menu').hasClass('closedHbMenu')){
		hbMenuOpened=false;
	}else{
			hbMenuOpened=true;
	}
	
	
	$('.theCon').on('click', '.cls', function() {
		closeLightBox();
		});
		
		
		
	totalMediaItems = $('.mediaLibrary').length;

$('.hb_menu .close').click(function(){
	
	
	TweenMax.set($('.fk'), {transformOrign:'0% 0%'});
		TweenMax.set($('.lk'), {transformOrign:'100% 0%'});
		if(hbMenuOpened){
			hbMenuOpened=false;
			$('.hb_menu').addClass('closedHbMenu');
		TweenMax.to($('.hb_menu'),.3,{right:'-29.3rem',ease:Sine.easeOut});
		TweenMax.to($('.fk'),.3,{rotation:0,top:0});
	TweenMax.to($('.lk'),0.3,{rotation:0,bottom:0});
	TweenMax.to($('.mk'),.3,{opacity:1});
		}else{
			hbMenuOpened=true;
			
		TweenMax.to($('.hb_menu'),.3,{right:'0',ease:Sine.easeOut,onComplete:function(){$('.hb_menu').removeClass('closedHbMenu');}});
		TweenMax.to($('.fk'),.3,{rotation:45,top:'9px'});
	TweenMax.to($('.lk'),.3,{rotation:-45,bottom:'9px'});
	TweenMax.to($('.mk'),.3,{opacity:0});
		}
		
		
		
		});
		
		
		
		
	$('.mediaLibrary').click(function(e){
		
		
		currentMediaItem = $(this).attr('id').split('item')[1];
		
		var mediaType = $(this).attr('data-type');
		
		
		switch (mediaType){
			
			case 'img':
			openLightBox(mediaType,$(this).attr('data-imgUrl'),$(this).attr('data-text'));
			
			break;
			
			case 'vid':
			openLightBox(mediaType,$(this).attr('data-videoDt'),$(this).attr('data-text'));
			
			break;
			
		}
		
		
		
		});	
		
		
		
		
		
		
		
			$('.theCon').on('click', '.next', function() {
		
		
			
		
		if(currentMediaItem<totalMediaItems){
			currentMediaItem++;
			
		}else{
			currentMediaItem=1;
		}
		
			var nextItem = $('#item'+currentMediaItem);
			var mediaType = nextItem.attr('data-type');
			var txt = nextItem.attr('data-text');
			var data;
			TweenMax.to($('.lightBoxContent'),.3,{opacity:0,onComplete:function(){
			
			switch (mediaType){
			case 'img':
			$('.theCon').removeClass('theConVid');
			data = nextItem.attr('data-imgUrl');
			$('.theCon').html(' <div class="cls"></div><div class="next"></div><div class="prev"></div><img src="'+data+'">');
			
			break;
			
			case 'vid':
			$('.theCon').addClass('theConVid');
			data = nextItem.attr('data-videoDt');
			$('.theCon').html( '<div class="cls"></div><div class="next"></div><div class="prev"></div>'+data);
			$('.theCon').addClass('theConVid');
			break;
	
}
				
		TweenMax.to($('.lightBoxContent'),.3,{opacity:1});		
				$('.lightBoxContent p').text(txt);
				$('.theNum').text(currentMediaItem+'/'+totalMediaItems);
				
				}});
				
				
				
				
				
			
				
		
		
		
		});
		
		
		
		
		
		
		
		
			$('.theCon').on('click', '.prev', function() {
		
	
		
		if(currentMediaItem>1){
			currentMediaItem--;
			
		}else{
			currentMediaItem=totalMediaItems;
		}
		
			var nextItem = $('#item'+currentMediaItem);
			var mediaType = nextItem.attr('data-type');
			var txt = nextItem.attr('data-text');
			var data;
			TweenMax.to($('.lightBoxContent'),.3,{opacity:0,onComplete:function(){
			
			switch (mediaType){
			case 'img':
			$('.theCon').removeClass('theConVid');
			data = nextItem.attr('data-imgUrl');
			$('.theCon').html(' <div class="cls"></div><div class="next"></div><div class="prev"></div><img src="'+data+'">');
			
			break;
			
			case 'vid':
			$('.theCon').addClass('theConVid');
			data = nextItem.attr('data-videoDt');
			$('.theCon').html( '<div class="cls"></div><div class="next"></div><div class="prev"></div>'+data);
			$('.theCon').addClass('theConVid');
			break;
	
}
				
		TweenMax.to($('.lightBoxContent'),.3,{opacity:1});		
				
				$('.lightBoxContent p').text(txt);
				$('.theNum').text(currentMediaItem+'/'+totalMediaItems);
				}});
	
		
		
		});
		
		
		
		
});