<?php //分类目录?>
	<?php get_header();?>
	<div class="category-list category-images">
		
		
		
		<?php
if (have_posts ()) :

$category=get_category($cat);
$category_name=$category->cat_name;
$category_link=get_category_link($category);
?>
				
		<div class="page-title margin-bottom-34">
	<a href="<?php echo $category_link; ?>"  class="page-title-a" id="category-<?php echo $category_name?>">
			<?php 
			echo $category_name;
			?></a>
			<!-- 面包屑 -->
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
		</div>
		<?php 	
		$wx=0;
		query_posts($query_string.'&posts_per_page=20');
		while ( have_posts () ) :
				the_post ();
				$tit=get_the_title();
				$id = get_the_ID ();
				$linkss=get_permalink($id);
				$content=get_the_content();
				$arr=explode('"', $content);
				$wx++;
				?>
		<div class="mentor-list"<?php if($wx%5==0){echo 'style="margin-right:0px;"';}?>>
			<div class="wrap-mentor">
				<a href="javascript:;">
				
				<?php 
					if (has_post_thumbnail ()) {
								the_post_thumbnail ( 'full' ,array('alt'=>get_the_title(),'class'=>'mentor-img'));
							}?>
				
				</a>
			</div>
			<h3 class="mentor-name">
				<a href="javascript:;">
					<?php 
							echo mb_strimwidth(strip_tags(apply_filters('the_title',$tit)), 0,18,"...",'utf8');
							//echo $tit;
					?>
					
				</a>
			</h3>
			<h2 class="padding-bottom-15 f-14">
				<a href="javascript:;">
					<?php 
							echo mb_strimwidth(strip_tags(apply_filters('the_title',$content)), 0,26,"...",'utf8');
							//echo $tit;
					?>
					
				</a>
			</h2>		</div>
			
				
		
		
		
<?php endwhile;wp_reset_query();endif;?>

	</div>
	<?php kriesi_pagination($query_string); ?>	
		<?php get_footer()?>
