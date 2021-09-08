// JavaScript Document
$(function(){
    
    document.addEventListener( 'wpcf7mailsent', function( event ) {
   document.location.href = "http://www.yanush.co.il/%d7%aa%d7%95%d7%93%d7%94-%d7%a8%d7%91%d7%94-%d7%93%d7%a8%d7%95%d7%a9%d7%99%d7%9d/";

}, false );
    
    $('.mobileNav button').click(function(e){
      
         $('.mobileNav button').removeClass('active');
        $(this).addClass('active');
        if($(this).attr('data-index')=="form"){
             $('.jobForm').addClass('show');
        }else{
              $('.jobForm').removeClass('show');
        }
     
    })
    
    
    
    
    $('body').on('change','input[type="file"]',function(e){
		 // alert('d');
		var ext = this.value.match(/\.([^\.]+)$/)[1];
    switch(ext)
    {
        //case 'jpg':
        case 'pdf':
		
      
		 var maxSize = 10000000,
		 size = $(this).get(0).files[0].size; 
		
		 var isOk = maxSize > size;
		
           if( isOk){
			 //   alert('c');
		var fileName = e.target.value.split( '\\' ).pop();
			   var parElment =$(this).closest('.hachshara');
			//  alert('a');
		$('.fileName').text(fileName);
		   }else{
			     alert('5MB Max Please');
		   }
            break;
        default:
            alert('Please choose a different file type');
            this.value='';
    }
		
		
		});
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      var currentUrl = window.location.href;
   
	var fbShareLink = "https://www.facebook.com/sharer/sharer.php?u="+currentUrl;
	//var twitterShareLink = "http://twitter.com/intent/tweet?url="+currentUrl;
	//var imgSrc = $('#theImage img').attr('src');
	//var pinterestShareLink = "http://pinterest.com/pin/create/button/?url="+currentUrl+"&media="+imgSrc;
	
	var liShareLink="http://www.linkedin.com/shareArticle?mini=true&url=currentUrl";
	var subject = $('h1').text();
	//var mailLink = "mailto:?subject="+subject+"&body="+currentUrl+;
	$('#productFbShare').click(function(e){
		
		e.preventDefault();
		window.open(fbShareLink,'targetWindow','toolbar=no,location=no, status=no,menubar=no,scrollbars=yes,resizable=yes, width=700, height=500');
	});
    $('#mailShare').click(function(e){
		
		e.preventDefault();
		 document.location.href = mailLink;
	});
    
    $('#productInShare').click(function(e){
		
		e.preventDefault();
		window.open(liShareLink,'targetWindow','toolbar=no,location=no, status=no,menubar=no,scrollbars=yes,resizable=yes, width=700, height=500');
	});
});
    
    
