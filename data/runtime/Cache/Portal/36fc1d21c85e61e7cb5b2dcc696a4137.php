<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html>
	<head>
		<title><?php echo ($post_title); ?> <?php echo ($site_name); ?> </title>
		<meta name="keywords" content="<?php echo ($post_keywords); ?>" />
		<meta name="description" content="<?php echo ($post_excerpt); ?>">
			<?php  function _sp_helloworld(){ echo "hello ThinkCMF!"; } function _sp_helloworld2(){ echo "hello ThinkCMF2!"; } function _sp_helloworld3(){ echo "hello ThinkCMF3!"; } ?>
	<?php $portal_index_lastnews="1,2"; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); $default_home_slides=array( array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/1.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/2.jpg", "slide_url"=>"", ), array( "slide_name"=>"ThinkCMFX2.2.0发布啦！", "slide_pic"=>$tmpl."Public/assets/images/demo/3.jpg", "slide_url"=>"", ), ); ?>
	<meta name="author" content="ThinkCMF">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

   	<!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
	<link rel="icon" href="/themes/simplebootx/Public/assets/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/themes/simplebootx/Public/assets/images/favicon.ico" type="image/x-icon">
    <link href="/themes/simplebootx/Public/assets/simpleboot/themes/simplebootx/theme.min.css" rel="stylesheet">
    <link href="/themes/simplebootx/Public/assets/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/themes/simplebootx/Public/assets/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<!--[if IE 7]>
	<link rel="stylesheet" href="/themes/simplebootx/Public/assets/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<link href="/themes/simplebootx/Public/assets/css/style.css" rel="stylesheet">
	<style>
		/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
		#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
		#backtotop:hover{color:#333}
		#main-menu-user li.user{display: none}
	</style>
	
		<style>
			#article_content img{height:auto !important}
			#article_content {word-wrap: break-word;}
    		.btn {margin-top: 33px;}
		</style>
	</head>
<body class="">
<div class="header">
	<div class="top-search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 title">PROFESSIONAL IOT SOLUTION PROVIDER</div>
			<div class="col-xs-12 col-sm-6">
				<form action="###" method="get" class="topsearch-form">
					<input type="text" placeholder="Search" class="key-txt inblockm" /><input type="button" class="search-btn inblockm" /><span class="glyphicon glyphicon-search btn-bg" aria-hidden="true"></span>
				</form>
			</div>
		</div>
	</div>
	</div>
	<div class="container-fluid header-nav">
		<div class="row">
			<div class="col-md-12">
				<a href="/" class="top-logo"><img src="images/logo_wz.png" alt=""></a>
				<div class="navbar-header navbar-default" style="background: transparent;">
			        <button type="button" class="navbar-toggle" data-toggle="collapse"
			                data-target="#example-navbar-collapse">
			            <span class="sr-only">切换导航</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			        </button>						        
			    </div>
                <div class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="main-nav clearfix">					
						<li><a href="<?php echo U('Company/about');?>">COMPANY</a></li>
						<li><a href="<?php echo U('Product/productList');?>">PRODUCTS</a></li>
						<li><a href="<?php echo U('Company/tracker');?>">TRACKING SYSTEM</a></li>
						<li><a href="<?php echo U('Solution/solutionList');?>">SOLUTION</a></li>
						<li><a href="<?php echo U('Company/contact');?>">CONTACT US</a></li>
					</ul>
				</div>
			</div>				
		</div>
	</div>					
</div>
<div class="container tc-main">
	<div class="row">
		<div class="span9">
			
			<div class="tc-box first-box article-box">
		    	<h2><?php echo ($post_title); ?></h2>
		    	<div class="article-infobox">
		    		<span><?php echo ($post_date); ?> by <?php echo ((isset($user_nicename) && ($user_nicename !== ""))?($user_nicename):$user_login); ?></span>
		    		<span>
		    			<a href="javascript:;"><i class="fa fa-eye"></i><span><?php echo ($post_hits); ?></span></a>
						<a href="<?php echo U('article/do_like',array('id'=>$article_id));?>" class="js-count-btn"><i class="fa fa-thumbs-up"></i><span class="count"><?php echo ($post_like); ?></span></a>
						<a href="<?php echo U('user/favorite/do_favorite',array('id'=>$article_id));?>" class="js-favorite-btn" data-title="<?php echo ($post_title); ?>" data-url="<?php echo leuu('article/index',array('id'=>$article_id,'cid'=>$term_id));?>" data-key="<?php echo sp_get_favorite_key('posts',$article_id);?>">
							<i class="fa fa-star-o"></i>
						</a>
					</span>
		    	</div>
		    	<hr>
		    	<?php echo ($test); ?>

		    	<div id="article_content">
		    	<?php echo ($post_content); ?>
		    	</div>
		    	 
                <?php if(!empty($post_source)): ?><div>
                        <b>注：本文转载自<?php echo ($post_source); ?>，转载目的在于传递更多信息，并不代表本网赞同其观点和对其真实性负责。如有侵权行为，请联系我们，我们会及时删除。</b>
                    </div><?php endif; ?>
		    	<div>
					<?php if(!empty($prev)): ?><a href="<?php echo leuu('article/index',array('id'=>$prev['object_id'],'cid'=>$prev['term_id']));?>" class="btn btn-primary pull-left">上一篇</a><?php endif; ?>
					<?php if(!empty($next)): ?><a href="<?php echo leuu('article/index',array('id'=>$next['object_id'],'cid'=>$next['term_id']));?>" class="btn btn-warning pull-right">下一篇</a><?php endif; ?>

	<!-- 生成详情页二维码 -->
    	           <!--  <script type="text/javascript" src="/themes/simplebootx/Public/assets/js/qrcode.min.js"></script>
                           <div id="qrcode" style="width: 100px;margin:0 auto"></div>
           					<script type="text/javascript">
                               var qrcode = new QRCode(document.getElementById("qrcode"), {
                               width : 100,
                               height : 100
                               });
                               function makeCode () {		
                               qrcode.makeCode("http://<?php echo ($_SERVER['HTTP_HOST']); echo ($_SERVER['REQUEST_URI']); ?>");
                               }
                               makeCode();
                               </script>
       					<div class="clearfix"></div> -->

				</div>
		    	
		    	
		    	<?php echo hook('comment',array( 'post_id'=>$article_id, 'post_table'=>'posts', 'post_title'=>$post_title ));?>
		    </div>
		    
		    <?php $ad=sp_getad("portal_article_bottom"); ?>
			<?php if(!empty($ad)): ?><div class="tc-box">
	        	<div class="headtitle">
	        		<h2>赞助商</h2>
	        	</div>
	        	<div>
		        	<?php echo ($ad); ?>
		        </div>
			</div><?php endif; ?>
		    
		</div>
		<div class="span3">
			<div class="tc-box first-box">
				<div class="headtitle">
	          		<h2>分享</h2>
	          	</div>
	          	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{},"image":{"viewList":["weixin","tsina","qzone","tqq","renren"],"viewText":"分享到：","viewSize":"32"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","tqq","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
        	</div>
        	
        	<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>热门文章</h2>
	        	</div>
	        	<div class="ranking">
	        		<?php $hot_articles=sp_sql_posts("cid:$portal_hot_articles;field:post_title,post_excerpt,object_id,smeta,term_id;order:post_hits desc;limit:5;"); ?>
		        	<ul class="unstyled">
		        		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $top=$key<3?"top3":""; ?>
							<li class="<?php echo ($top); ?>"><i><?php echo ($key+1); ?></i><a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo leuu('article/index',array('id'=>$vo['object_id'],'cid'=>$vo['term_id']));?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新加入</h2>
	        	</div>
	        	<?php $last_users=sp_get_users("field:*;limit:0,8;order:create_time desc;"); ?>
	        	<ul class="list-unstyled tc-photos margin-bottom-30">
	        		<?php if(is_array($last_users)): foreach($last_users as $key=>$vo): ?><li>
	                    <a href="<?php echo U('user/index/index',array('id'=>$vo['id']));?>">
	                    <img alt="" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>">
	                    </a>
                    </li><?php endforeach; endif; ?>
                </ul>
			</div>
			
			<div class="tc-box">
	        	<div class="headtitle">
	        		<h2>最新评论</h2>
	        	</div>
	        	<div class="comment-ranking">
	        		<?php $last_comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;"); ?>
	        		<?php if(is_array($last_comments)): foreach($last_comments as $key=>$vo): ?><div class="comment-ranking-inner">
	                        <i class="fa fa-comment"></i>
	                        <a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?>:</a>
	                        <span><?php echo ($vo["content"]); ?></span>
	                        <a href="/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
	                        <span class="comment-time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span>
	                    </div><?php endforeach; endif; ?>
                </div>
			</div>
        	
		</div>
		
	</div>
              
<div class="footer">
		<div class="footer-con1">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-3">
						<dl> 
							<dt>General</dt>
							<dd><a href="###">About Us</a></dd>
							<dd><a href="###">Leadership</a></dd>
							<dd><a href="###">News</a></dd>
							<dd><a href="###">Successful Cases</a></dd>
							<dd><a href="###">Contact</a></dd>
						</dl>
					</div>
					<div class="col-xs-6 col-sm-3">
						<dl>
							<dt>Product Portfolio</dt>
							<dd><a href="###">Vehicle GPS Tracker</a></dd>
							<dd><a href="###">Personal GPS Tracker</a></dd>
							<dd><a href="###">Pets GPS Tracker</a></dd>						 
							<dd><a href="###">Asset GPS Tracker</a></dd>						 
							<dd><a href="###">Car Electronics</a></dd>						 
						</dl>
					</div>
					<div class="col-xs-6 col-sm-3">
						<dl>
							<dt>Service</dt>
							<dd><a href="###">Technical Support</a></dd>
							<dd><a href="###">Contact Us</a></dd>						 
						</dl>
					</div>
					 
				</div>
			</div>
		</div>
		<div class="footer-con2">
			<div class="container">
				<div class="row">
					 
					<div class="col-xs-12 col-sm-4">
						<div class="bd">
							<span>Head Office:</span>
							<p>6/F Jianxing Technology Building,Nanshan District,Shenzhen,China.</p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="bd">
							<span>Factory:</span>
							<p>Thinkpower Building,Hongdehui Industrial Park,Longgang District,Shenzhen,China.</p> 
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="bd">
							<span>NanJing Soft R&D Dept.:</span>
							<p>801 Room,Sunny World 2,Jianye District,Nanjing,Jiangshu Province,China.</p> 
						</div>
					</div>
				</div>
				<div class="foot-logo"><img src="images/foot_logo.png" alt=""></div>
			</div>
		</div>
		<div class="footer-con3">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<p class="rights">© 2016 THINKPOWER,ALL RIGHTS RESERVED.</p>				 
					</div>
					<div class="col-xs-12 col-sm-6">
						 
					</div>
				</div>
			</div>
		</div>	
		<span class="go-top"></span>	
	</div>
	<!-- common -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/tool.js"></script>
	<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="plugins/slick/slick.min.js"></script>
	<!-- <script src="js/jquery.nicescroll.js"></script> -->
	<script type="text/javascript" src="plugins/jquery.mousewheel.js"></script>
	<script src="js/main.js"></script>
</div>

<script type="text/javascript">
//全局变量
var GV = {
    ROOT: "/",
    WEB_ROOT: "/",
    JS_ROOT: "public/js/"
};
</script>
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="/public/js/jquery.js"></script>
   <script src="/public/js/wind.js"></script>
   <script src="/themes/simplebootx/Public/assets/simpleboot/bootstrap/js/bootstrap.min.js"></script>
   <script src="/public/js/frontend.js"></script>
<script>
$(function(){
	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
	
	$("#main-menu li.dropdown").hover(function(){
		$(this).addClass("open");
	},function(){
		$(this).removeClass("open");
	});
	
	$.post("<?php echo U('user/index/is_login');?>",{},function(data){
		if(data.status==1){
			if(data.user.avatar){
				$("#main-menu-user .headicon").attr("src",data.user.avatar.indexOf("http")==0?data.user.avatar:"<?php echo sp_get_image_url('[AVATAR]','!avatar');?>".replace('[AVATAR]',data.user.avatar));
			}
			
			$("#main-menu-user .user-nicename").text(data.user.user_nicename!=""?data.user.user_nicename:data.user.user_login);
			$("#main-menu-user li.login").show();
			
		}
		if(data.status==0){
			$("#main-menu-user li.offline").show();
		}
		
		/* $.post("<?php echo U('user/notification/getLastNotifications');?>",{},function(data){
			$(".nav .notifactions .count").text(data.list.length);
		}); */
		
	});	
	;(function($){
		$.fn.totop=function(opt){
			var scrolling=false;
			return this.each(function(){
				var $this=$(this);
				$(window).scroll(function(){
					if(!scrolling){
						var sd=$(window).scrollTop();
						if(sd>100){
							$this.fadeIn();
						}else{
							$this.fadeOut();
						}
					}
				});
				
				$this.click(function(){
					scrolling=true;
					$('html, body').animate({
						scrollTop : 0
					}, 500,function(){
						scrolling=false;
						$this.fadeOut();
					});
				});
			});
		};
	})(jQuery); 
	
	$("#backtotop").totop();
	
	
});
</script>


</body>
</html>