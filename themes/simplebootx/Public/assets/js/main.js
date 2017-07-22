

$(function(){
	
    //animate.css与hover触发封装
    (function(){
    	$('.ani-hover').each(function(index, el) {    		 
    		console.log($(el).attr('ani-style'));
    		$(el).hover(function() {
    			$(this).addClass($(el).attr("ani-style")+' animated');  			 
    		}, function() {
    			$(this).removeClass($(el).attr("ani-style")+' animated'); 
    		});
    	});
    })();
 
	


	//手机类型判断
	(function(){
 		var ua = navigator.userAgent.toLowerCase();
    	if (/iphone|ipad|ipod/.test(ua)) { 		 
     		console.log('苹果'); 	 
     		 
     		
    	} else {         
          	console.log('安卓');          

    	}
	})();
	

	//页面滚动导航显示隐藏
	(function(){
		$('body').on('mousewheel', function(event,delta) {
			// event.preventDefault();
			// console.log(delta);
			if (delta<0) {
				$('.header-fix .con1').css({
					'top':'-70px'
				});
			} else {
				$('.header-fix .con1').css({
					'top':'0px'
				});
			}
		});
	})();


	//首页头部视频播放
	function topVideoCt(){
		var video_con=$('.topcon .slick-video');
		video_con.slick({
			dots:true,
			arrows:false
		});
	} 
 
 	//主导航状态初始化
 	(function initMainNav(){
 		var ind=$('.active-maninav').val();
 		$('.header-nav .main-nav li').eq(ind).addClass('active');
 	})();


	if ($('.index-page').length) { //首页才需要初始化的函数 
		topVideoCt();
	}
 	
 	if ($('.zpweb-page').length) {		 
	
		$('body').bind('mousewheel',function(event, delta, deltaX, deltaY) {	     
		    // console.log(delta, deltaX, deltaY);	   
		    var wHight=$(window).height();
			var footfixTop=$('.footer').offset().top;  
			var wScrtop=$(window).scrollTop();		 
			if (wScrtop+wHight-footfixTop>=50) {
				// addMovies();	
				// actAdd();	 
			}
		});
 	}
 	/*回到顶部*/
	if(!$('.footer .go-top').length==0){
	    $('.footer .go-top').gotop();
	}
});