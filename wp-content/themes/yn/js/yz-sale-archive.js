$(function(){$("input").keyup(function(t){""!=$('input[type="text"]').val()&&""!=$('input[type="tel"]').val()&&""!=$('input[type="email"]').val()?$('.formRight input[type="submit"]').addClass("sub"):$('.formRight input[type="submit"]').removeClass("sub")})});