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
            <li><?php $this->archiveTitle(' &raquo; ','',''); ?></li>
        <?php endif; ?>
    </div>


    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title page-header" itemprop="name headline"><?php $this->title() ?></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
