<footer class="myfooter">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-1"></div>

            <div class="col-sm-3 mysocial">
                <div class="footerwidget">
                    <h4 class="footerwidget-title"><i class="fa fa-comments"></i> 社交账号</h4>
                    <a class="footer-home" target="_blank" href="<?php bloginfo('rss2_url'); ?>">
                        <i class="fa fa-rss fa-5x"></i>
                        <span>RSS</span>
                    </a>
                    <a class="footer-weibo" target="_blank" href="http://weibo.com/5451465984/profile?rightmod=1&wvr=6&mod=personinfo&is_all=1">
                        <i class="fa fa-weibo fa-5x"></i>
                        <span>weibo</span>
                    </a>
                    <a class="footer-github" target="_blank" href="https://github.com/messikiller">
                        <i class="fa fa-github fa-5x"></i>
                        <span>github</span>
                    </a>
                    <a class="footer-weixin" target="_blank" href="<?php echo home_url(); ?>">
                        <i class="fa fa-weixin fa-5x"></i>
                        <span>weixin</span>
                    </a>
                </div>
            </div>


            <div class="col-sm-1"></div>

            <div class="col-sm-3">
                <div class="footerwidget">
                    <h4 class="footerwidget-title"><i class="fa fa-thumbs-up"></i> 博主推荐</h4>
                    <div class="footerwidget-content footer-tag-cloud">
                        <a href="https://phphub.org/" target="_blank" class="label mylabel-5">PHPHub论坛</a>
                        <a href="http://laravelacademy.org/" target="_blank" class="label mylabel-3">laravel学院</a>
                        <a href="https://cs.phphub.org/" target="_blank" class="label mylabel-4">laravel速查表</a>
                        <a href="http://blog.too2.net:8080" target="_blank" class="label mylabel-1">辛碌力成</a>
                        <a href="http://www.bootcss.com/" target="_blank" class="label mylabel-2">bootstrap中文网</a>
                        <a href="http://www.jquery123.com/api/" target="_blank" class="label mylabel-3">jQuery API</a>
                        <a href="http://www.ghostchina.com/" target="_blank" class="label mylabel-4">Ghost中文网</a>
                        <a href="http://www.w3school.com.cn/" target="_blank" class="label mylabel-6">w3school</a>
                        <a href="http://php.net/manual/zh/" target="_blank" class="label mylabel-5">PHP手册</a>
                        <a href="https://github.com/" target="_blank" class="label mylabel-7">Github</a>
                        <a href="http://www.bootcss.com/p/stickup/" target="_blank" class="label mylabel-8">StickUp插件</a>
                        <a href="http://www.bootcss.com/p/flat-ui/" target="_blank" class="label mylabel-9">FlatUI</a>
                        <a href="http://www.bootcss.com/p/google-bootstrap/" target="_blank" class="label mylabel-2">google bootstrap UI</a>
                    </div>
                </div>
            </div>


            <div class="col-sm-1"></div>

            <div class="col-sm-2">
                <div class="footerwidget">
                    <h4 class="footerwidget-title"><i class="fa fa-weixin"></i> 公众号</h4>
                    <div class="thumbnail" id="weixin-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/image/weixin_pic.jpg" class="img-rounded" alt="Responsive image">
                    </div>
                </div>
            </div>

            <div class="col-sm-1"></div>

        </div><!-- end of row -->
    </div><!-- end of container -->

	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center footer-comment">
				<p>
					Copyright © 2015. <a href="#">messikiller's blog</a>. Powered by Wordpress
					<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254565540'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254565540%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
				</p>
				<p>
					<img src="<?php echo get_template_directory_uri(); ?>/image/countrylogo.png" alt="country" style="display:inline-block;width: 18px;">
					<a href="http://www.miitbeian.gov.cn" target="blank">粤ICP备15117370号</a>
				</p>
			</div>
		</div>
	</div>

</footer>
