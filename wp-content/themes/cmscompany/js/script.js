$(function(){
	$(".ouf-1").click(function() {
		if($(this).hasClass("case")){}else{
//			console.log($(this).parent(".news-title").children("a"))
		 $(this).parent(".news-title").nextAll("ul").fadeOut(0);
		 $(this).parent(".news-title").nextAll(".ulf-1").fadeIn(0);
		 $(this).parent(".news-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });  
		 
	$(".ouf-2").click(function() {
		if($(this).hasClass("case")){}else{
		 $(this).parent(".news-title").nextAll("ul").fadeOut(0);
		 $(this).parent(".news-title").nextAll(".ulf-2").fadeIn(0);
		  $(this).parent(".news-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });	 
	 $(".ouf-3").click(function() {
		if($(this).hasClass("case")){}else{
		 $(this).parent(".news-title").nextAll("ul").fadeOut(0);
		 $(this).parent(".news-title").nextAll(".ulf-3").fadeIn(0);
		  $(this).parent(".news-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });
	 
	 
	 $('.topnav').children('.current-menu-item').children('a').addClass('won');
	 $('.topnav').children('.current-menu-parent').children('a').addClass('won');
	 if($('.won').next("ul")['length']!=0){
		 $('#sub-height').addClass('sub-height');
		 $('#sub-height').append($('.won').next("ul"));
	 }
	
	 
	 $('.category-h2').click(function(){
		 if($(this).children('.category-moreup').css('display')=='none'){
			 
			 $('.category-desc').css('display','none');
			 $('.category-moreup').css('display','none');
			 $('.category-moredown').css('display','block');
			 $(this).children('.category-moreup').css('display','block');
			 $(this).children('.category-moredown').css('display','none');
			 $(this).next('.category-desc').css('display','block');
		 }else{
			 $('.category-desc').css('display','none');
			 $('.category-moreup').css('display','none');
			 $(this).children('.category-moreup').css('display','none');
			 $(this).children('.category-moredown').css('display','block');
//			 $(this).next('.category-desc').css('display','none');
			 
		 }
	 })
	 
//	 $('.category-moredown').click(function(){
//		 $(this).hide();
////		 $(this).parent('h2').children('.category-moreup').show();
//		 $(this).next('.category-moreup').show();
//		 $(this).parent().next('div').css('display','block');
//	 })
//	 $('.category-moreup').click(function(){
//		 $(this).hide();
////		 $(this).parent('h2').children('.category-moreup').show();
//		 $(this).prev('.category-moredown').css('display','block');
//		 $(this).parent().next('div').css('display','none');
//	 })
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
})

















