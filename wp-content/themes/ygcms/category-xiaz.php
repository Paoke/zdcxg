<?php //分类目录?>
	
<div class="wrap">

	

	<?php 

		if(function_exists('cmp_breadcrumbs')) {

			cmp_breadcrumbs();

		}


	?>

	<div class="content-box" >
			<p class="contact-title font-16 color-blue">资料下载</p>
			<p class="border-bottom margin-0"></p>
			<table class="down-list">
				<thead>
					<tr>
						<th>下载标题</th>
						<th>添加时间</th>
						<th>下载</th>
					</tr>
				</thead>
				<tbody>
				
				<?php  
				query_posts($query_string.'&posts_per_page=5');

				if(have_posts()): while ( have_posts () ) :

				the_post ();

				$id = get_the_ID ();

				$linkss=get_permalink($id);

			
				$content=get_the_content();
// 				var_dump(strip_tags($content));
				$downlinke=explode("\"", $content);
				
				?>
					<tr>
						<td>
						<?php 
							echo strip_tags($content);
// 							the_content();					
						?></td>
						<td><?php the_time('Y-m-d')?></td>
						<td><a href="<?php echo $downlinke[1];?>"><img src="<?php echo get_stylesheet_uri();?>/../images/download.png" alt="下载"/></a></td>
					</tr>
					
					<?php endwhile; endif;
					?>
					
					
				</tbody>
			</table>
				
<?php kriesi_pagination($query_string,5); ?>
	</div>
			
				


</div>
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		