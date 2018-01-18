<?php //分类目录?>
	<?php get_header();?>
	<div class="category-list category-list2">
		
		
		
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
		<?php 	
		query_posts($query_string.'&posts_per_page=3');
		while ( have_posts() ) :
				the_post ();
				$id = get_the_ID ();
				$linkss=get_permalink($id);
				?>
		<div class="post-list post-list2">
			<a href="<?php echo $linkss?>" class="post-list-a post-list2-a">
			<?php 
				if (has_post_thumbnail ()) {
							the_post_thumbnail ( 'full' ,array('alt'=>get_the_title(),'class'=>'post-list2-img'));
						}?>
			
			</a>
			<div class="zj">
			<h2>
				<a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', get_the_title())),  0,70,"...",'utf8');?></a>
			</h2>
			
			<p class="category-desc"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_content($id))),0,900,"...",'utf-8'); ?></p>
			</div>
		</div>
				
		<div class="clear"></div>
		
		
		
<?php endwhile;endif;wp_reset_query()?>
	</div>
<?php kriesi_pagination($query_string,3); ?>
		
		<?php get_footer()?>