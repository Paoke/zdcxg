<?php //分类目录?>
	<?php get_header();?>
<div class="wrap">

	

	<?php 

		if(function_exists('cmp_breadcrumbs')) {

			cmp_breadcrumbs();

		}


	?>

	<div class="content-box" >

		<div class="width-284">
			
			
			<?php dynamic_sidebar('sidebar3')?>
			
				

		</div>
		
		<div class="article-content">


					

				<?php 
				
				if(have_posts()): while ( have_posts () ) :
				
				the_post ();
				$id = get_the_ID ();
				
				$categories = wp_get_post_categories( $id, array( 'fields' => 'ids' ) );
				
				$separator = ', ';
				
				if ( $categories ) {
				
					$cat_ids = implode( ',' , $categories );
					$cats = wp_list_categories( 'title_li=&style=none&echo=0&include=' . $cat_ids );
					$cats = rtrim( trim( str_replace( '<br />',  $separator, $cats ) ), $separator );
				
					// display post categories
// 					echo  $cats;
				}




				$linkss=get_permalink($id);
				
				$categoryId=get_the_category();

				?>
				<div class="article-title">
				<h1 class="margin-top-7 margin-bottom-17 "><?php the_title()?></h1>
				
				<ul class="display-inline ">
					<li class="padding-right-50"><?php the_time('Y.m.d')?></li>
					<li class="padding-right-50"><?php echo $cats;?></li>
					<li class="padding-right-50">阅读（<?php the_views();?>）</li>
				</ul>
				</div>
				<p class="border-bottom margin-top-44 margin-bottom-29"></p>
				
				<?php the_content();?>
					
				
				<?php endwhile;endif;?>
				<?php edit_post_link('编辑此文章', '<p>', '</p>'); ?>
				</div>
			
	</div>
</div>
		
		<?php get_footer();?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		