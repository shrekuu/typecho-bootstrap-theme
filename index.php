<?php
/**
 * 这是一套 bootstrap 风格的皮肤
 * 
 * @package Typecho Bootstrap Theme
 * @author shrekuu
 * @version 1.0.0
 * @link http://github.com/shrekuu/typecho-bootstrap-theme
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<!-- jumbotron on homepage; hide this for now -->
<?php if (false && $this->is('index')): ?>
    <div class="col-xs-12">
        <div class="jumbotron">
            <div class="container-fluid">
                <h1><?php echo $this->options->title(); ?></h1>
                <p><?php echo $this->options->description(); ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

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

	<?php while($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
			<h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<ul class="post-meta list-inline">
				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></li>
				<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
			</ul>
            <div class="post-content " itemprop="articleBody">
    			<?php $this->content('- 阅读剩余部分 -'); ?>
            </div>
        </article>

        <hr/>

	<?php endwhile; ?>

    <nav>
        <?php $this->pageNav('&laquo;', '&raquo;'); ?>
    </nav>
    <br/>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
