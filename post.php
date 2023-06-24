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
        <ul class="post-meta list-inline">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <br/>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(' ', true, 'none'); ?></p>
    </article>

    <br/>
<!--    <hr/>-->

    <?php $this->need('comments.php'); ?>

    <hr/>

    <ul class="post-near">
        <li><i class="glyphicon glyphicon-chevron-left"></i> <?php $this->thePrev('%s','没有了'); ?></li>
        <li class="text-right"><?php $this->theNext('%s','没有了'); ?> <i class="glyphicon glyphicon-chevron-right"></i></li>
    </ul>

    <br/>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>

<script>
    $(function() {
        $('.post-near li').hide(0).each(function(i, e) {
            if ($(this).has('a').length != 0) {
                $(this).show(0);
            }
        });
    });
</script>
