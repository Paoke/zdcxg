<?php
// include_once 'fn.php';
// include_once (TEMPLATEPATH.'/widget/introduce.php');
// include_once (TEMPLATEPATH.'/widget/News.php');
include_once (TEMPLATEPATH.'/widget/sixnews.php');
// include_once (TEMPLATEPATH.'/widget/picNews.php');
// include_once (TEMPLATEPATH.'/widget/carousel.php');
include_once (TEMPLATEPATH.'/widget/carousel2.php');
include_once (TEMPLATEPATH.'/widget/nav.php');
include_once (TEMPLATEPATH.'/widget/groupIntroduce.php');
include_once (TEMPLATEPATH.'/widget/business.php');

//加载留言模块
require (TEMPLATEPATH.'/ful/message.php');
require (TEMPLATEPATH.'/ful/doMessage.php');


//加载 阿树后台
require get_template_directory() . '/include/metaboxclass.php';
require get_template_directory() . '/include/simple-term-meta.php';
require get_template_directory() . '/include/class-taxonomy-feild.php';
require get_template_directory() . '/include/optionclass.php';
require get_template_directory() . '/include/import_export.php';
require get_template_directory() . '/include/config.php';





//注册侧边栏
if ( function_exists('register_sidebar') ) {   
  register_sidebar(array(   
    'name'=>'首页边栏', 
    'id'=>'sidebar1',  
    'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',   
    'after_widget' => '</li>',   
    'before_title' => '<h3>',   
    'after_title' => '</h3>',   
  ));   
  register_sidebar(array(   
    'name'=>'侧边栏', 
    'id'=>'sidebar3',  
    'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',   
    'after_widget' => '</li>',   
    'before_title' => '<h3>',   
    'after_title' => '</h3>',   
  ));   
  
  register_sidebar(array(   
    'name'=>'脚部边栏', 
    'id'=>'sidebar2',  
    'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',   
    'after_widget' => '</li>',   
    'before_title' => '<h3>',   
    'after_title' => '</h3>',   
  ));   
 }
   


//注册导航菜单

if( function_exists('register_nav_menus') ){   
    register_nav_menus(   
        array(   
            'header_menu' => __('主导航菜单' ), 
            'footer_menu1' =>__('脚部菜单1'), 
            'footer_menu2' =>__('脚部菜单2') 
        )   
    );   
}


//wp_head() 函数精简
remove_action('wp_head', 'index_rel_link');//当前文章的索引 
remove_action('wp_head', 'feed_links_extra', 3);// 额外的feed,例如category, tag页 
remove_action('wp_head', 'start_post_rel_link', 10, 0);// 开始篇 
remove_action('wp_head', 'parent_post_rel_link', 10, 0);// 父篇 
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // 上、下篇. 
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre 
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink 
remove_action('wp_head', 'rel_canonical' ); 
wp_deregister_script('l10n'); 
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI" 
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest" 
remove_action('wp_head','rsd_link');//rsd_link移除XML-RPC 
remove_filter('the_content', 'wptexturize');//禁用半角符号自动转换为全角
//remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));


/**
 * WordPress 添加面包屑导航
 * http://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
function cmp_breadcrumbs() {
	$delimiter = '>'; // 分隔符
	$before = '<span class="current">'; // 在当前链接前插入
	$after = '</span>'; // 在当前链接后插入
	if ( !is_home() && !is_front_page() || is_paged() ) {
		
		echo '<ul class="breadcrumb" >'.__( '' , 'cmp' );
		global $post;
		$homeLink = home_url();
		echo '<li> <a href="'. $homeLink .'">' . __( '首页' , 'cmp' ) . '</a></li> ' . $delimiter . ' ';
		if ( is_category() ) { // 分类 存档
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0){
				$cat_code = get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<li><a','<li> <a  itemprop="breadcrumb"', $cat_code );
			}
			echo $before . '' . single_cat_title('', false) . '' . $after;
		} elseif ( is_day() ) { // 天 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) { // 月 存档
			echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) { // 年 存档
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) { // 文章
			if ( get_post_type() != 'post' ) { // 自定义文章类型
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else { // 文章 post
				$cat = get_the_category(); $cat = $cat[0];
				$cat_code = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $cat_code = str_replace ('<a','<a itemprop="breadcrumb"', $cat_code );
				echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) { // 附件
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) { // 页面
			echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) { // 父级页面
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} elseif ( is_search() ) { // 搜索结果
			echo $before ;
			printf( __( 'Search Results for: %s', 'cmp' ),  get_search_query() );
			echo  $after;
		} elseif ( is_tag() ) { //标签 存档
			echo $before ;
			printf( __( 'Tag Archives: %s', 'cmp' ), single_tag_title( '', false ) );
			echo  $after;
		} elseif ( is_author() ) { // 作者存档
			global $author;
			$userdata = get_userdata($author);
			echo $before ;
			printf( __( 'Author Archives: %s', 'cmp' ),  $userdata->display_name );
			echo  $after;
		} elseif ( is_404() ) { // 404 页面
			echo $before;
			_e( 'Not Found', 'cmp' );
			echo  $after;
		}
		if ( get_query_var('paged') ) { // 分页
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
				echo sprintf( __( '( Page %s )', 'cmp' ), get_query_var('paged') );
		}
		echo '</ul>';
	}
}


//分页
function kriesi_pagination($query_string,$posts_per_page){
	global $paged;
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");
	$total_posts = $my_query->post_count;
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;
	$range = 2; // only edit this if you want to show more page-links
	$showitems = ($range * 2)+1;
	$pages = ceil($total_posts/$posts_per_page);
	if(1 != $pages){
		echo "<div class='pagination-single'>";
		echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>首页</a>":"";
		echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";
		 
		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}

		echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";
		echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>尾页</a>":"";
		echo "</div>\n";
	}
}

//加载更多
function wm_load_more($query_string,$per_page){
	$posts_per_page=$per_page;
	$paged=$_REQUEST['paged'];
	
	$my_query=new WP_Query($query_string."&posts_per_page=-1");
	
	$total_posts=$my_query->post_count;
	
	if(empty($paged)){
	
		$paged=1;
	}

	$paged++;
	
	
	$pages=ceil($total_posts/$per_page);
	
	if(1<$pages){
		$wm_paged_uri=get_pagenum_link($paged);
		echo $paged<=$pages?"<a href='".$wm_paged_uri."'>加载更多...</a>":"";
	}
}


//特色图片
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'pic', 320, 182,true );
	add_image_size( 'category', 320, 178,true );
	add_image_size( 'carousel', 138, 138,true );
	add_image_size( 'sixnews', 377, 222,true );
}

//增强编辑器开始

function add_editor_buttons($buttons) {

	$buttons[] = 'fontselect';

	$buttons[] = 'fontsizeselect';

	$buttons[] = 'cleanup';

	$buttons[] = 'styleselect';

	$buttons[] = 'hr';

	$buttons[] = 'del';

	$buttons[] = 'sub';

	$buttons[] = 'sup';

	$buttons[] = 'copy';

	$buttons[] = 'paste';

	$buttons[] = 'cut';

	$buttons[] = 'undo';

	$buttons[] = 'image';

	$buttons[] = 'anchor';

	$buttons[] = 'backcolor';

	$buttons[] = 'wp_page';

	$buttons[] = 'charmap';

	return $buttons;

}
add_filter("mce_buttons_3", "add_editor_buttons");
//所有字体
function custum_fontfamily($initArray){
	$initArray['font_formats'] = "'微软雅黑=微软雅黑;宋体=宋体;黑体=黑体;仿宋=仿宋;楷体=楷体;隶书=隶书;幼圆=幼圆;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';";
	return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');
function enable_more_buttons($buttons) {
	$buttons[] = 'styleselect';
	$buttons[] = 'fontselect';
	return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");


//增强编辑器结束



add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
	if(!session_id()) {
		session_start();
	}
}

function myEndSession() {
	session_destroy ();
}


//联系我们页面提交表单
add_action( 'wp_ajax_nopriv_mess', 'myajax_submit' );
add_action( 'wp_ajax_mess', 'myajax_submit' );

function myajax_submit() {
	
	new DoMessageView($_POST);
// 	$arr=DoMessageView::get_mess("leave_mess");
// 	var_dump($arr);
	echo "提交成功";

	exit;
}


?>










