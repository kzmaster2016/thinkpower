<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="player video vidmate movie mxplayer vlc Bollywood">
    <meta name="description" content="All-around high definition media player">
	<link rel="icon" href="images/ico_logo.png" type="image/x-icon" />
	<base href="/themes/simplebootx/Public/assets/">
	<title>About Us</title>	
	<!--common-->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/response.css">
	<!-- slick -->
	<!-- <link rel="stylesheet" type="text/css" href="plugins/slick/slick.css"> -->
	<!-- fullpage -->
	<!-- <link rel="stylesheet" type="text/css" href="plugins/fullpage/fullpage.css"> -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!--[if lt IE 9]>
  	<script src="plugins/html5shiv.js"></script>
  	<script src="plugins/respond.min.js"></script>
  	<![endif]-->
  	<style type="text/css">
	.company-nav-wrap{background: #eaeaea;}
  	</style>
  	<script type="text/javascript">

  	</script>

</head>
<body class="pcbody about-page">
	<input type="hidden" value="0" class="active-maninav">
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
						<li><a href="<?php echo U('Product/productList',array('term_id'=>1));?>">PRODUCTS</a></li>
						<li><a href="<?php echo U('Company/tracker');?>">TRACKING SYSTEM</a></li>
						<li><a href="<?php echo U('Solution/solutionList');?>">SOLUTION</a></li>
						<li><a href="<?php echo U('Company/contact');?>">CONTACT US</a></li>
					</ul>
				</div>
			</div>				
		</div>
	</div>					
</div>

	<div class="banner-con">
		<img src="images/banner/company.jpg" alt="">
	</div>

	<div class="company-con">
		<div class="company-nav-wrap">
		<div class="container">
			<div class="row">
				<ul class="company-nav">
					<li class="active"><a href="<?php echo U('Company/about');?>">About</a></li>
					<li><a href="<?php echo U('Company/leader');?>">Leadship</a></li>
					<li><a href="<?php echo U('News/index');?>">News</a></li>
					<li><a href="<?php echo U('Company/successfulCase');?>">Successful Case</a></li>
					<li><a href="###">Support</a></li>
				</ul>
			</div>
		</div>
		</div>
		<div class="container-fluid about-con">
			<div class="row">
				<div class="bg"></div>
				<div class="col-xs-12 col-sm-6 about-l">

					<div class="about-detail">
						<h3 class="title">ABOUT</h3>
						<p>
							<strong>TP</strong>is dedicated to be the leading provider of total solution for Intelligent Transportation System (ITS), focusing on GPS tracking field.
						</p>
						<p class="big-tip">
							Reliable product, fast reaction and customization solution, is our core competitiveness. 
						</p>
						<p>Think Power is helping customer to collect, transmit and analyze data for management, covering vehicle, pets, person and asset.</p>
					</div>
					<div class="certif-list">
						<ul class="clearfix">
							<li><img src="images/picpng/certif_1.png" alt=""></li>
							<li><img src="images/picpng/certif_2.png" alt=""></li>
							<li><img src="images/picpng/certif_3.png" alt=""></li>
							<li><img src="images/picpng/certif_4.png" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 about-r">
					<div class="tp-vital">
						<h3>Think Power Vitals</h3>
						<ul class="vital-tips">
							<li>10- year experience in car electronics manufacturing field</li>
							<li>Offering software & hardware customization solution for M2M</li>
							<li>Fast reaction with professional FAE support</li>
							<li>Factory with ISO/TS 16949 certificate</li>
							<li>Branches in Shenzhen, Nanjing, Hong Kong SAR</li>
							<li>Developed 3G GPS tracker as first batch suppliers in market</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		<div class="company-about-ban about-bottom-banner">
			<img src="images/bg/about_1.jpg" alt="">
			<h2 class="alignm centercon">Why Choose Us?</h2>
		</div>
		<div class="why-choose">
			<div class="container">
				<div class="row">
					<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'],true); $day=$vo['post_date']; ?>

					<div class="col-sm-4 reason-item">
						<h4><?php echo ($vo["post_title"]); ?></h4>
						<a href="<?php echo U('News/article',array('cid'=>$vo['term_id'],'id'=>$vo['object_id']));?>">
							<img src="images/tippng/tip_3.png" alt="">
						</a>
						<div class="resimg-con">
							<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="">
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>					
				</div>
			</div>
		</div>
	</div>

	<div class="index-con3">
	<div class="container index-message">
		<div class="row">
			<div class="col-xs-12">
				<header class="title">				
					<h1>Message</h1>
					<p><span>Mail:&nbsp;thinkpower@cntinkpower.com</span><span>Tel:&nbsp;+86-0755-33985960</span></p>					
				</header>		
				<form action="<?php echo U('api/guestbook/addmsg');?>" method="post" class="message-form">
					<input type="hidden" name="type" value="1">
					<input type="text" name="mainname" placeholder="Name">
					<input type="text" name="company" placeholder="Company">
					<input type="text" name="email" placeholder="Email">
					<textarea name="msg" id="" class="message" placeholder="Message"></textarea>
					<input type="submit" value="Submit" class="submit-btn">
				</form>		 
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
							<dd><a href="<?php echo U('Company/about');?>">About Us</a></dd>
							<dd><a href="<?php echo U('Company/leader');?>">Leadership</a></dd>
							<dd><a href="<?php echo U('News/index');?>">News</a></dd>
							<dd><a href="<?php echo U('Company/successfulCase');?>">Successful Cases</a></dd>
							<dd><a href="<?php echo U('Company/contact');?>">Contact</a></dd>
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
							<dd><a href="<?php echo U('Company/contact');?>">Contact Us</a></dd>						 
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

	 
</body>
</html>