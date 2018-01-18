$(function(){
	$(".ouf-1").click(function() {
		if($(this).hasClass("case")){}else{
		 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
		 $(this).parent(".sixnews-title").next('div').children(".ulf-1").fadeIn(0);
		 $(this).parent(".sixnews-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });  
		 
	$(".ouf-2").click(function() {
		if($(this).hasClass("case")){}else{
		 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
		 $(this).parent(".sixnews-title").next('div').children(".ulf-2").fadeIn(0);
		  $(this).parent(".sixnews-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });	 
	 $(".ouf-3").click(function() {
		if($(this).hasClass("case")){}else{
		 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
		 $(this).parent(".sixnews-title").next('div').children(".ulf-3").fadeIn(0);
		  $(this).parent(".sixnews-title").children("a").removeClass("case")
		 $(this).addClass("case")
		}
		 });
	 $(".ouf-4").click(function() {
		 if($(this).hasClass("case")){}else{
			 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
			 $(this).parent(".sixnews-title").next('div').children(".ulf-4").fadeIn(0);
			 $(this).parent(".sixnews-title").children("a").removeClass("case")
			 $(this).addClass("case")
		 }
	 });
	 $(".ouf-5").click(function() {
		 if($(this).hasClass("case")){}else{
			 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
			 $(this).parent(".sixnews-title").next('div').children(".ulf-5").fadeIn(0);
			 $(this).parent(".sixnews-title").children("a").removeClass("case")
			 $(this).addClass("case")
		 }
	 });
	 $(".ouf-6").click(function() {
		 if($(this).hasClass("case")){}else{
			 $(this).parent(".sixnews-title").next('div').children("ul").fadeOut(0);
			 $(this).parent(".sixnews-title").next('div').children(".ulf-6").fadeIn(0);
			 $(this).parent(".sixnews-title").children("a").removeClass("case")
			 $(this).addClass("case")
		 }
	 });
	 
	 
	 $('.nav .topnav li').hover(
			 function(){
//				 console.log($(this).attr('class').indexOf('menu-item-has-children'));
				 if($(this).attr('class').indexOf('menu-item-has-children')>0){
					 $(this).addClass("won");
				 }
				 $(this).children(".sub-menu").show();
				 $(this).children(".sub-menu").addClass("sub-ul");
			 },function(){
				 $(this).removeClass("won");
				 $(this).children(".sub-menu").hide();
				 $(this).children(".sub-menu").removeClass("sub-ul");
			 }
	 );
	 
	/* 
	 $('.topnav').children('.current-menu-item').children('a').addClass('won');
	 $('.topnav').children('.current-menu-parent').children('a').addClass('won');
	 if($('.won').next("ul")['length']!=0){
		 $('#sub-height').addClass('sub-height');
		 $('#sub-height').append($('.won').next("ul"));
	 }*/
	
	 
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
	 
	 
	 
	 
	 
	//分类页ajax翻页
	 if(!$(".load_more a").length){
	 	$(".load_more").remove();  //判断是否含有下一页
	 }
	 //是否正在加载
	 var onloading = false;
	 $(".load_more a").on('click',function(){
		 if(onloading){
		 		return false;
		 	}else{
		 		
		 		$.ajax({
		 			type: "get",
		 			url: $(this).attr("href"),
		 			beforeSend: function(xhr) {
		 				xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
		 				$(".load_more").find("a").text("加载中...");
		 				$(".load_more em").show();
		 				onloading = true;
		 			},
		 			error: function(request) {
		 				console.log(request.responseText);
		 			},
		 			statusCode: {
		 			     404: function() {
		 			     	console.log("404");
		 			     }
		 			},
		 			success: function(data) {
		                                //获取文章所在的DOM及下一页链接
		 				console.log(data);
		 				var result = $(data).find("#article-list .article-contain");
		 				var nextHref = $(data).find(".load_more a").attr("href");
		 				// 渐显新内容
		 				$("#article-list").append(result.fadeIn(400));
		 				$(".load_more em").hide();		
		 				$(".load_more").find("a").text("加载更多...");
		 				if (nextHref != undefined) {
		 					$(".load_more a").attr("href", nextHref);
		 				} else {  // 若没有链接，即为最后一页，则移除导航
		 					$(".load_more").remove();
		 				}
		 				onloading = false;
		 			}
		 		});
		 	}
		 	return false;
	 })
	

	 // 给浏览器窗口绑定 scroll 事件
	 /*$(window).on("scroll",function() {
	 	var windowH = $(window).height();
	 	var documentH = $(document).height();
	 	// 判断窗口的滚动条是否接近页面底部
	 	if ($(document).scrollTop() + windowH > documentH - 100) {
	 		if(onloading){
	 			return false;
	 		}else{
	                         //滚动到页面底部时，自动触发点击下一页
	 			$(".load_more a").click();
	 		}
	 	}
	 });*/
	 
	
	 
//表单提交
		// 获取表单
		var form = $('#ajax-contact');
		// 获取显示消息的div
		var formMessages = $('#form-messages');
		// 为联系表单创建事件监听

		$(form).submit(function(e) {


			var phone=$("#tel").val();
			var re = /^1\d{10}$/;
			if (re.test(phone)) {
				
		    } else {
		    	$('#tel').css('border','1px solid red');
		        return false;
		    }
			
			// 阻止浏览器直接提交表单
			e.preventDefault();

			// 序列化表单数据

//			var formData = $(form).serialize();
			
			// 使用AJAX提交表单
//				console.log($("input[name='industry']:checked").val());
				
				jQuery.post(
						$(form).attr('action'),
					       {
					            action : 'mess',
					            cname : $("#cname").val(),
					            industry : $("input[name='industry']:checked").val(),
					            name : $("#name").val(),
					            addr : $("#addr").val(),
					            code : $("#code").val(),
					            tel : $("#tel").val(),
					            email : $("#email").val(),
					            web : $("#web").val(),
					            message : $("#message").val(),
					            wlf : $("input[name='wlf']:checked").val(),
					            date : $('#date').val()
					       },
					       function( response ) {
					    	// 确保formMessages的div有“success”这个类

								$('#form-messages').removeClass('error');

								$('#form-messages').addClass('success');

//								console.log(response);

								// 设置消息文本
								$("#cname").val("");
								$("#name").val("");
								$("#addr").val("");
								$("#code").val("");
								$("#tel").val("");
								$("#email").val("");
								$("#web").val("");
								$("#message").val("");
								$('#date').val('');

								$(formMessages).html(response);
								$(formMessages).fadeOut(5000);
								return false;
					       }
					);
				return false;

			/*$.ajax({

				type: 'POST',

				url: $(form).attr('action'),

				
				
				{
				action : 'myajax-submit',
	            postID : MyAjax.postID
	            }

			})

			.done(function(response) {
				// 确保formMessages的div有“success”这个类

				$('#form-messages').removeClass('error');

				$('#form-messages').addClass('success');

				console.log(response);

				// 设置消息文本

				$(formMessages).html(response);

	 

				// 清除表单

				$('#name').val('');


			})

			.fail(function(data) {

				console.log("false");
				// 确保formMessages的div有“error”这个类

				$(formMessages).removeClass('success');

				$(formMessages).addClass('error');

	 

				// 设置消息文本

				if (data.responseText !== '') {

					$(formMessages).text(data.responseText);

				} else {

					$(formMessages).text('糟糕！发生错误，无法发送邮件。');

				}

			});*/

	 

		}); 
	 
	 
	 
	 
	 
	 
	 
})

















