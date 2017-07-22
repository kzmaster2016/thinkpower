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
			<li class="active"><a href="#A" data-toggle="tab"><?php echo L('GENERAL_SETTING');?></a></li>
			<li><a href="#B" data-toggle="tab"><?php echo L('SEO_SETTING');?></a></li>
			<li><a href="#C" data-toggle="tab"><?php echo L('TEMPLATE_SETTING');?></a></li>
		</ul>
		<form class="form-horizontal js-ajax-form" action="<?php echo U('AdminTerm/edit_post');?>" method="post">
			<input type="hidden" name="term_id" value="<?php echo ($data["term_id"]); ?>" />
			<div class="tabbable">
				<div class="tab-content">
					<div class="tab-pane active" id="A">
						<fieldset>
							<div class="control-group">
								<label class="control-label"><?php echo L('PARENT');?></label>
								<div class="controls">
									<select name="parent">
										<option value="0"><?php echo L('ROOT');?></option> <?php echo ($terms_tree); ?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('NAME');?></label>
								<div class="controls">
									<input type="text" name="name" value="<?php echo ($data["name"]); ?>"><span class="form-required">*</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('CATEGORY_DESCRIPTION');?></label>
								<div class="controls">
									<textarea name="description" rows="5" cols="57"><?php echo ($data["description"]); ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('CATEGORY_TYPE');?></label>
								<div class="controls">
									<select name="taxonomy">
										<?php if(is_array($taxonomys)): foreach($taxonomys as $key=>$vo): $selected=$data['taxonomy']==$key?"selected":"" ?>
										<option value="<?php echo ($key); ?>"<?php echo ($selected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
									</select>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="tab-pane" id="B">
						<fieldset>
							<div class="control-group">
								<label class="control-label"><?php echo L('SEO_TITLE');?></label>
								<div class="controls">
									<input type="text" name="seo_title" value="<?php echo ($data["seo_title"]); ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('SEO_KEYWORDS');?></label>
								<div class="controls">
									<input type="text" name="seo_keywords" value="<?php echo ($data["seo_keywords"]); ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('SEO_DESCRIPTION');?></label>
								<div class="controls">
									<textarea name="seo_description" rows="5" cols="57"><?php echo ($data["seo_description"]); ?></textarea>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="tab-pane" id="C">
						<?php $tpl_list=sp_admin_get_tpl_file_list(); ?>
						<fieldset>
							<div class="control-group">
								<label class="control-label"><?php echo L('LIST_TEMPLATE');?></label>
								<div class="controls">
									<?php $list_tpls=$tpl_list; unset($list_tpls['list']); ?>
									<select name="list_tpl">
										<option value="list">list<?php echo C("TMPL_TEMPLATE_SUFFIX");?></option>
										<?php if(is_array($list_tpls)): foreach($list_tpls as $key=>$vo): $template_selected=$data['list_tpl']==$vo?"selected":""; ?>
											<option value="<?php echo ($vo); ?>"<?php echo ($template_selected); ?>><?php echo ($vo); echo C("TMPL_TEMPLATE_SUFFIX");?></option><?php endforeach; endif; ?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><?php echo L('ARTICLE_TEMPLATE');?></label>
								<div class="controls">
									<?php $article_tpls=$tpl_list; unset($article_tpls['article']); ?>
									<select name="one_tpl">
										<option value="article">article<?php echo C("TMPL_TEMPLATE_SUFFIX");?></option>
										<?php if(is_array($article_tpls)): foreach($article_tpls as $key=>$vo): $template_selected=$data['one_tpl']==$vo?"selected":""; ?>
											<option value="<?php echo ($vo); ?>"<?php echo ($template_selected); ?>><?php echo ($vo); echo C("TMPL_TEMPLATE_SUFFIX");?></option><?php endforeach; endif; ?>
									</select>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-primary js-ajax-submit" type="submit"><?php echo L('SAVE');?></button>
				<a class="btn" href="javascript:history.back(-1);"><?php echo L('BACK');?></a>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/public/js/common.js"></script>
</body>
</html>