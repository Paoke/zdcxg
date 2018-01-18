<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_url'); ?>/../images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=0.2">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
	<?php 
	global $ashu_option;
	if ( is_home() ) {   
        bloginfo('name'); echo " - "; bloginfo('description');   
    } elseif ( is_category() ) {   
        single_cat_title(); echo " - "; bloginfo('name');   
    } elseif (is_single() || is_page() ) {   
        single_post_title(); echo " - "; bloginfo('name');  
    } elseif (is_search() ) {   
        echo "搜索结果"; echo " - "; bloginfo('name');   
    } elseif (is_404() ) {   
        echo '页面未找到!';   
    } else {   
        wp_title('',true);   
    } ?>
</title>
<?php   
if (is_home() || is_page()) {   
    // 主页description   
    $description = "中大创新谷——华南地区领先的创业孵化器。重点关注时尚创意、新技术、互联网+、O2O领域、大健康领域等，为创业者提供专业的创业指导、财务法律管理等咨询、资源对接、场地孵化以及引进天使投资等服务，旨在解决创业者不同创业阶段的需求，并为创业者提供全要素、开放式的新型创业服务平台。并凭借优秀的“RSSR”协同与互助育成体系2.0、丰富的创业资源、完善的投资体系和专业的创业导师团等，不断培育出优质项目。
		";   
  
    // 主页keywords   
    $keywords = "中大创新谷,国家级科技企业孵化器管理支持体系,国家级众创空间";   
}   
elseif (is_single()) {   
    $description1 = get_post_meta($post->ID, "description", true);   
    $description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");   
  
    // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述   
    $description = $description1 ? $description1 : $description2;   
      
    // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词   
    $keywords = get_post_meta($post->ID, "keywords", true);   
    if($keywords == '') {   
        $tags = wp_get_post_tags($post->ID);       
        foreach ($tags as $tag ) {           
            $keywords = $keywords . $tag->name . ", ";       
        }   
        $keywords = rtrim($keywords, ', ');   
    }   
}   
elseif (is_category()) {   
    $description = category_description();   
    $keywords = single_cat_title('', false);   
}   
elseif (is_tag()){   
    $description = tag_description();   
    $keywords = single_tag_title('', false);   
}   
$description = trim(strip_tags($description));   
$keywords = trim(strip_tags($keywords));   
?>   
<meta name="description" content="<?php echo $description; ?>" />   
<meta name="keywords" content="<?php echo $keywords; ?>" />  
<!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="<?php bloginfo('stylesheet_url'); ?>/../css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_url'); ?>/../css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri();?>/css/poposlides.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.min.js"></script>
<!-- 插件 -->
<?php wp_head(); ?>


</head>
<body>
	<div class="container">
		<!-- 头部 -->
		<div id="Header" class="header">
			<div class="header1">
				<div id="Logo" class="logo">
					<a href="<?php bloginfo('url')?>"><img alt="<?php bloginfo("name")?>" src="<?php echo $ashu_option['general']['_id_upload_logo'];?>"></a>
				</div>
				<?php wp_nav_menu( 
					array( 
						'theme_location'   =>'header_menu',
						'container_class' => 'nav',
						'container_id'=>'Nav',
						'menu_class'=>'topnav',
						
						'depth' =>2,
						'echo'=>true
					) ); ?>
				
			</div>
		</div>
		<div id="sub-height" class=""></div>
		
