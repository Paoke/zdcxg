<?php  
/*  
Template Name: 全屏页面  
*/  
?> 

	<?php get_header();?>
	
<div class="wrap">

	

	<?php 

		if(function_exists('cmp_breadcrumbs')) {

			cmp_breadcrumbs();

		}


	?>

	<div class="content-box" >



				<?php 
				
				if(have_posts()): while ( have_posts () ) :
				
				the_post ();
				$id = get_the_ID ();
				
				$linkss=get_permalink($id);
				
				$categoryId=get_the_category();

				?>
				<div class="contact-title">
				<b><?php the_title()?></b>
				</div>
				<div class="padding-left-112 contact-us">
				
					<?php the_content();?>
				</div>
				
				
				
					
				
				<?php endwhile;endif;
				?>

	
				
				<?php edit_post_link('编辑此文章', '<p>', '</p>'); ?>
			
	</div>
</div>


		
		<?php get_footer();?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

