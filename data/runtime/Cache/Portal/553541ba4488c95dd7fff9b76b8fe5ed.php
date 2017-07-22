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
			<li class="active"><a href="<?php echo U('AdminTerm/index');?>"><?php echo L('PORTAL_ADMINTERM_INDEX');?></a></li>
			<li><a href="<?php echo U('AdminTerm/add');?>"><?php echo L('PORTAL_ADMINTERM_ADD');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form" action="<?php echo U('AdminTerm/listorders');?>">
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit"><?php echo L('SORT');?></button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('CATEGORY_TYPE');?></th>
						<th><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					<?php echo ($taxonomys); ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="50"><?php echo L('SORT');?></th>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th><?php echo L('CATEGORY_TYPE');?></th>
						<th><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit"><?php echo L('SORT');?></button>
			</div>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
</body>
</html>