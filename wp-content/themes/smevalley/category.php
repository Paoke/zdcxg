<?php 
// 分类目录
get_header ();

// 获取分类自定义字段，使用get_term_meta函数，函数第一个参数为分类id，int型
// 获取数据
$currentterm = get_queried_object (); // 获取当前分类
$taxonomy_style = get_term_meta ( $currentterm->term_id, 'taxonomy_style', true ); // taxonomy_style即配置数据中的id值
//    var_dump($taxonomy_style);                                                                             // 应用范例
if ($taxonomy_style == 'images') {
	include(TEMPLATEPATH.'/category-images.php');
} 
elseif ($taxonomy_style == 'list2') {
	include(TEMPLATEPATH.'/category-list2.php');
} 
elseif ($taxonomy_style == 'list3') {
	include(TEMPLATEPATH.'/category-list3.php');
} 
elseif ($taxonomy_style == 'list4') {
	include(TEMPLATEPATH.'/category-list4.php');
} 
elseif ($taxonomy_style == 'images5') {
	include(TEMPLATEPATH.'/category-images5.php');
} 
 
else {// 加载默认列表样式list1
	include(TEMPLATEPATH.'/category-list1.php');
}

get_footer ()?>