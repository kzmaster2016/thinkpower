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
			<li class="active"><a href="<?php echo U('AdminPost/recyclebin');?>"><?php echo L('PORTAL_ADMINPOST_RECYCLEBIN');?></a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('AdminPost/recyclebin');?>">
			分类： 
			<select name="term" style="width: 120px;">
				<option value='0'>全部</option><?php echo ($taxonomys); ?>
			</select> &nbsp;&nbsp;
			时间：
			<input type="text" name="start_time" class="js-datetime" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width: 120px;" autocomplete="off">-
			<input type="text" class="js-datetime" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 120px;" autocomplete="off"> &nbsp; &nbsp;
			关键字： 
			<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入关键字...">
			<input type="submit" class="btn btn-primary" value="搜索" />
			<a class="btn btn-danger" href="<?php echo U('AdminPost/recyclebin');?>">清空</a>
		</form>
		<form class="js-ajax-form" method="post">
			<div class="table-actions">
				<button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/clean');?>" data-subcheck="true" data-msg="你确定删除吗？删除后无法恢复！"><?php echo L('DELETE');?></button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th><?php echo L('TITLE');?></th>
						<th width="50"><?php echo L('AUTHOR');?></th>
						<th width="50"><?php echo L('HITS');?></th>
						<th width="50"><?php echo L('COMMENT_COUNT');?></th>
						<th width="160"><?php echo L('KEYWORDS');?>/<?php echo L('SOURCE');?>/<?php echo L('ABSTRACT');?>/<?php echo L('THUMBNAIL');?></th>
						<th width="100"><?php echo L('PUBLISH_DATE');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="60"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<?php $status=array("1"=>"已审核","0"=>"未审核"); $top_status=array("1"=>"已置顶","0"=>"未置顶"); $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
					<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[<?php echo ($vo["id"]); ?>]" value="<?php echo ($vo["id"]); ?>"></td>
					<td><b><?php echo ($vo["id"]); ?></b></td>
					<td><?php echo ($vo["post_title"]); ?></td>
					<td><?php echo ((isset($vo["user_nicename"]) && ($vo["user_nicename"] !== ""))?($vo["user_nicename"]):$vo.user_login); ?></td>
					<td><?php echo ($vo["post_hits"]); ?></td>
					<td>
						<?php if(!empty($vo["comment_count"])): ?><a href="javascript:parent.open_iframe_dialog('<?php echo U('comment/commentadmin/index',array('post_id'=>$vo['id']));?>','评论列表')"><?php echo ($vo["comment_count"]); ?></a>
						<?php else: ?>
							<?php echo ($vo["comment_count"]); endif; ?>
					</td>
					<td>
						<?php if(!empty($vo["post_keywords"])): ?><i class="fa fa-check fa-fw"></i>
						<?php else: ?>
							<i class="fa fa-close fa-fw"></i><?php endif; ?>
						<?php if(!empty($vo["post_source"])): ?><i class="fa fa-check fa-fw"></i>
						<?php else: ?>
							<i class="fa fa-close fa-fw"></i><?php endif; ?>
						<?php if(!empty($vo["post_excerpt"])): ?><i class="fa fa-check fa-fw"></i>
						<?php else: ?>
							<i class="fa fa-close fa-fw"></i><?php endif; ?>
						
						<?php $smeta=json_decode($vo['smeta'],true); ?>
						<?php if(!empty($smeta["thumb"])): ?><a href="javascript:parent.image_preview_dialog('<?php echo sp_get_image_preview_url($smeta['thumb']);?>');">
								<i class="fa fa-photo fa-fw"></i>
							</a><?php endif; ?>
					</td>
					<td><?php echo date('Y-m-d H:i',strtotime($vo['post_date']));?></td>
					<td>
						<?php if(!empty($vo["post_status"])): ?><a data-toggle="tooltip" title="已审核"><i class="fa fa-check"></i></a> 
						<?php else: ?>
							<a data-toggle="tooltip" title="未审核"><i class="fa fa-close"></i></a><?php endif; ?>
						<?php if(!empty($vo["istop"])): ?><a data-toggle="tooltip" title="已置顶"><i class="fa fa-arrow-up"></i></a><?php endif; ?>
						<?php if(!empty($vo["recommended"])): ?><a data-toggle="tooltip" title="已推荐"><i class="fa fa-thumbs-up"></i></a><?php endif; ?>
					</td>
					<td>
						<a href="<?php echo U('AdminPost/restore',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn" data-msg="确定还原吗？">还原</a>| 
						<a href="<?php echo U('AdminPost/clean',array('id'=>$vo['id'],'id'=>$vo['id']));?>" class="js-ajax-delete">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th><?php echo L('TITLE');?></th>
						<th width="50"><?php echo L('AUTHOR');?></th>
						<th width="50"><?php echo L('HITS');?></th>
						<th width="50"><?php echo L('COMMENT_COUNT');?></th>
						<th width="160"><?php echo L('KEYWORDS');?>/<?php echo L('SOURCE');?>/<?php echo L('ABSTRACT');?>/<?php echo L('THUMBNAIL');?></th>
						<th width="100"><?php echo L('PUBLISH_DATE');?></th>
						<th width="50"><?php echo L('STATUS');?></th>
						<th width="60"><?php echo L('ACTIONS');?></th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="<?php echo U('AdminPost/clean');?>" data-subcheck="true" data-msg="你确定删除吗？删除后无法恢复！"><?php echo L('DELETE');?></button>
			</div>
			<div class="pagination"><?php echo ($page); ?></div>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
</body>
</html>