// JavaScript Document

$(window).load(function(e){
	
	$('.csTopImage').css({'position':'fixed','margin-top':'10rem'});
	var topH = $('.csTopImage').outerHeight(true);
	$('.topDataCon').css({'margin-top':topH+'px'});
	
	
	$(document).scroll(function(e){
		
		var st = $(document).scrollTop();
		$('.csTopImage').css({'top':-st/3});
		})
	
	
	})


$(window).resize(function(e){
	$('.csTopImage').css({'position':'fixed','margin-top':'10rem'});
	var topH = $('.csTopImage').outerHeight(true);
	$('.topDataCon').css({'margin-top':topH+'px'});
	$(document).scroll();
	
	
	})


var galImages=1;

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
		responsive: [
    {
      breakpoint: 800,
      settings: {
        dots: true,
		fade:false
      
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
	
	
});