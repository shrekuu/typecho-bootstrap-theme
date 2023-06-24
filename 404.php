<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-xs-12 col-md-9">

        <div class="error-page">
            <h2 class="post-title page-header">404 - <?php _e('页面没找到'); ?></h2>
            <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: '); ?></p>
            <form method="post" class="form">
                <div class="input-group">
                    <input type="text" name="s" class="text form-control" autofocus />
                    <span class="input-group-btn">
                        <button type="submit" class="submit btn btn-default" title="<?php _e('搜索'); ?>"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
