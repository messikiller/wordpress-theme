<?php
/**
 * 禁止调用谷歌字体，以免影响网站加载速度
 * @return [type] [description]
 */
function coolwp_remove_open_sans_from_wp_core() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );

/*
 * 在主循环中截取自定义的摘要
 */
function get_the_messikiller_excerpt(){
    $r=get_the_content();
    return $r;
}
/**
 * 定义全部可选的标签颜色样式
 * @return [type] [description]
 */
function get_label_style_array()
{
    $arr=array('mylabel-1','mylabel-2','mylabel-3','mylabel-4','mylabel-5','mylabel-6','mylabel-7','mylabel-8','mylabel-9','mylabel-10');
    return $arr;
}

/**
 * 通过分类名称获取分类标签的不同标签样式
 * @param  [type] $cat_name [description]
 * @return [type]           [description]
 */
function get_cat_label_style($cat_name)
{
    $label_styles=get_label_style_array();
    $categories=get_categories(array('orderby'=>'name','order'=>'ASC'));
    $categories_array=array();
    foreach ($categories as $category) {
        $categories_array[]=$category->name;
    }

    if ( ! in_array($cat_name, $categories_array) ) {
        return null;
    }

    $labels_count=count($label_styles);
    $category_count=array_keys($categories_array, $cat_name)[0]+1;
    $index=$category_count % $labels_count;
    $r=$label_styles[$index];

    return $r;
}

/**
 * 根据标签名称为不同标签匹配不同的标签样式
 * @param  [type] $tag_name [description]
 * @return [type]           [description]
 */
function get_tag_label_style($tag_name)
{
    $label_styles=get_label_style_array();
    $tags=array();

    $alltags = get_tags();
    foreach ($alltags as $value) {
        $tags[]=$value->name;
    }

    if( ! in_array($tag_name, $tags) ){
        return null;
    }

    $label_count=count($label_styles);
    $tag_count=array_keys($tags, $tag_name)[0]+1;
    $index=$tag_count % $label_count;
    $r=$label_styles[$index];

    return $r;

}

/**
 * 边栏彩色标签云样式
 * 开门找车不如闭门造车s
 */

function get_messikiller_tags_cloud()
{
    $tags = get_tags();
    foreach ($tags as $tag){
        $tag_link = get_tag_link($tag->term_id);

        $tag_label_style=get_tag_label_style($tag->name);

        $html .= "<a href='{$tag_link}' title='{$tag->name}' class='label {$tag_label_style}'>{$tag->name}</a>";
    }
    echo $html;
}

/**
 * 统计文章浏览次数
 */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/**
 * 获取文章末尾前后篇文章链接
 */
function get_previous_next_link()
{
    $next_post = get_next_post();
    if (!empty( $next_post )):
?>
<span class="privious-link">
    <span class="label label-success"><i class="fa fa-hand-o-left"></i>上一篇：</span>&nbsp;<a title="<?php echo $next_post->post_title; ?>" href="<?php echo get_permalink( $next_post->ID ); ?>" rel="external nofollow" ><?php echo $next_post->post_title; ?></a>
</span>
<?php
    endif;
    $prev_post = get_previous_post();
    if (!empty( $prev_post )):
?>
<span class="next-link">
    <span class="label label-success"><i class="fa fa-hand-o-right"></i>下一篇：</span>&nbsp;<a title="<?php echo $prev_post->post_title; ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>" rel="external nofollow" ><?php echo $prev_post->post_title; ?></a>
</span>
<?php
    endif;
}

/*
 * 给激活的导航菜单添加 .active
 */
function mytheme_nav_menu_css_class( $classes ) {
     if ( in_array('current-menu-item', $classes ) or  in_array( 'current-menu-ancestor', $classes ) ){
        $classes[]='my-active-li';

        $tmp1=array_search('current-menu-item', $classes);
        $classes[$tmp1]='';

     }

     return $classes;
}
add_filter( 'nav_menu_css_class', 'mytheme_nav_menu_css_class' );

/**
 * 获取页面的完整URL
 * @return [type] [description]
 */
function curPageURL()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    }
    else
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

/**
 * 生成首页导航条，自动匹配URL为标题添加active类
 * @return [type] [description]
 */
function general_messikiller_nav_menu()
{
    $arg=array(
        //指定显示的导航名，如果没有设置，则显示第一个
        'theme_location'  => '',
        'menu'            => 'header-menu',
        //最外层容器标签名
        'container'       => 'div',
        //最外层容器class名
        'container_class' => 'collapse navbar-collapse',
        //最外层容器id值
        'container_id'    => 'my-main-menu',
        //ul标签class
        'menu_class'      => 'my-menu',
        //ul标签id
        'menu_id'         => '',
        //是否打印，默认是true，如果想将导航的代码作为赋值使用，可设置为false
        'echo'            => true,
        //备用的导航菜单函数，用于没有在后台设置导航时调用
        'fallback_cb'     => 'wp_page_menu',
        //显示在导航a标签之前
        'before'          => '',
        //显示在导航a标签之后
        'after'           => '',
        //显示在导航链接名之后
        'link_before'     => '',
        //显示在导航链接名之前
        'link_after'      => '',
        'items_wrap'      => '<ul class="my-menu"><li class="my-active-li"><a href="'.home_url().'">home</a></li>%3$s</ul>',
        //显示的菜单层数，默认0，0是显示所有层
        'depth'           => 0,
        //调用一个对象定义显示导航菜单
        'walker'          => ''
    );

    $current_url = curPageURL();
    $pattern='/.+\/\?cat=[0-9]+$/i';
    if ( preg_match($pattern, $current_url) == 1 ) {
        $arg['items_wrap']='<ul class="my-menu"><li><a href="'.home_url().'">home</a></li>%3$s</ul>';
    }

    wp_nav_menu($arg);
}

/**
 *自动生成页面底部的翻页按钮
 */

function par_pagenavi($range = 3)
{
    global $paged, $wp_query;

    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }

    if($max_page > 1)
    {
        if(!$paged){
            $paged = 1;
        }

        if ($paged==1) {
            echo '<li class="disabled"><a href="'.get_pagenum_link($paged-1).'" aria-label="Privious"><span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span></a></li>';
        }
        else{
            echo '<li><a href="'.get_pagenum_link($paged-1).'" aria-label="Privious"><span aria-hidden="true"><i class="fa fa-long-arrow-left"></i></span></a></li>';
        }

        if($max_page > $range){
            if($paged < $range){
                for($i = 1; $i <= ($range + 1); $i++){
                    echo "<li";
                    if($i==$paged) {
                        echo " class='active'";
                    }
                    echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
                }
            }
            elseif($paged >= ($max_page - ceil(($range/2)))){
                for($i = $max_page - $range; $i <= $max_page; $i++){
                    echo "<li";
                    if($i==$paged){
                        echo " class='active'";
                    }
                    echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";;
                }
            }
            elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                    echo "<li";
                    if($i==$paged) {
                        echo " class='active'";
                    }
                    echo"><a href='" . get_pagenum_link($i) ."'>$i</a></li>";

                }
            }
        }
        else{
            for($i = 1; $i <= $max_page; $i++){
                echo "<li";
                if($i==$paged) {
                    echo " class='active'";
                }
                echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
            }
        }

        if ($paged==$max_page) {
            echo '<li class="disabled"><a href="'.get_pagenum_link($paged+1).'" aria-label="Next"><span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span></a></li>';
        }
        else{
            echo '<li><a href="'.get_pagenum_link($paged+1).'" aria-label="Next"><span aria-hidden="true"><i class="fa fa-long-arrow-right"></i></span></a></li>';
        }
    }
}

function messikiller_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    global $commentcount,$wpdb, $post;
    if(!$commentcount)
    {
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1' AND !comment_parent");
        $cnt = count($comments);
        $page = get_query_var('cpage');
        $cpp=get_option('comments_per_page');
        if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp)))
        {
            $commentcount = $cnt + 1;
        }
        else
        {
            $commentcount = $cpp * $page + 1;
        }
    }
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" itemprop="reviews" itemscope itemtype="http://schema.org/Review" >
    <?php $add_below = 'div-comment'; ?>
    <div class="comment-author">
        <?php
            $username=get_comment_author( $comment_ID );
            if ( $username=='messikiller' )
            {
        ?>
            <img alt="messikiller" src="<?php echo get_template_directory_uri(); ?>/image/host.png" class="img-circle" height="40" width="40"></img>
        <?php
            }
            else{
        ?>
            <img alt="guest" src="<?php echo get_template_directory_uri(); ?>/image/guest.png" class="img-circle" height="40" width="40"></img>
        <?php } ?>
    </div>
    <div class="comment-main">
        <div class="comment-meta">
            <span class="author-name"><?php comment_author_link() ?></span>
            <span class="date-time"><?php messikiller_comment_time(); ?></span>
            <span class="edit-link"><?php edit_comment_link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;编辑'); ?></span>

            <span class="reply">
                <?php
                    comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-comments" aria-hidden="true"></i>&nbsp;回复', 'add_below' =>$add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
                ?>
            </span>
        </div>

        <div class="comment-content">
            <?php comment_text() ?>
        </div>

    </div>

<?php
}

function messikiller_end_comment()
{
    echo '</li>';
};

function add_highlight_code_button()
{

?>

<script type="text/javascript">
QTags.addButton( 'highlight_code', 'HighlightCode', '<pre><code class="php">\n','\n</code></pre>' );
QTags.addButton( 'title-1', 'title-1', '<span class="title1">','</span>' );
</script>

<?php

}
add_action('admin_print_footer_scripts', 'add_highlight_code_button' );

function messikiller_comment_time()
{
    date_default_timezone_set('Asia/Shanghai');
    $Y=get_comment_date("Y");
    $m=get_comment_date("m");
    $d=get_comment_date("d");
    $H=get_comment_time("H");
    $i=get_comment_time("i");
    $s=get_comment_time("s");

    $o_timestamp = mktime($H, $i, $s, $m, $d, $Y);
    $c_timestamp = time();

    $delta_timestamp = $c_timestamp - $o_timestamp;
    $delta_day  = floor($delta_timestamp / (24*60*60) );
    $delta_hour = floor($delta_timestamp / (60*60) );
    $delta_min  = floor($delta_timestamp / 60 );

    if ($delta_timestamp < 60) {
        $str = $delta_timestamp . '秒前';
    } elseif ($delta_timestamp < (60*60) && $delta_timestamp >= (60) ) {
        $str = $delta_min . '分钟前';
    } elseif ($delta_timestamp < (24*60*60) && $delta_timestamp >= (60*60) ) {
        $str = $delta_hour . '小时前';
    } elseif ($delta_timestamp < (7*34*60*60) && $delta_timestamp >= (24*60*60) ) {
        $str = $delta_day . '天前';
    } else {
        $str = date('Y年m月d日', $o_timestamp);
    }
    echo $str;
}

//处理<pre><code>标签中高亮代码片段特殊字符转义和代码开头匹配换行的问题
function wch_stripslashes($code){
        $code=str_replace('\\"', '"',$code);
        $code=htmlspecialchars($code,ENT_NOQUOTES);
        return $code;
}
function wp_code_highlight_filter($content) {
	return preg_replace_callback("/<pre>[\n\r]*<code(.*?)>[\n\r]*(.*?)<\/code>[\n\r]*<\/pre>/is", function($match){
		return '<pre><code'. wch_stripslashes($match[1]) .'>'. wch_stripslashes($match[2]) .'</code></pre>';
	}, $content);

}
add_filter('the_content', 'wp_code_highlight_filter', 2);
add_filter('comment_text', 'wp_code_highlight_filter', 2);

/**
 * 获取当前日期和发工资日期间的差距
 */
function salary_distance()
{
	$c_time_arr = getdate();

	if ($c_time_arr['mon'] == 12) {
		$next_month = 1;
		$next_year = $c_time_arr['year'] + 1;
	} else {
		$next_month = $c_time_arr['mon'] + 1;
		$next_year = $c_time_arr['year'];
	}

	$c_timestamp = mktime(0, 0, 0, $c_time_arr['mon'], $c_time_arr['mday'], $c_time_arr['year']);
	$n_timestamp = mktime(0, 0, 0, $next_month, 1, $next_year);

	$delta_day = ceil(($n_timestamp - $c_timestamp) / (24 * 60 * 60));

	$r = '距离发工资还有' . $delta_day . '天喔 (*_*)';
	return $r;
}
?>
