$(function(){
	
	
	$('.bulletHead .trb').click(function(e){
		
		var pressedNum =$(this).attr('id').split('trb')[1];
		$('.bulletHead .trb').removeClass('currentHead');
		$(this).addClass('currentHead');
		
		$('.currentPrue').slideUp('200',function(e){
			$('.currentPrue').removeClass('currentPrue');
			
			$('#prut'+pressedNum).slideDown('200',function(){
				
				$('#prut'+pressedNum).addClass('currentPrue');
				
				});
			})
		
		})
	
	
	});