<?php //分类目录?>
	<?php get_header();?>
	<div class="category-list category-list4">
		
		
		
		<?php
if (have_posts ()) :
$category=get_the_category();
$category_name=$category[0]->cat_name;
$category_link=get_category_link($category[0]);
?>
				
		<div class="page-title">
			<a href="<?php echo $category_link ?>" title="<?php echo $category_name; ?>" class="page-title-a"><?php echo $category_name ?></a>
			<!-- 面包屑 -->
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
		</div>
		<?php 	while ( have_posts () ) :
				the_post ();
				$id = get_the_ID ();
				$linkss=get_permalink($id);
				?>
		<div class="post-list post-list4">
			
			<h2 class="category-h2">
				<a href="javascript:;"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', get_the_title())),  0,70,"...",'utf8');?></a>
				<a href="javascript:;" class="category-moredown"><img alt="" src="<?php echo get_stylesheet_directory_uri()?>/images/moredown.png"></a>
				<a href="javascript:;" class="category-moreup"><img alt="" src="<?php echo get_stylesheet_directory_uri()?>/images/moreup.png"></a>
			</h2>
			
			<div class="category-desc"><?php echo get_the_content($id); ?></div>
			
		</div>
				
		
		
		
<?php endwhile;endif;?>
<?php kriesi_pagination($query_string); ?>
	</div>
		
		<?php get_footer()?>
		
		
		
		
		
		
		
		
		
		