
	
;(function($){
	$.extend({
		//时间秒转函数
		formatSeconds:function(value){
			value = parseInt(value);
			var time;
			if (value > -1) {
				hour = Math.floor(value / 3600);
				min = Math.floor(value / 60) % 60;
				sec = value % 60;
				day = parseInt(hour / 24);
				if (day > 0) {
					hour = hour - 24 * day;
					time = day + "day " + hour + ":";
				} else time = hour + ":";
				if (min < 10) {
					time += "0";
				}
				time += min + ":";
				if (sec < 10) {
					time += "0";
				}
				time += sec;
			}
			return time;
		}
	})
})(window.jQuery);

(function($){
	//默认参数
    var defaluts = {
        target:"video",
        endtime:30000000
    };

	$.fn.extend({
		'videoplayer':function(options){

			var opts=$.extend({},defaluts,options);

			return this.each(function(index, el){

					/*----------dom操作-------*/		 
					var playVideo = $(el).find('video');  //获取video元素

					playVideo.wrap('<div class="playContent"></div>');

					// alert('in');
					playVideo.after('<div class="play-tip on"><img src="images/play_tip.png" alt="play-btn"></div>');

					playVideo.parent('.playContent').after('<div class="controls-wrap"></div>');
 
					//进度条控制
					var _timerControl=$('<div class="timebar">\
						    <div class="progress">\
							 	<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>\
							</div>\
							<div class="playicon on"></div>\
							<div class="timeinfo"><span class="currentTime">0:00:00</span>/<span class="duration">0:00:00</span></div>\
						</div>' );
					playVideo.parent('.playContent').next('.controls-wrap').append(_timerControl);

					//其他控制的外框
					var _otherControl=$('<div class="otherControl"></div>' );
					playVideo.parent('.playContent').next('.controls-wrap').append(_otherControl);

					//音量控制
					var _volumebar=$('<div class="volumeBar">\
							<span class="volume volumeicon"></span>\
							<div class="volumewrap">\
								<div class="progress">\
									<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%; height: 100%;"></div>\
								</div>\
							</div>\
						</div>');
					playVideo.parent('.playContent').next('.controls-wrap').find('.otherControl').append(_volumebar);

					//全屏控制
					var _fullScreen=$('<span class="fullScreen"><img src="images/full_screen.png" alt="play-btn"></span>');
					playVideo.parent('.playContent').next('.controls-wrap').find('.otherControl').append(_fullScreen);

					var controlsWrap =playVideo.parent('.playContent').siblings('.controls-wrap');
					var playIcon =controlsWrap.find('.playicon');  //播放按钮
					var currentTime =controlsWrap.find('.timebar .currentTime'); //当前时间
					var duration = controlsWrap.find('.timebar .duration'); //总时间
					var progress = controlsWrap.find('.timebar .progress-bar'); //进度条
					var progressBar=controlsWrap.find('.volumeBar .progress-bar');  //音量进度条滑块
					var volumeWrap=controlsWrap.find('.volumeBar .volumewrap'); //音量进度条外框
					var volumeIcon=controlsWrap.find('.volumeBar .volume'); //音量图标


					/*------------事件绑定-------*/
					//外框点击事件绑定：
					playVideo.parent('.playContent').on('click',function(event) {
						event.preventDefault();
						playControl(playVideo[0],playVideo.siblings('.play-tip'));
					}).parent().hover(function() {
						controlsWrap.removeClass('out');
					}, function() {
						controlsWrap.addClass('out');
						 
					});

					//播放暂停按钮事件绑定
					playIcon.on('click', function(event) {
						event.preventDefault();
						/* Act on the event */
						playControl(playVideo[0],playVideo.siblings('.play-tip'));
					});


					//初始化视频总时间：
					playVideo.on('loadedmetadata', function() {
						duration.text($.formatSeconds(playVideo[0].duration));
			 		 	playVideo[0].volume = 0.5;

					});

					// alert(playVideo[0].volume);
					//播放过程监听：
					playVideo.on('timeupdate', function() {
						currentTime.text($.formatSeconds(playVideo[0].currentTime)); //改变当前时间值
						progress.css('width', 100 * playVideo[0].currentTime / playVideo[0].duration + '%');  //改变播放过程进度条
						// console.log(playVideo[0].currentTime);

						if(playVideo[0].currentTime>=opts.endtime){
							bePlayend($(opts.target)[0]);
						} 
					});

					//播放结束时，设定结束状态
					playVideo.on('ended', function() {
						$('.playContent .play-tip').addClass('on');
						playIcon.addClass('on'); 
					});

					//进度条控制
					controlsWrap.find('.timebar .progress').mousedown(function(e) {
						e = e || window.event;
						updatebar(e.pageX);
					});

					//切换全屏
					controlsWrap.find('.fullScreen').on('click', function() {
						if ($(this).hasClass('cancleScreen')) {
							if (document.exitFullscreen) {
								document.exitFullscreen();
							} else if (document.mozExitFullScreen) {
								document.mozExitFullScreen();
							} else if (document.webkitExitFullscreen) {
								document.webkitExitFullscreen();
							}
							// $(opts.target)[0].controls=false;

							$(this).removeClass('cancleScreen');
							playVideo.parent('.playContent').removeClass('full-active');
							controlsWrap.removeClass('full-active');
							 
						} else {
							if (playVideo[0].requestFullscreen) {
								playVideo[0].requestFullscreen();
							} else if (playVideo[0].mozRequestFullScreen) {
								playVideo[0].mozRequestFullScreen();
							} else if (playVideo[0].webkitRequestFullscreen) {
								playVideo[0].webkitRequestFullscreen();
							} else if (playVideo[0].msRequestFullscreen) {
								playVideo[0].msRequestFullscreen();
							}
							$(this).addClass('cancleScreen');
							
							// alert('full');
							
							playVideo.parent('.playContent').addClass('full-active');
							controlsWrap.addClass('full-active');
							 
						}
						return false;
					});

					//绑定音量
					volumeWrap.on('click mousewheel DOMMouseScroll', function(e) {
						e = e || window.event;
						volumeControl(progressBar,e);
						e.stopPropagation();
						return false;
					});
			

					/*--------------功能函数---------*/
					//视频暂停与播放
					function playControl(videodom,playtip){
						if (videodom.paused) {
							videodom.play();
							playtip.removeClass('on');	
							playIcon.removeClass('on');
						} else {
							videodom.pause();
							playtip.addClass('on'); 
							playIcon.addClass('on'); 
						}
					}
					//切换进度函数
					function updatebar(x) {
						var maxduration = playVideo[0].duration; //Video 
						var positions = x - progress.offset().left; //Click pos
						var percentage = 100 * positions / controlsWrap.find('.timebar .progress').width();
						//Check within range
						if (percentage > 100) {
							percentage = 100;
						}
						if (percentage < 0) {
							percentage = 0;
						}
						
						if (maxduration * percentage / 100>=opts.endtime) {
							var endposipercent=100 * opts.endtime/playVideo[0].duration
							progress.css('width', endposipercent+'%' );
							playVideo[0].currentTime =opts.endtime;
						}else{
							progress.css('width', percentage + '%');
							playVideo[0].currentTime = maxduration * percentage / 100;
						}
					};

					//播放时长控制函数
					function bePlayend(videodom,controldom){
						videodom.pause();
						$(videodom).next('.play-tip').addClass('on'); 
						$(videodom).parent('.playContent').off('click');

						// $('.fullScreen').trigger('click');
						if (document.exitFullscreen) {
							document.exitFullscreen();
						} else if (document.mozExitFullScreen) {
							document.mozExitFullScreen();
						} else if (document.webkitExitFullscreen) {
							document.webkitExitFullscreen();
						}
						 
					}

					//音量控制函数
					function volumeControl(volumebar,e) {
						e = e || window.event;
						var eventype = e.type;
						 
						var delta = (e.wheelDelta && (e.wheelDelta > 0 ? 1 : -1)) || (e.detail && (e.detail > 0 ? -1 : 1));
						
						var positions = 0;
						var percentage = 0;
						if (eventype == "click") {
							var volOffset=volumebar.offset();
							positions = e.pageX - volOffset.left;
							console.log(e.pageX);
							console.log(volumebar.offset());
							console.log(volumebar.prop('tagname'));
							percentage = 100 * positions / $('.volumeBar .volumewrap').width();
						} else if (eventype == "mousewheel" || eventype == "DOMMouseScroll") {
							percentage = 100 * (volumebar.width() + delta) / volumeWrap.width();
						}

						if (percentage < 0) {
							percentage = 0;
							volumeIcon.attr('class', 'volume volumeicon glyphicon volume-off');
						}
						if (percentage > 50) {
							volumeIcon.attr('class', 'volume volumeicon glyphicon volume-up');
						}
						if (percentage > 0 && percentage <= 50) {
							volumeIcon.attr('class', 'volume volumeicon glyphicon volume-down');
						}
						if (percentage >= 100) {
							percentage = 100;
						}

						volumebar.css('width', percentage + '%');

						// console.log(delta);
						// console.log(percentage/100);
						playVideo[0].volume = percentage/100; 
						e.stopPropagation();
						e.preventDefault();
					}
			});
		}
	});

	//公共接口
	$.fn.videoplayer.videoState=function(msgdom,msg){
		$(msgdom).addClass('on');
		$(msgdom).find('.msg-detail').text(msg);
		return false;
	}

	//私有函数:

})(window.jQuery);
