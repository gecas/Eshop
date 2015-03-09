$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop()>200){
			$('#scrollTop').fadeIn(200);
		} else {
			$('#scrollTop').fadeOut(200);
		}
	});
	$('#scrollTop').click(function(){
		
		$('html, body').animate({ scrollTop: 0}, 1000);
	
	});
});

$(document).ready(function(){
	$(".pagination li a").live("click", function(){
  $(".pagination li a").removeClass("active");
  $(this).addClass("active")
});
});