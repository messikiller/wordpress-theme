<header class="my-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<img src="<?php echo get_template_directory_uri(); ?>/image/mylogo.jpg" class="img-circle center-block" alt="site-logo">
				<div style="height:25px;"></div>
				
				<span class="header-info">折而不挠，终不为下</span>
				<div class="container" style="width:290px"><hr class="header-info-divider"></hr></div>
				<span class="header-info">&nbsp;&nbsp;welcome to messikiller's home</span>
			</div>
		</div>
	</div>
</header>

<div id="stickup-nav" style="width:100%; z-index:100;">
    <nav class="my-nav navbar navbar-static-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ul id="my-navbar">

	                    <?php if (!is_category()): ?>

							<li class="current-cat"><a href="<?php echo get_settings('home'); ?>/" title="<?php bloginfo('description'); ?>">Home</a></li>

	            		<?php else: ?>

							<li><a href="<?php echo get_settings('home'); ?>/" title="<?php bloginfo('description'); ?>">Home</a></li>

	            		<?php endif; ?>
                         
                        	<?php wp_list_categories('hide_empty=0&title_li=&depth=2'); ?> 

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<p id="back-to-top">	
	<a href="#"><i class="fa fa-arrow-circle-o-up fa-4x"></i>TOP<a>
</p>
