<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta property="og:site_name" content="messikiller's blog"/>
<meta property="og:type" content="blog"/>
<meta name="os:description" content="messikiller-PHP-技术博客-官网,折而不挠，终不为下, PHP，开发，技术博客，科技，Linux，分享"/>
<meta name="os:image" content="<?php echo get_template_directory_uri(); ?>/image/favicon.ico"/>
<meta name="os:title" content="messikiller-PHP-技术博客-官网"/> 
<meta name="keyWords" content="blog,messikiller,php,html,technology,it">
<meta name="description" content="blog,it,php">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/image/favicon.ico" media="screen" />

<title><?php bloginfo('name'); ?></title>

<!-- Bootstrap -->
<link href="<?php echo get_template_directory_uri(); ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- font-awesome -->
<link href="<?php echo get_template_directory_uri(); ?>/lib/Font-Awesome/css/font-awesome.min.css" rel="stylesheet">
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

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>

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
                            foreach((get_the_category()) as $category){
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

                            <?php edit_post_link('编辑'); ?> 

                        </span>

                    <?php endif ?>
                    
                </div>
            </div>
            <div class="post-content">
                <p><?php echo get_the_messikiller_excerpt(); ?></p>
            </div>
            <div class="post-permalink">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">阅读全文</a>
            </div>
            <footer class="poster-footer clearfix"></footer>
        </article>

    <?php endwhile; ?>
<?php endif; ?>

                <nav class="text-center">
                    <ul class="pagination">

                        <?php par_pagenavi(5); ?>

                    </ul>
                </nav>

            </main>

            <?php get_sidebar(); ?>

        </div><!-- end of row -->
    </div><!-- end of container -->
</section>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/lib/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/unslider-master/src/js/unslider.js"></script>
<!--fancybox js-->
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/jquery.mousewheel.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<!--navbar-->
<script src="<?php echo get_template_directory_uri(); ?>/js/navbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/myjs.js"></script>

    </body>
</html>
