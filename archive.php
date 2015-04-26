<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-xs-12 col-md-9" id="main" role="main">

        <div class="breadcrumb">
            <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
            <?php if ($this->is('index')): ?><!-- 页面为首页时 -->
            <li>最新文章</li>
            <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
            <li><?php $this->category(); ?></li>
            <li><?php $this->title() ?></li>
            <?php else: ?><!-- 页面为其他页时 -->
            <!-- <li>--><?php //$this->archiveTitle(' &raquo; ','',''); ?><!--</li>-->
            <li>
                <?php $this->archiveTitle(array(
                    'category'  =>  _t('分类 "%s" 下的文章'),
                    'search'    =>  _t('包含关键字 "%s" 的文章'),
                    'tag'       =>  _t('标签 "%s" 下的文章'),
                    'author'    =>  _t('"%s" 发布的文章')
                ), '', ''); ?>
            </li>
            <?php endif; ?>
        </div>

        <!--
        <h3 class="archive-title page-header"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
        -->

        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
    			<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
    			<ul class="post-meta list-inline">
    				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
    				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
    				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                    <li itemprop="interactionCount"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
    			</ul>
                <div class="post-content" itemprop="articleBody">
        			<?php $this->content('- 阅读剩余部分 -'); ?>
                </div>
    		</article>

            <hr/>

    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title page-header"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <nav>
            <?php $this->pageNav('&laquo;', '&raquo;'); ?>
        </nav>
        <br/>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
