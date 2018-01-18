<?php get_header(); ?>



<div id="container">



	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); 
		$category = get_the_category();
		$cateLink=get_category_link($category[0]->term_id);	
	?>
	
		<div class="page1" id="page1-<?php the_ID(); ?>">
		<div class="page-title">
			<a href="<?php echo $cateLink; ?>" title="<?php echo $category[0]->cat_name; ?>" class="page-title-a" id="category-<?php echo $category[0]->cat_ID?>"><?php echo $category[0]->cat_name; ?></a>
			
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
		</div>


		<div class="entry">


				<div class="single-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="single-title-a"><?php the_title(); ?></a></div>
				<div class="single-time"><?php the_time('Y年m月d日')?></div>
				<?php the_content(); ?>

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<?php edit_post_link('编辑此文章', '<p>', '</p>'); ?>



			</div>



	</div>



	<?php endwhile; ?>



	<?php else : ?>



		<div class="post">

		<h2><?php _e('not fond'); ?></h2>

	</div>



	<?php endif; ?>



</div>
<script>
	$(function(){
		if($('.current-post-ancestor').parent('ul').parent('li')['length']!=0){
			$('.current-post-ancestor').parent('ul').parent('li').children('a').addClass('won');
// 			console.log($('.current-post-ancestor').parent('ul').parent('li').children('a'));
			$('#sub-height').addClass('sub-height');
			//$('#sub-height').append($('.current-post-ancestor').parent('ul'));
		}	
	})

</script>







<?php get_footer(); ?>