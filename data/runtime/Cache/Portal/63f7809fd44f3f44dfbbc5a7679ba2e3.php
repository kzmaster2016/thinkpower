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
	<title>Contact</title>	
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
  	<script type="text/javascript">

  	</script>

</head>
<body class="pcbody about-page">
	<input type="hidden" value="4" class="active-maninav">
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
	 
	<div class="contact-con">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				 	<div class="contact-aside">
				 		<div class="hd">
				 			<img src="images/tippng/tip_5.png" alt="">CONTACT US
				 		</div>
				 		<div class="bd">
				 			<h3 class="title">THINK POWER</h3> 
				 			<p class="p1">
				 				Tel:+86-0755-33985960 <br/>
				 				Website:thinkpower@cnthinkpower.com
				 			</p>
				 			<h4 class="title1">
				 				Address
				 			</h4>
				 			<p class="p2">
				 				Head Office: <br/>
				 				6/F,Jianxing Technology Building,<br/>Nanshan District,Shenzhen <br/>China.
				 			</p>
				 			<p class="p2">
				 				Factory: <br/>
				 				Thinkpower Building,Hongdehui Industrial Park,Longgang District,Shenzhen,China.
				 			</p>
				 			<p class="p2">
				 				NanJing Soft R&D Dept.: <br/>
								801 Room,Sunny World 2,Jianye District,Nanjing,Jiangshu Province,China.
				 			</p> 
				 		</div>
				 	</div>
				</div>
				<div class="col-sm-8">
					<div class="contact-bd">
						<div class="head">
							<h3>CONTACT OUR SUPPORT</h3>
							<p>Please complete the form below.All fields marked with * are mandatory and must be filled in before your request will be processed.</p>
						</div>
						<div class="bdcon">
							<h4><img src="images/tippng/tip_6.png" alt="">Contact Form</h4>
							<form action="<?php echo U('api/guestbook/addmsg');?>" method="post" class="form-horizontal contact-form">
								<div class="bdin">
									  <div class="form-group form-group-sm">
									    <label for="subject" class="col-sm-2 control-label">Subject <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="title" class="form-control" id="subject" required>
									    </div>
									    <label for="gender" class="col-sm-2 control-label">Gender <em>*</em></label>
									    <div class="col-sm-4">
									      <!-- <input type="text" class="form-control" id="query" placeholder=""> -->
									      <select name="gender" id="gender" class="form-control" required>
									      	<option value="">Please choose</option>							      
									      	<option value="Male">Male</option>
									      	<option value="Feamale">Feamale</option>
									      </select>
									    </div>
									  </div>
									  <div class="form-group form-group-sm">
									    <label for="firstn" class="col-sm-2 control-label">First Name <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="mainname" class="form-control" id="firstn"  required>
									    </div>
									    <label for="lastn" class="col-sm-2 control-label">Last Name <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="lastname" class="form-control" id="lastn"  required>
									    </div>
									  </div>
									  <div class="form-group form-group-sm">
									    <label for="company" class="col-sm-2 control-label">Company <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="company" class="form-control" id="company"  required>
									    </div>
									    <label for="country" class="col-sm-2 control-label">Country <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="country" class="form-control" id="country"  required>
									    </div>
									  </div>
									  <div class="form-group form-group-sm">
									    <label for="email" class="col-sm-2 control-label">Email <em>*</em></label>
									    <div class="col-sm-4">
									      <input type="text" name="email" class="form-control" id="email"  required>
									    </div>
									    <label for="city" class="col-sm-2 control-label">City</label>
									    <div class="col-sm-4">
									      <input type="text" name="city" class="form-control" id="city">
									    </div>
									  </div>
									  <div class="form-group form-group-sm">
									    <label for="phone" class="col-sm-2 control-label">Phone</label>
									    <div class="col-sm-4">
									      <input type="text" name="phone" class="form-control" id="phone">
									    </div>							   
									  </div>
									  <div class="form-group form-group-sm">
									    <label for="phone" class="col-sm-2 control-label">Description</label>
									    <div class="col-sm-4">
									       <textarea name="msg" class="description" id=""></textarea>
									    </div>
									  </div>
									  <input type="hidden" name="type" value="2">							   							
								</div>
								<div class="form-btns alignr">
									<input type="reset" value="Reset" class="reset"><input type="submit" value="Submit" class="submit">
								</div>
							</form>
						</div>
					</div>
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
	<script type="text/javascript" src="plugins/layer/layer.js"></script>
	<script src="plugins/jqueryValidate/jquery.validate.min.js"></script>
	<!-- <script src="plugins/jqueryValidate/messages_zh.js"></script> -->
	<script type="text/javascript">
		$(function(){
			$(".contact-form").validate({
				rules:{
					email: {
					    required: true,
					    email: true
				    }
				},
				messages:{
					email: "Please input a valid email",
				}
				
			});
		})
	</script>
</body>
</html>