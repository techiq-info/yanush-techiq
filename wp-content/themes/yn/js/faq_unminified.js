$(function(){



$('.mq').click(function(e){
	
	
	var par = $(this).parent();
	if($('.answer',par).hasClass('opened')){
		$('.answer',par).removeClass('opened');
		$('.answer',par).slideUp('200');
		
	}else{
		$('.answer',par).addClass('opened');
		$('.answer',par).slideDown('200');
	}
	
	
	})

});