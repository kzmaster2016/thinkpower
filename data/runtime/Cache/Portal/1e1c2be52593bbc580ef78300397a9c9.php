<?php if (!defined('THINK_PATH')) exit();?><br>
<h3>评论</h3>
<div class="comment-area" id="comments">

	<hr>
	<form class="form-horizontal comment-form" action="<?php echo U('comment/comment/post');?>" method="post">
	  <div class="control-group">
		  <div class="comment-postbox-wraper">
		  	<textarea class="form-control comment-postbox" placeholder="Write your comment here" style="min-height:90px;"  name="content"></textarea>
		  </div>
	  </div>
	  
	  <div class="control-group">
	   		<button type="submit" class="btn pull-right btn-primary js-ajax-submit"><i class="fa fa-comment-o"></i> 发表评论</button>
	  </div>
	  
	  <input type="hidden" name="post_title" value="<?php echo ($params["post_title"]); ?>"/>
	  <input type="hidden" name="post_table" value="<?php echo ($post_table); ?>"/>
	  <input type="hidden" name="post_id" value="<?php echo ($post_id); ?>"/>
	  <input type="hidden" name="to_uid" value="0"/>
	  <input type="hidden" name="parentid" value="0"/>
	</form>
	
	<script class="comment-tpl" type="text/html">
		<div class="comment" data-username="<?php echo ($user["user_nicename"]); ?>" data-uid="<?php echo ($user["id"]); ?>">
		  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$user['id']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$user['id']));?>" class="headicon"/>
		  </a>
		  <div class="comment-body">
		    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$user['id']));?>"><?php echo ($user["user_nicename"]); ?></a>:<span class="content"></span></div>
		    <div><span class="time">刚刚</span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		  </div>
		  <div class="clearfix"></div>
		</div>
	</script>
	
	<script class="comment-reply-box-tpl" type="text/html">
		<div class="comment-reply-submit">
                    <div class="comment-reply-box">
                        <input type="text" class="textbox" placeholder="回复">
                    </div>
                    <button class="btn pull-right" onclick="comment_submit(this);">回复</button>
                </div>
	</script>
	
	
	<hr>
	<div class="comments">
	<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><div class="comment" data-id="<?php echo ($vo["id"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-username="<?php echo ($vo["full_name"]); ?>"  id="comment<?php echo ($vo["id"]); ?>">
		  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$vo['uid']));?>" class="headicon"/>
		  </a>
		  <div class="comment-body">
		    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?></a>:<span><?php echo ($vo["content"]); ?></span></div>
		    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		    
		    <?php if(!empty($vo['children'])): if(is_array($vo["children"])): foreach($vo["children"] as $key=>$voo): ?><div class="comment" data-id="<?php echo ($voo["id"]); ?>" data-uid="<?php echo ($voo["uid"]); ?>" data-username="<?php echo ($voo["full_name"]); ?>" id="comment<?php echo ($voo["id"]); ?>">
					  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>">
					    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$voo['uid']));?>" class="headicon"/>
					  </a>
					  <div class="comment-body">
					    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>"><?php echo ($voo["full_name"]); ?></a>:<span>回复 <a href="<?php echo U('user/index/index',array('id'=>$voo['to_uid']));?>"><?php echo ($parent_comments[$voo['parentid']]['full_name']); ?></a> <?php echo ($voo["content"]); ?></span></div>
					    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($voo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
					  </div>
					  <div class="clearfix"></div>
					</div><?php endforeach; endif; endif; ?>
		    
		    
		  </div>
		  <div class="clearfix"></div>
		</div><?php endforeach; endif; ?>
	</div>
	
</div>