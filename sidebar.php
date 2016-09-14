<aside class="col-md-4 mysidebar">

<?php if (! is_single()) { ?>
    <div class="mywidget">
        <h4 class="mywidget-title"><i class="fa fa-bookmark"></i>&nbsp;&nbsp;每日一语</h4>
        <div class="mywidget-content">

            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
            </ol>
                <!-- 轮播（Carousel）项目 -->
    		<div class="carousel-inner">
                        <div class="item active">
                            <blockquote>
                                <h4>&emsp;&emsp;一万年来谁著史，三千里外欲封侯</h4>
                                <small class="text-right"><strong>李鸿章</strong></small>
                            </blockquote>
                        </div>

                    </div>
                </div>

    	</div>
    </div>

    <div class="mywidget">
        <h4 class="mywidget-title">
    		<i class="fa fa-calendar"></i>&nbsp;&nbsp;日历
    		<small class="pull-right"><?php echo salary_distance(); ?></small>
    	</h4>
        <div class="mywidget-content my-calendar">

            <?php
                get_calendar();
            ?>

        </div>
    </div>
<?php } ?>

    <div class="mywidget">
        <h4 class="mywidget-title"><i class="fa fa-list-ul"></i>&nbsp;&nbsp;文章分类</h4>
        <div class="mywidget-content">

            <?php
		$categories=get_categories(array('orderby' => 'name','order' => 'ASC', 'hide_empty' => true, 'hierarchical' => false));
                foreach ($categories as $category) :
            ?>

                <li>
                    <p>
                        <a href="<?php echo get_category_link( $category->term_id ); ?>">
                            <i class="fa fa-caret-right fa-lg"></i> <?php echo $category->name; ?>(<?php echo $category->count; ?>)
                        </a>
                    </p>
                </li>

            <?php endforeach; ?>

        </div>
    </div>

    <div class="mywidget">
        <h4 class="mywidget-title"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;文章归档</h4>
        <div class="mywidget-content">

            <?php
                wp_get_archives('type=monthly&before=<p><i class="fa fa-caret-right fa-lg"></i> &after=</p>');
            ?>

        </div>
    </div>

    <div class="mywidget">
        <h4 class="mywidget-title"><i class="fa fa-flag"></i>&nbsp;&nbsp;标签云</h4>
        <div class="mywidget-content my-tag-cloud">

            <?php get_messikiller_tags_cloud(); ?>

        </div>
    </div>

<?php if (is_single()) { ?>
    <div class="mywidget">
        <h4 class="mywidget-title">
    		<i class="fa fa-jpy"></i>&nbsp;&nbsp;打赏
    		<small class="pull-right">拿出微信扫一扫，打赏作者～</small>
    	</h4>
        <div class="mywidget-content my-calendar thumbnail" style="border-width:0px;">
            <img src="<?php echo get_template_directory_uri(); ?>/image/reward.jpg" alt="扫一扫～" class="img-rounded" />
        </div>
    </div>
<?php } ?>

    <div class="mywidget">
        <h4 class="mywidget-title"><i class="fa fa-cog fa-lg"></i>&nbsp;&nbsp;功能管理</h4>
        <div class="mywidget-content">
            <li>
                <p><a href="<?php echo home_url().'/wp-admin'; ?>"><i class="fa fa-caret-right fa-lg"></i> 管理站点</a></p>
            </li>
            <li>
                <p><a href="<?php echo home_url(); ?>"><i class="fa fa-caret-right fa-lg"></i> home</a></p>
            </li>
            <li>
                <?php
                    if(is_user_logged_in())
                    {
                ?>
                        <p><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-caret-right fa-lg"></i> 注销登录</a></p>
                <?php
                    }
                    else{
                ?>

                        <p><a href="<?php echo wp_login_url(); ?>"><i class="fa fa-caret-right fa-lg"></i> 登录系统</a></p>
                <?php
                    }
                ?>
            </li>
        </div>
    </div>

</aside>
