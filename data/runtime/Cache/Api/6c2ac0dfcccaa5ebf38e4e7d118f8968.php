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
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('guestbookadmin/index');?>">web留言</a></li>
			<li class="active"><a href="<?php echo U('guestbookadmin/contactus');?>">联系留言</a></li>
		</ul>
		<form method="post" class="js-ajax-form">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="30">ID</th>
						<th width="70"><?php echo L('NAME');?></th>
						<th width="80">Subject</th>
						<th width="50">Gender</th>
						<th width="50">Company</th>
						<th width="50">Country</th>
						<th width="50">City</th>
						<th width="50"><?php echo L('EMAIL');?></th>
						<th width="50">Phone</th>
						<th><?php echo L('CONTENT');?></th>
						<th width="70"><?php echo L('TIME');?></th>
						<th width="50"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($guestmsgs)): foreach($guestmsgs as $key=>$vo): ?><tr>
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["mainname"]); ?></td>
						<td><?php echo ($vo["title"]); ?></td>
						<td><?php echo ($vo["gender"]); ?></td>
						<td><?php echo ($vo["company"]); ?></td>
						<td><?php echo ($vo["country"]); ?></td>
						<td><?php echo ($vo["city"]); ?></td>
						<td><?php echo ($vo["email"]); ?></td>
						<td><?php echo ($vo["phone"]); ?></td>
						<td><?php echo ($vo["msg"]); ?></td>
						<td><?php echo ($vo["createtime"]); ?></td>
						<td>
							<a href="<?php echo U('guestbookadmin/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
			</table>
			<div class="pagination"><?php echo ($page); ?></div>
		</form>
	</div>
	<script src="/public/js/common.js?"></script>
</body>
</html>