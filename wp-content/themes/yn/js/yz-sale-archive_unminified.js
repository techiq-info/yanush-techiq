$(function(){
	
	
	$('input').keyup(function(e){
		
		if($('input[type="text"]').val()!=''&&$('input[type="tel"]').val()!=''&&$('input[type="email"]').val()!=''){
			
			$('.formRight input[type="submit"]').addClass('sub');
		}else{
			$('.formRight input[type="submit"]').removeClass('sub');
		}
		
		})
	
	});