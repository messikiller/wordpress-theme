<?php // Do not delete these lines
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() )
    {
?>
    <div id="comment-box"><p class="nocomments"> 亲，您必须输入密码才能查看评论 </p></div>
<?php
        return;
    }
    /* This variable is for alternating comment background */
    $oddcomment = '';
?>

    <div id="comment-box">

<?php if ($comments) : ?>

    <h4 id="comments" class="detitle">
        当前有<?php comments_number('', '1条留言', '%条留言' );?>
        <em></em>
    </h4>
    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=messikiller_comment&end-callback=messikiller_end_comment&max_depth=23'); ?>
    </ol>

<?php else : // this is displayed if there are no comments so far ?>

    <!-- If comments are open, but there are no comments. -->
    <h4 id="comments" class="detitle">暂时木有评论啊，等您坐沙发呢！<em></em></h4>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
    <div id="respond_box">
    <div id="respond">
        <?php
            if ( is_user_logged_in() ) :
        ?>
            <img alt="messikiller" src="<?php echo get_template_directory_uri(); ?>/image/host.png" class="img-circle" height="40" width="40"></img>
        <?php
            else:
        ?>
            <img alt="messikiller" src="<?php echo get_template_directory_uri(); ?>/image/guest.png" class="img-circle" height="40" width="40"></img>
        <?php
            endif;
        ?>
        <span>&nbsp;</span>
        <span><h4>发表评论：</h4></span>
        <span class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </span>

        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>

        <span>
            <?php print '您必须'; ?>

            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！

        </span>

        <?php else : ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

            <?php if ( $user_ID ) : ?>

                <p><?php print '登录者：'; ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>&nbsp;&nbsp;<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php print '[ 退出 ]'; ?></a></p>

            <?php endif; ?>

        <?php if ( ! $user_ID ): ?>

<div class="form-horizontal" id="comment-author-info">

    <div class="form-group">
        <!-- Text input-->
        <div class="control-group">
            <label class="control-label col-sm-2" for="author">昵称<?php if ($req) echo " *"; ?></label>
            <div class="controls col-sm-10">
                <input type="text" name="author" id="author" class="form-control" style="border-radius:0px;" value="<?php echo $comment_author; ?>" placeholder=" "  required />
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <div class="control-group">
            <label class="control-label col-sm-2" for="email">邮箱<?php if ($req) echo " *"; ?></label>
            <div class="controls col-sm-10">
                <input type="email" name="email" id="email" class="form-control" style="border-radius:0px;" value="<?php echo $comment_author_email; ?>" placeholder=" "  required/>
            </div>
        </div>
    </div>

        <?php endif; ?>

        <div class="clear"></div>

    <div class="form-group">
        <!-- Textarea -->
        <div class="control-group">
            <label class="control-label col-sm-2">评论<?php if ($req) echo " *"; ?></label>
            <div class="controls col-sm-10">
                <textarea name="comment" class="form-control" id="comment" rows="5" tabindex="4"  placeholder=" " style="width:100%;resize:none;border-radius:0px;"></textarea>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="control-group">
            <label class="control-label col-sm-2"></label>
            <div class="controls col-sm-10">
                <input class="btn btn-sm btn-primary" style="border-radius:0px;" name="submit" type="submit" id="submit" tabindex="5" value="提 交 评 论" />
            </div>
        </div>
    </div>

        <?php comment_id_fields(); ?>

        <?php do_action('comment_form', $post->ID); ?>

    </div><!-- end of form-group -->

</form>

    <?php endif; // If registration required and not logged in ?>
  </div>

  <?php endif; // if you delete this the sky will fall on your head ?>
  </div>
