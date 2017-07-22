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
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('AdminPage/index');?>"><?php echo L('PORTAL_ADMINPAGE_INDEX');?></a></li>
			<li><a href="<?php echo U('AdminPage/add');?>"><?php echo L('PORTAL_ADMINPAGE_ADD');?></a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('AdminPage/index');?>">
			<?php echo L('POST_DATE');?>
			<input type="text" name="start_time" class="js-datetime" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width: 120px;" autocomplete="off">-
			<input autocomplete="off" type="text" class="js-datetime" name="end_time" value="<?php echo ((isset($formget["end_time"]) && ($formget["end_time"] !== ""))?($formget["end_time"]):''); ?>" style="width: 120px;"> <?php echo L('KEYWORD');?>
			<input type="text" name="keyword" style="width: 200px;" value="<?php echo ((isset($formget["keyword"]) && ($formget["keyword"] !== ""))?($formget["keyword"]):''); ?>" placeholder="<?php echo L('PLEASE_ENTER_KEYWORD');?>">
			<button class="btn btn-primary"><?php echo L('SEARCH');?></button>
			<a class="btn btn-danger" href="<?php echo U('AdminPage/index');?>">清空</a>
		</form>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPage/delete');?>" data-subcheck="true" data-msg="<?php echo L('DELETE_CONFIRM_MESSAGE');?>"><?php echo L('DELETE');?></button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="100">ID</th>
						<th><?php echo L('TITLE');?></th>
						<!-- <th>点击量</th> -->
						<th width="80"><?php echo L('AUTHOR');?></th>
						<th width="120"><span><?php echo L('POST_DATE');?></span></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
					<td><a><?php echo ($vo["id"]); ?></a></td>
					<td><a href="<?php echo U('portal/page/index',array('id'=>$vo['id']));?>" target="_blank"><span><?php echo ($vo["post_title"]); ?></span></a></td>
					<!--  <td>0</td> -->
					<td><?php echo ((isset($vo["user_nicename"]) && ($vo["user_nicename"] !== ""))?($vo["user_nicename"]):$vo.user_login); ?></td>
					<td><?php echo ($vo["post_date"]); ?></td>
					<td>
						<a href="<?php echo U('AdminPage/edit',array('id'=>$vo['id']));?>"><?php echo L('EDIT');?></a>|
						<a href="<?php echo U('AdminPage/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
					</td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="16"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="100">ID</th>
						<th><?php echo L('TITLE');?></th>
						<!-- <th>点击量</th> -->
						<th width="80"><?php echo L('AUTHOR');?></th>
						<th width="120"><span><?php echo L('POST_DATE');?></span></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPage/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
			</div>
			<div class="pagination"><?php echo ($page); ?></div>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
	<script>
		setCookie('refersh_time', 0);
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location.reload();
			}
		}
		setInterval(function() {
			refersh_window()
		}, 2000);
	</script>
</body>
</html>