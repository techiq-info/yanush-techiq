$(function(){
	
	
	$('.pressList').masonry({
  // options
  itemSelector: '.item',
   columnWidth: '.grid-sizer',
percentPosition: true
 
});
	$('#pressSubject').ddslick(
	
	{
		width:'61rem',
		onSelected: function (data) {
			
			// var ddData = $('#pressSubject').data('ddslick');
       // alert($('.dd-selected-value').val());
	   changeVal($('.dd-selected-value').val());
    }
	}
	);
	
	$('#pressSubject').change(function(e){
		
		//alert($(this).attr('value'));
		var value = $(this).attr('value');
		
		
		$('.item').each(function(index, element) {
           
		   
		    var thisLi = this;
		   
		  $(this).css({'display':'block','opacity':1});
				//layout();
					if(value!='כל הכתבות'){
			
				var subjects = $(thisLi).attr('data-category').split(',');
                
					if(($.inArray( value, subjects ))){       
					//$(thisLi).fadeOut(500,function(){});
					
					$(thisLi).css({'display':'none','opacity':0});
				//	layout();
				}
				
				
		   }else{
			   $(this).css({'display':'block','opacity':1});
			  // layout();
		   }
		   
			TweenMax.delayedCall(.1,layout);	
				
				
				//}});
				
			
			
			
		   
			
        });
		
		});
	
	});
	
	
	function changeVal(data){
				//alert($(this).attr('value'));
		var value = data;
		
		
		$('.item').each(function(index, element) {
           
		   
		    var thisLi = this;
		   
		  $(this).css({'display':'block','opacity':1});
				//layout();
					if(value!='כל הכתבות'){
			
				var subjects = $(thisLi).attr('data-category').split(',');
                
					if(($.inArray( value, subjects ))){       
					//$(thisLi).fadeOut(500,function(){});
					
					$(thisLi).css({'display':'none','opacity':0});
				//	layout();
				}
				
				
		   }else{
			   $(this).css({'display':'block','opacity':1});
			  // layout();
		   }
		   
			TweenMax.delayedCall(.1,layout);	
				
				
				//}});
				
			
			
			
		   
			
        });
	
	}
	function layout(){
		$('.pressList').masonry('layout');
	}