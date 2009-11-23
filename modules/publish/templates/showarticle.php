<?php BUGScontext::loadLibrary('publish/publish'); ?>
<table style="margin-top: 0px; table-layout: fixed; width: 100%" cellpadding=0 cellspacing=0>
	<tr>
		<td class="left_bar" style="width: 250px;">
			<?php include_component('leftmenu', array('article' => $article)); ?>
		</td>
		<td class="main_area article">
			<a name="top"></a>
			<?php if ($message): ?>
				<div class="rounded_box green_borderless" style="margin: 0 0 5px 5px;">
					<b class="xtop"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
					<div class="xboxcontent" style="padding: 3px; font-size: 14px;">
						<b><?php echo $message; ?></b>
					</div>
					<b class="xbottom"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
				</div>
			<?php endif; ?>
			<?php if ($article instanceof PublishArticle): ?>
				<?php include_component('articledisplay', array('article' => $article)); ?>
			<?php else: ?>
				<div class="header" style="padding: 5px;">
					<?php echo link_tag(make_url('publish_article', array('article_name' => 'FrontpageArticle')), __('Front page article'), array('class' => (($article_name == 'FrontpageArticle') ? 'faded_medium' : ''), 'style' => 'float: right; margin-right: 15px;')); ?>
					<?php if (BUGScontext::getCurrentProject() instanceof BUGSproject && strpos($article_name, ucfirst(BUGScontext::getCurrentProject()->getKey())) == 0): ?>
						<?php $project_article_name = substr($article_name, strlen(BUGScontext::getCurrentProject()->getKey())+1); ?>
						<span class="faded_dark"><?php echo ucfirst(BUGScontext::getCurrentProject()->getKey()); ?>:</span><?php echo get_spaced_name($project_article_name); ?>
					<?php else: ?>
						<?php echo get_spaced_name($article_name); ?>
					<?php endif; ?>
				</div>
				<div style="font-size: 14px;">
					<?php echo __('This is a placeholder for an article that has not been created yet. You can create it by clicking %create_this_article% below.', array('%create_this_article%' => '<b>'.__('Create this article').'</b>')); ?>
				</div>
			<?php endif; ?>
			<div class="publish_article_actions">
				<div class="sub_header"><?php echo __('Actions available'); ?></div>
				<form action="<?php echo make_url('publish_article_edit', array('article_name' => $article_name)); ?>" method="get">
					<input type="submit" value="<?php echo ($article instanceof PublishArticle) ? __('Edit this article') : __('Create this article'); ?>">
				</form>
			</div>
		</td>
	</tr>
</table>