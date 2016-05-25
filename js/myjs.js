$(document).ready(function(){
	
	//使用stickup插件使滚动页面时导航条随之浮动在顶端
	jQuery(function($) { 
		var $replaceHeight=parseInt($('#stickup-nav').outerHeight())+25;
        	$('<div>').attr('id','replacement').css('height',$replaceHeight).insertAfter('#stickup-nav').hide();
        	var nt = !1;
        	$(window).bind('scroll',function(){
			var st = $(document).scrollTop();
			nt = nt ? nt: $('#stickup-nav').offset().top;
            		var sel=$("#stickup-nav");
            		if (nt < st) {
                		sel.css({
                    			'position': 'fixed',
                    			'top':'0px'
                		});
                		$('#replacement').show();
            		} else {
                		sel.css({
                    			'position': 'relative'
                		});
                		$('#replacement').hide();
            		}
		});
	}); 

	//处理a标签点击后带虚线框的问题
	$("a").bind("focus",function(){
		if(this.blur){ 
			this.blur();
		}
	}); 

	//设置侧边栏轮播模块自动轮播
	$('.carousel').carousel({
		//设置轮播间隔
		interval: 5000
	});

	//处理回到顶部的动画效果
	$("#back-to-top").hide();
	$(function () {
		$(window).scroll(function(){
			if ($(window).scrollTop()>100){
				$("#back-to-top").fadeIn(150);
			}
			else
			{
				$("#back-to-top").fadeOut(150);
			}
		});
		$("#back-to-top").click(function(){
			$('body,html').animate({scrollTop:0},300);
			return false;
		});
	});

	//处理img标签，使用fancybox插件
        $(".post-content img").map(function(){
                var src=$(this).attr("src");
                var alt=$(this).attr("alt");
                $(this).parent("a").children("img").unwrap;
                var img_ele=$("<img>",{
                        "class":"img-responsive center-block",
                        "src":function(){ return src; },
                        "alt":function(){ return alt; }
                });
                var a_ele=$("<a>",{
                        "class":"fancybox",
                        "rel":"group",
                        "href":function(){ return src; }
                });
                a_ele.insertAfter(this);
                a_ele.append(img_ele);
                $(this).remove();
        });
        $(".fancybox").fancybox({
                helpers : {
                        title   : {
                                type: 'outside'
                        },
                        thumbs  : {
                                width   : 50,
                                height  : 50
                        }
                }
        });
});
