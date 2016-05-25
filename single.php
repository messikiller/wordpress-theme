<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta property="og:site_name" content="messikiller's blog"/>
<meta property="og:type" content="blog"/>
<meta name="os:description" content="messikiller-PHP-技术博客-官网,折而不挠，终不为下, PHP，开发，技术博客，科技，Linux，分享"/>
<meta name="os:image" content="http://blog.messikiller.cn/wp-content/themes/messikiller/image/favicon.ico"/>
<meta name="os:title" content="messikiller-PHP-技术博客-官网"/> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/image/favicon.ico" media="screen" />

<title><?php bloginfo('name'); ?></title>

<!-- Bootstrap -->
<link href="<?php echo get_template_directory_uri(); ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/lib/Font-Awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- highlight -->
<link href="<?php echo get_template_directory_uri(); ?>/lib/highlight/styles/my-xcode.css" rel="stylesheet">
<!--fancybox css-->
<link href="<?php echo get_template_directory_uri(); ?>/lib/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/lib/fancybox/helpers/jquery.fancybox-thumbs.css" rel="stylesheet">
<!-- my css -->
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
</head>

<body class="my-body">

<?php get_header(); ?>

<section>
    <div class="container">
        <div class="row">

            <main class="col-md-8">

<?php if (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>

                <article class="post">
                    <div class="post-header">
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>">
<?php the_title(); ?>
                            </a>
                        </h3>
                        <div class="post-meta">
                            <span><i class="fa fa-clock-o"></i> 时间：<?php the_time('Y.m.d'); ?></span> 
                            <span><i class="fa fa-eye"></i> 浏览次数：<?php echo getPostViews(get_the_ID()); ?></span>
                            <span>
                                <i class="fa fa-list"></i> 分类：
                                <?php
                                    $counter=0;
                                    foreach((get_the_category()) as $category)
                                        {
                                        if ($counter>=2) {
                                            break;
                                        }
                                        echo '<span class="label '.get_cat_label_style($category->cat_name).'">'.$category->cat_name.'</span>';
                                        $counter++;
                                    }
                                ?>
                            </span>

                            <?php if (is_user_logged_in()): ?>

                                <span>
                                    <i class="fa fa-pencil-square-o"></i>

                                    <?php edit_post_link('编辑本文'); ?> 

                                </span>

                            <?php endif ?>

                        </div>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="shared-article">

			<div class="next-previous-link">
<?php
    get_previous_next_link();
?>
			</div>
			<div class="bdsharebuttonbox"  style="float:right;">
				<a href="#" class="bds_more" data-cmd="more"></a>
				<a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a>
				<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
				<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
				<a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
				<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
			</div>
			<script>
				window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
			</script>
                    </div>

                </article>

<!-- <div class="comments-template"> -->
    <?php 
        if(comments_open( get_the_ID() ))  {
            comments_template('', true); 
        }
    ?>
<!-- </div> -->

<?php endif; ?>

            </main>

            <?php get_sidebar(); ?>

        </div><!-- end of row -->
    </div><!-- end of container -->
</section>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/lib/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<!-- highlight -->
<script src="<?php echo get_template_directory_uri(); ?>/lib/highlight/highlight.pack.js"></script>
<!--fancybox js-->
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/jquery.mousewheel.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<!--my script-->
<script src="<?php echo get_template_directory_uri(); ?>/js/navbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/myjs.js"></script>
<script>
$(document).ready(function(){
	$('pre code').each(function(i, block) {
		hljs.highlightBlock(block);
	});
});
</script>
    </body>
</html>
