$(function(){
	
	
	$('.teamMemberImageCon').click(function(e){
		
		var memberNum = $(this).parent().attr('id').split('member')[1];
		$('.member').removeClass('activeMember');
		
		TweenMax.to($('.member .teamMemberDetailsCon'),.3,{opacity:0,display:'none',onComplete:function(){
			$('#member'+memberNum).addClass('activeMember');
			TweenMax.to($('#member'+memberNum+' .teamMemberDetailsCon'),.3,{opacity:1,display:'block'});
			
			}});
		
		})
	
	
	});