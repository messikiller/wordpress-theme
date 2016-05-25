$(document).ready(function(){
	$("#my-navbar > li > a").hover(function(){
		$(this).next("ul.children").slideDown("fast");
	}, function(){
		$(this).next("ul.children").hide();
	});

	$("#my-navbar > li > ul.children").hover(function(){
		$(this).show();
	}, function(){
		$(this).slideUp("fast");
	});
});
