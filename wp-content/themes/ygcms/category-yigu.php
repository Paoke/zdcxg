<?php //分类目录?>
	
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
		
		<div class="article-box">

				<div class="article-list" id="article-list">

					

				<?php 	
				
				query_posts($query_string.'&posts_per_page=6');

				if(have_posts()): while ( have_posts () ) :

				the_post ();

				$id = get_the_ID ();

				$linkss=get_permalink($id);

				?>
					<div class="article-contain" id="<?php echo 'post-'.$id;?>">

						<a href="<?php echo $linkss?>">

						<?php 

							if (has_post_thumbnail ()) {

							the_post_thumbnail ( 'full' ,array('alt'=>get_the_title(),'class'=>'img-article'));

						}?>
						</a>

						<h1><a href="<?php echo $linkss?>" class="black-link"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', get_the_title())),  0,70,"...",'utf8');?></a></h1>

						<p><img src="<?php echo get_stylesheet_uri(); ?>/../images/time.png" class="icon-15" alt="广东医谷"/><span><?php the_time('Y.m.d')?></span><span class="padding-left-20"><img src="<?php echo get_stylesheet_uri();?>/../images/read.png" class="icon-15" alt=""/>阅读（<?php the_views();?>）<span></p>

						<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', get_the_content())),  0,180,"...",'utf8');?>
						</p>

					</div>
					
				
				<?php endwhile;endif;wp_reset_query();?>
				</div>
				<div id="load_more" class="load_more text-center more">
				<?php 
					wm_load_more($query_string, 6); 
// 					kriesi_pagination($query_string.'&posts_per_page=2');
				?>
				</div>
		</div>
			
	</div>
</div>
		
		<?php ?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		