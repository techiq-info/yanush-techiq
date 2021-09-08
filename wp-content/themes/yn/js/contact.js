var mh;
$(function(e){
	
	
	 $('.forms').slick({
       'rtl': true,
		 'draggable':false,
		 'adaptiveHeight':true
      });
	
	
	
	
	
	
	$('.tabs li').click(function(e){
		
		
		
		
		$('.tabs li').removeClass('active');
		$(this).addClass('active');
		var id = $(this).attr('id').split('bt')[1];
		$('.forms').slick('slickGoTo',id);
		
		
	})
	
	
	
	
	
	
	
	$(".dd .label").mouseenter(function() {
		var dd = $(this).closest('.dd');
  $('.options',dd).css("max-height",mh+'px');
	$('.btC',dd).addClass('up');
		
});
	
	
	
		$(".dd").mouseleave(function() {
		 
  $('.options',this).css("max-height",0);
			$('.btC',this).removeClass('up');
});
	
	$('#projectdd .options li').remove();
	
	$(projects).each(function(i,e){
		
		$('#projectdd .options').append('<li tabindex="0">'+projects[i]+'</li>');
		
	});
	
	$('#projectdd .options').on('click','li',function(){
		
	 $('#projectdd .options').css("max-height",0);
			$('#projectdd .btC').removeClass('up');
		
		$('#projectdd .label .txt').text($(this).text());
		$('#projectdd .label .txt').addClass('dark');
		$('#project').attr('value',$(this).text());
		
		
		
		
	})
	
	
	
	
	
	$('.dd .options').each(function(e,i){
		mh = $(this).outerHeight();
	$(this).css({'max-height':0})
	
		
		
	});
	
	$('.label,#projectdd .options li').keypress(function(e){
		//alert(e.keyCode);
		if(e.keyCode==13){
			$(this).click();
			$(this).mouseenter();
		}
	});
	/*$('.slick-current input[type="submit"]').on('keydown',function(e){
		
		if(e.keyCode==9){
			e.preventDefault();
		}
		//alert(e.keyCode);
		
		
	});
	
	$('.slick-current input[type="submit"]').on('keypress',function(e){
		
		if(e.keyCode==9){
			e.preventDefault();
		}
		
		
		
	});
	
	
	
	$('.slick-current input[type="submit"]').on('keyup',function(e){
		
		if(e.keyCode==9){
			e.preventDefault();
		}
		
		
		
	});*/
	
	$('body').on('keydown','.slick-current input[type="submit"]',function(e){
		
		if(e.keyCode==9){
			e.preventDefault();
		}
		//alert(e.keyCode);
		
		
	});
	
	
});