<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<style>
.home_info li em {
	float: left;
	width: 120px;
	font-style: normal;
}
li {
	list-style: none;
}
</style>
</head>
<body>
	<div class="wrap">
		<div id="home_toptip"></div>
		<h4 class="well"><?php echo L('SYSTEM_NOTIFICATIONS');?></h4>
		<div class="home_info">
			<ul id="thinkcmf_notices">
				<!-- <li><img src="/admin/themes/simplebootx/Public/assets/images/loading.gif"style="vertical-align: middle;" /><span style="display: inline-block; vertical-align: middle;">加载中...</span></li> -->
			</ul>
		</div>
		<h4 class="well"><?php echo L('SYSTEM_INFORMATIONS');?></h4>
		<div class="home_info">
			<ul>
				<?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><em><?php echo ($key); ?></em> <span><?php echo ($vo); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		 
		<h4 class="well"><?php echo L('CONTRIBUTORS');?></h4>
		<div class="">
			<ul class="inline" style="margin-left: 25px;">
				<li>匡正</li>
				 
			</ul>
		</div>
	</div>
	<script src="/public/js/common.js"></script>
	 
	<script>
		//获取官方通知
		/*$.getJSON("http://www.thinkcmf.com/service/sms_jsonp.php?lang=<?php echo ($lang_set); ?>&v=<?php echo ($thinkcmf_version); ?>&callback=?",
		function(data) {
			var tpl = '<li><em class="title"></em><span class="content"></span></li>';
			var $thinkcmf_notices = $("#thinkcmf_notices");
			$thinkcmf_notices.empty();
			if (data.length > 0) {
				$.each(data, function(i, n) {
					var $tpl = $(tpl);
					$(".title", $tpl).html(n.title);
					$(".content", $tpl).html(n.content);
					$thinkcmf_notices.append($tpl);
				});
			} else {
				$thinkcmf_notices.append("<li>^_^,<?php echo L('NO_NOTICE');?>~~</li>");
			}
		});*/
	</script>
</body>
</html>