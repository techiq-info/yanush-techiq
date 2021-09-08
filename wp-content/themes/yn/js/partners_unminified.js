$(function(){
	
	
	
	
	$('.partnerName').click(function(e){
		
		var clicked = $(this).attr('id').split('typeName')[1];
		
		$('.partnerName').removeClass('activePartnerName');
		$(this).addClass('activePartnerName');
		$('.activeListsName').fadeOut(500,function(){
			
			$('.listNames').removeClass('activeListsName');
			
			
			$('#typeList'+clicked).fadeIn(500,function(){$('#typeList'+clicked).addClass('activeListsName');});
			});
		
		})
	
	});