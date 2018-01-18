<?php //搜索页面?>
	<?php get_header();?>
	<div class="container">
		<?php
		
if (have_posts ()) :
			while ( have_posts () ) :
				the_post ();
				?>
		<div class="post">
			<h2>
				<a href="<?php the_permalink()?>"><?php the_title();?></a>
			</h2>
			<div class="postmetadata"><?php
				__ ( "分类:" );
				the_category ( ',' );
				_e ( '作者：' );
				the_author ();
				_e ( ',id:' );
				the_ID ();
				comments_popup_link ( '暂无评论', '有一条评论', '', 'comm', '评论功能被关闭' );
				edit_post_link ( '编辑' );
				?></div>
			<div class="entry"><?php the_excerpt();	?></div>
		</div>
		<div class="navlink"><?php posts_nav_link()?></div>
		<?php endwhile;endif;?>
		
		<?php get_footer()?>