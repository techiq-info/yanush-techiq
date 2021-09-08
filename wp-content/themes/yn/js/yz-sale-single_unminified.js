// JavaScript Document
var galImages=1;
$(window).resize(function(e){
		$('.aptdes').css({'height':$('.currentAptDet').outerHeight(true)});
	
	
	});
	$(window).load(function(e){
		
		$('.aptdes').css({'height':$('.currentAptDet').outerHeight(true)});
		});
$(function () {

	$('.galCon img').each(function(index, element) {
       
		var galNumText;
		if(galImages<10){
			galNumText = '0'+galImages;
		}else{
				galNumText = ''+galImages;
		}
		
		if(galImages==1){
			$('.galNums').append('<span class="galNumItem currentGalImage" id="bt'+index+'">'+galNumText+'</spna>');
		}else{
			$('.galNums').append('<span class="galNumItem" id="bt'+index+'">'+galNumText+'</spna>');
		}
		
		
		
		galImages++;
		
    });
	
	
	
	$('.galCon').slick({
		fade:true,
		rtl:true,
		autoplay:true,
		speed:1000, responsive: [
    {
      breakpoint: 800,
	    settings: {
			dots:true
		}
	}
	]
		
   
  });
	
	$('.galCon').on('afterChange', function(event, slick, currentSlide, nextSlide){
 		var nextSlide =currentSlide;
   $('.galNumItem').removeClass('currentGalImage');
   $('#bt'+nextSlide).addClass('currentGalImage');
});
	
	
	$('.galNums').on('click', '.galNumItem', function(e) {
		var nextSlide = $(e.currentTarget).attr('id').split('bt')[1];
   $('.galNumItem').removeClass('currentGalImage');
   $(e.currentTarget).addClass('currentGalImage');
   $('.galCon').slick('slickGoTo',nextSlide);
});
	
	
	$('.aptName').click(function(e){
		
		if(!$(this).hasClass('currentAptName')){
			$('.aptName').removeClass('currentAptName');
			$(this).addClass('currentAptName');
			
			var numApt = $(this).attr('id').split('aptName')[1];
			TweenMax.to($('.currentAptDet'),.3,{opacity:0,onComplete:function(){
				
				$('.currentAptDet').removeClass('currentAptDet');
				$('#apt'+numApt).addClass('currentAptDet');
				$('.aptDet').css({'position':'absolute'});
				$('.aptdes').css({'height':$('.currentAptDet').outerHeight(true)});
				TweenMax.to($('.currentAptDet'),.3,{opacity:1});
				
				}});
		}
		
		
		})
	
});