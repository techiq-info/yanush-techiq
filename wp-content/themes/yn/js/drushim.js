$(function(e){
	
	$('input[type="file"]').attr('max-size','2000000'); 
	
	
	$('#clsJob').click(function(e){
		$('.bigJob').slideUp(500);
		
	});
	
	
	
	
	$('.toForm').click(function(e){
		
		
		e.preventDefault();
		
		
		$('.bigJob').slideDown(500);
		
		var body = $("html, body");
body.stop().animate({scrollTop:$('.bigJob').offset().top-100}, 500, 'swing', function() { 
  // alert("Finished animating");
});

		
		
		var title = $('h3',this).text();
		var summ = $('.aboutJob',this).attr('data-long');
		var req = $('.aboutJob',this).attr('data-req');
		
		
		
		var tl = new TimelineLite();

		
		if(!$('.bigJob').hasClass('first')){
			tl.to($('.bigJob '), 0.2, {opacity:0});
		
		}
		
		
		
		tl.append(TweenLite.delayedCall(0, function(){
			$('.bigJob').removeClass('first');
			$('.bigJob h3').html(title);
		$('.bigJob .summ').html(summ);
		$('.bigJob .requirments').html(req);
		$('#job').val(title);
			
		}));
		
		tl.to($('.bigJob'), 0.2, {opacity:1});
		
		
		
		
	});
	
	
	
	
	
	
		 $('body').on('change','input[type="file"]',function(e){
		 // alert('d');
		var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        //case 'jpg':
        case 'pdf':
        
		 var maxSize = parseInt($(this).attr('max-size'),10),
		 size = $(this).get(0).files[0].size; 
		
		 var isOk = maxSize > size;
		
           if( isOk){
			 //   alert('c');
		var fileName = e.target.value.split( '\\' ).pop();
			   var parElment =$(this).closest('.hachshara');
			//  alert('a');
		$('.ih label').text(fileName);
		   }else{
			     alert('קובץ גדול מידי. נסו קובץ אחר.');
		   }
            break;
        default:
            alert('לא ניתן להעלות קבצים מסוג זה');
            this.value='';
    }
		
		
		});
	
	
});