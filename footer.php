<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="col-xs-12">
            &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
            <?php _e('由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动'); ?>.
            Themed by <a href="https://github.com/shrekuu/typecho-bootstrap-theme" target="_blank">shrekuu</a>
        </div>
    </div>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
