<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-xs-12 col-md-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="panel panel-default widget">
        <div class="panel-heading widget-title"><?php _e('最新文章'); ?></div>
        <ul class="list-group widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li class="list-group-item"><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="panel panel-default widget recent-comments">
		<div class="panel-heading widget-title"><?php _e('最近回复'); ?></div>
        <ul class="list-group widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li class="list-group-item"><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="panel panel-default widget">
		<div class="panel-heading widget-title"><?php _e('分类'); ?></div>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list category-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="panel panel-default widget">
		<div class="panel-heading widget-title"><?php _e('归档'); ?></div>
        <ul class="list-group widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li class="list-group-item"><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="panel panel-default widget">
		<div class="panel-heading widget-title"><?php _e('其它'); ?></div>
        <ul class="list-group widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="list-group-item last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li class="list-group-item"><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="list-group-item last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li class="list-group-item"><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li class="list-group-item"><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li class="list-group-item"><a href="http://www.typecho.org" target="_blank">Typecho</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->

<script>
    $(function() {

        // give category list same design; unable to this only in html class
        $('.category-list').addClass('list-group').find('li').addClass('list-group-item');
    });
</script>
