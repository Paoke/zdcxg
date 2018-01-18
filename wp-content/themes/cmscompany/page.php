<?php get_header(); ?>



<div id="pages">



	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="page1" id="page1-<?php the_ID(); ?>">
		<div class="page-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="page-title-a"><?php the_title(); ?></a>
			<!-- 面包屑 -->
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
		</div>


		<div class="entry">



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







<?php get_footer(); ?>