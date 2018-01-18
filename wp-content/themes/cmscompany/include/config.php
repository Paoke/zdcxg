<?php
/**
*Author: Ashuwp
*Author url: http://www.ashuwp.com
*Version: 3.0
**/

/*********后台设置页面************/
$page_info = array(
  'full_name' => '主题设置',
  'optionname'=>'general',
  'child'=>false,
  'filename' => 'generalpage'
);

$ashu_options = array();

$ashu_options[] = array(
  'type' => 'open',
  'name' => 'hello world.',
  'id'   => '_id_open'
);



$ashu_options[] = array(
  'name' => '主题选项',
  'id'   => '_id_title',
  'desc' => '',
  'type' => 'title'
);


$ashu_options[] = array(
  'name' => 'logo',
  'id'   => '_id_upload_logo',
  'desc' => '请上传图片，如果要删除，请删除输入框中的连接',
  'std'  => '',
  'size' => 40,
  'button_text' => '上传',
  'type' => 'upload'
);
$ashu_options[] = array(
  'name' => '首页焦点图1',
  'id'   => '_id_upload_1',
  'desc' => '请上传图片，如果要删除，请删除输入框中的连接',
  'std'  => '',
  'size' => 40,
  'button_text' => '上传',
  'type' => 'upload'
);
$ashu_options[] = array(
  'name' => '首页焦点图2',
  'id'   => '_id_upload_2',
  'desc' => '请上传图片，如果要删除，请删除输入框中的连接',
  'std'  => '',
  'size' => 40,
  'button_text' => '上传',
  'type' => 'upload'
);
$ashu_options[] = array(
  'name' => '首页焦点图3',
  'id'   => '_id_upload_3',
  'desc' => '请上传图片，如果要删除，请删除输入框中的连接',
  'std'  => '',
  'size' => 40,
  'button_text' => '上传',
  'type' => 'upload'
);


$ashu_options[] = array(
		'name' => '底部模块3-标题',
		'id'   => '_id_text_3',
		'desc' => '默认联系我们',
		'std'  => '联系我们',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块3-电话',
		'id'   => '_id_text_phone',
		'desc' => '不写将会不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块3-传真',
		'id'   => '_id_text_chuanzhen',
		'desc' => '不写将会不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块3-邮箱',
		'id'   => '_id_text_mail',
		'desc' => '不写将会不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块3-qq',
		'id'   => '_id_text_qq',
		'desc' => '不写将会不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);


$ashu_options[] = array(
		'name' => '底部模块4-标题',
		'id'   => '_id_text_4',
		'desc' => '默认为关注我们',
		'std'  => '关注我们',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块4-微博或者Facebook',
		'id'   => '_id_text_41',
		'desc' => '微博或Facebook的文字',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块4-链接',
		'id'   => '_id_text_42',
		'desc' => '微博或Facebook的链接',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);

$ashu_options[] = array(
		'name' => '底部模块4-微信二维码',
		'id'   => '_id_text_43',
		'desc' => '请上传微信二维码',
		'std'  => '',
		'size' => 40,
		'button_text' => '上传',
		'type' => 'upload'
);


$ashu_options[] = array(
		'name' => '底部模块5-公司地址',
		'id'   => '_id_text_51',
		'desc' => '请填写公司的地址或其他，不填写将不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块5-技术支持公司',
		'id'   => '_id_text_52',
		'desc' => '请填写技术支持的公司，不填写将不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);
$ashu_options[] = array(
		'name' => '底部模块5-ICP备案号',
		'id'   => '_id_text_53',
		'desc' => '请填写ICP备案号，不填写将不显示',
		'std'  => '',
		'size' => 40,
		'type' => 'text'
);



$ashu_options[] = array(
  'type' => 'close',
  'name' => 'hello world.',
  'id'   => '_id_open'
);
$option_page = new ashu_option_class($ashu_options, $page_info);



/**************************分类下增加功能*****************************/

$ashu_feild = array();
$taxonomy_cof = array('category','post_tag');

$ashu_feild[] = array(
		'name'    => '分类模板',
 	 	'id'      => 'taxonomy_style',
  		'desc'    => '请选择样式',
  		'std'     => 'list1',
  		'buttons' => array(
    	'list1'   => '图文列表1',
    	'list2'   => '图文列表2',
    	'list3'   => '文字列表概要显示',
    	'list4'   => '文字列表概要隐藏',
   		'images' => '图片列表'
  ),
  'edit_only'   => false,
  'type'    => 'radio'
);

$ashu_taxonomy_feild = new ashu_taxonomy_feild($ashu_feild, $taxonomy_cof);



















?>