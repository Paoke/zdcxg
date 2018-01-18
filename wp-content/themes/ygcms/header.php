<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico">
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
    $description = "广东医谷产业园投资管理股份有限公司（以下简称'广东医谷'）,是落地南沙的第一个运营管理医疗器械及生物技术产业孵化器的专业管理公司。广东医谷是由中大创投整合达安基因、奥咨达与易方达大健康并购基金等资源和相关上下游业态资源，按照构建完善生态产业链原则，以医疗器械、生物科技产品生产为核心，以创新研发为驱动，以注册认证、仓储物流、供应链金融、会展商贸为支撑的拟建成华南区地区集生产、研发、会展商贸、金融咨询、产业投资基金等功能于一体的现代产业集群。";   
  
    // 主页keywords   
    $keywords = "广东医谷 	广东医谷产业园投资管理股份有限公司  医疗器械  生物技术";   
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
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_url'); ?>/../css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_url'); ?>/../css/yigul.css" rel="stylesheet" type="text/css" />
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
		
