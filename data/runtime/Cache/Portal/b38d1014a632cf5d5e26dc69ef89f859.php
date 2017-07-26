<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($site_seo_description); ?>">
	<link rel="icon" href="images/ico_logo.png" type="image/x-icon" />
	<base href="/themes/simplebootx/Public/assets/">
	<title><?php echo ($site_name); ?></title>	
	<!--common-->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
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
		.index-page>.header{position: absolute;top: 0;left: 0;width: 100%;background:rgba(0,0,0,0.7);}
  	</style>
  	<script type="text/javascript">
  	</script>
	
</head>
<body class="pcbody index-page"> 
	<input type="hidden" value="20" class="active-maninav">
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

	<div class="topcon index-con">
		<div class="slick-video">
			<img src="images/banner/index_banner1.jpg" alt="">							
			<img src="images/banner/index_banner2.jpg" alt="">							
		</div>
	</div>

	<div class="index-con1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 index-product">
					<header class="title">
						<img src="images/tippng/tip_1.png" alt=""><br/>
						<h1>PRODUCTS</h1>
						<p>See the latest news from traker lab</p>
					</header>
					<div class="index-productcon clearfix">
						<div class="hd inblockm">
							<h2 class="title">WHAT ARE YOU WAITING FOR?</h2>
							<p class="wenzi">Why not checking our  product information  for more ideas? </p>
							<a href="<?php echo U('Product/productList',array('term_id'=>1));?>" class="alink surp-elli">See More</a>
						</div>
						<div class="bd inblockm">
							<div class="img-cover">
								<img src="images/picjpg/case1.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>6));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>1));?>">
								<span class="inblockm">Car Tracker</span>
								</a>
							</div>
						</div>
						<div class="bd inblockm">
							<div class="img-cover">
								<img src="images/picjpg/case2.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>1));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>1));?>">
								<span class="inblockm">IOT Equipment</span>
								</a>
								 
							</div>
						</div>
						<div class="bd inblockm">
							<div class="img-cover">
								<img src="images/picjpg/case3.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>1));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>1));?>">
								<span class="inblockm">Car Electronic</span>
								</a>
								 
							</div>
						</div>
						<div class="bd">
							<div class="img-cover">
								<img src="images/picjpg/case4.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>11));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>11));?>">
								<span class="inblockm">Personal Tracker</span>
								</a>
							</div>
						</div>
						<div class="bd">
							<div class="img-cover">
								<img src="images/picjpg/case5.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>2));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>2));?>">
								<span class="inblockm">Pets Tracker</span>
								</a>
							</div>
						</div>
						<div class="bd">
							<div class="img-cover">
								<img src="images/picjpg/case6.jpg" alt="">
								<a href="<?php echo U('Product/productList',array('term_id'=>5));?>">See More</a>
							</div>
							<div class="intro">
								<a href="<?php echo U('Product/productList',array('term_id'=>5));?>">
								<span class="inblockm">Asset Tracker</span>
								</a>
							</div>
						</div>
					</div>
					<div class="letter-tips">
						<p>
							Think Power is a leading telematics and M2M solution company focusing on GPS field. <br/>
							With 10 years car electronics industry experience, Think Power is dedicating to offering <br/>
							the reliable products and customized solution to the customer in need. 
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="index-con2">
		<div class="container index-events">
			<div class="row">
				<div class="col-xs-12">
					<header class="title">				
						<h1>Events</h1>
						<p>STAY INFORMED</p>
					</header>				 
				</div>
			</div>
			<div class="row events-con">
				<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'],true); $day=$vo['post_date']; ?>

				<div class="col-sm-4 item">
					<div class="img-cover"><img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt=""></div>
					<h5><a href="<?php echo U('News/article',array('id'=>$vo['object_id'],'cid'=>$vo['term_id']));?>"><?php echo ($vo["post_title"]); ?></a></h5>
					<p><?php echo (msubstr($vo["post_excerpt"],0,256)); ?></p>
					<a href="<?php echo U('News/article',array('id'=>$vo['object_id'],'cid'=>$vo['term_id']));?>">More&emsp;<i class="fa fa-arrow-right"></i></a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				 
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