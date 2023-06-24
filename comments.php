<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo;', '&raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>

        <br/>

    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form class="form" method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<div class="form-group custom-input-group form-group-inline commenter-name">
                <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
    			<input type="text" name="author" id="author" class="text form-control" value="<?php $this->remember('author'); ?>" required placeholder="<?php _e('称呼'); ?> *" />
    		</div>
            <div class="form-group custom-input-group form-group-inline commenter-mail">
                <div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
                <input type="email" name="mail" id="mail" class="text form-control" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> placeholder="邮箱 <?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" />
            </div>
            <div class="form-group custom-input-group custom-input-group-url">
                <div class="input-group-addon"><i class="glyphicon glyphicon-home"></i></div>
    			<input type="url" name="url" id="url" class="text form-control" placeholder="网址 <?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</div>
            <?php endif; ?>
            <div class="form-group">
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea form-control" required placeholder="<?php _e('评论内容'); ?> *"><?php $this->remember('text'); ?></textarea>
            </div>
            <button type="submit" class="submit btn btn-default"><?php _e('提交评论'); ?></button>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?> :(</h3>
    <?php endif; ?>
</div>

<script src="https://cdn.staticfile.org/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script>
    $(function() {

        // use jquery validator to validate the comment form
        $('#comment-form').validate({
            rules: {
                author: 'required',
                mail: {
                    required: true,
                    email: true
                },
                url: {
                    url: true
                },
                text: 'required'
            },
            messages: {
                author: '请输入您的大名。',
                mail: {
                    required: '请输入您的邮箱。',
                    email: '请输入一个正确的邮箱帐号。'
                },
                url: {
                    url: '请输入一个正确网址。'
                },
                text: '请输入评论内容。'
            },
            highlight: function() {
                // preserve
            },
            unhighlight: function() {
            }
        });

        // name input and email input
        $('.form-group:not(.custom-input-group-url)').on('focus blur keyup keydown', 'input, textarea', function(e) {
            var inputGroups = $('.form-group:not(.custom-input-group-url)');
            setTimeout(function() {
                if (inputGroups.find('.error').is(':visible')) {
                    inputGroups.addClass('has-error');
                } else {
                    inputGroups.removeClass('has-error');
                }
            },1);
        });

        // url input; this has to be separated out due to absolute positioning of the icon
        $('.custom-input-group-url').on('focus blur keyup keydown', 'input', function(e) {
            var inputGroup = $('.custom-input-group-url');

            // if there are two http://, remove one
            // in case they paste url here
            $url_arr = $(this).val().split("//");
            if ($url_arr[1] == 'http:' || $url_arr[1] == 'https:') {
                $new_url_arr = $url_arr.splice(1);
                $(this).val($new_url_arr.join('//'));
            }

            setTimeout(function() {
                if (inputGroup.find('.error').is(':visible')) {
                    inputGroup.addClass('has-error');
                } else {
                    inputGroup.removeClass('has-error');
                }
            },1);
        });

        // make website url input easier
        //  this is like magic :p
        $('#comment-form').on('focus', '#url', function() {
            if ($(this).val() == '') {
                $(this).val("http://");
            }
        }).on('blur', '#url', function() {
            if ($(this).val() == 'http://' || $(this).val() == 'https://') {
                $(this).val('');
            }
        });
    });
</script>
