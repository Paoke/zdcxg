<?php //分类目录?>
	<?php get_header();?>
	<div class="category-list category-images">
		
		
		
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
		query_posts($query_string.'&posts_per_page=9');
		$wx=0;
		while ( have_posts () ) :
				the_post ();
				$tit=get_the_title();
				$id = get_the_ID ();
				$linkss=get_permalink($id);
				$wx++;
				?>
		<div class="post-list post-images"<?php if($wx%3==0){echo 'style="margin-right:0px;"';}?>>
			<a href="<?php echo $linkss?>" class="post-list-a post-images-a">
			<?php 
				if (has_post_thumbnail ()) {
							the_post_thumbnail ( 'full' ,array('alt'=>get_the_title(),'class'=>'post-images-img'));
						}?>
			
			</a>
			<h2>
				<a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$tit)), 0,20,"...",'utf8');?></a>
			</h2>
			
		</div>
				
		
		
		
<?php endwhile;endif;?>
<?php kriesi_pagination($query_string,9); ?>
	</div>
		
		<?php get_footer()?>