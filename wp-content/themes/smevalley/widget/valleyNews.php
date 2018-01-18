<?php
/*
 *创新谷新闻
 * */
class valleyViews extends WP_Widget{
	function valleyViews(){

		$widget_ops = array('classname'=>'','description'=>'创新谷新闻');
		$this->WP_Widget($id_base = "valley",'创新谷新闻',$widget_ops);
	}
	function form($instance){
		$cat = esc_attr ( $instance ['cat'] );
		$id = esc_attr ( $instance ['id'] );
		$target = esc_attr ( $instance ['target'] );
		$title = esc_attr ( $instance ['title'] );
		$title2 = esc_attr ( $instance ['title2'] );
		$number = esc_attr ( $instance ['number'] );
		
		?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
					
				<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>
				
				<p>
					<br />请选择调用的分类
				</p>
				<label for="<?php echo $this->get_field_id('cat'); ?>">请选择分类:</label>
		<br />
		<select id="<?php echo $this->get_field_id('cat'); ?>"
			name="<?php echo $this->get_field_name('cat'); ?>">
			<option value=''>请选择</option>
		<?php
				$categorys = get_categories ( array (
						'hide_empty' => 0 
				) );
				
				foreach ( $categorys as $category ) {
					$category_id = $category->term_id;
					$category_name = $category->cat_name;
					?>
		       
					<option value='<?php echo  $category_id; ?>'
				<?php
					if ($cat == $category_id) {
						echo "selected='selected'";
					}
					?>><?php echo  $category_name; ?></option>
				<?php } ?>
			</select>
			<p>
				<br />显示个数
			</p>
			<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_attr_e('显示的条目，默认为9'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label></p>
							
				<?php 
	}
	function update($new_instance, $old_instance){
		return $new_instance;
	}
	function widget($args, $instance){
		extract ( $args );
		$id = $instance ['id'];
		$title = apply_filters ( 'widget_title', empty ( $instance ['title'] ) ? __ ( '' ) : $instance ['title'] );
		$title2 = apply_filters ( 'widget_title', empty ( $instance ['title2'] ) ? __ ( '' ) : $instance ['title2'] );
		$cat = apply_filters ( 'widget_title', empty ( $instance ['cat'] ) ? __ ( '' ) : $instance ['cat'] );
		$number = apply_filters ( 'widget_title', empty ( $instance ['number'] ) ? __ ( '0' ) : $instance ['number'] );
		$target = apply_filters ( 'widget_title', empty ( $instance ['target'] ) ? __ ( '1' ) : $instance ['target'] );
		?>
	
	<div class="news-media bg-gray text-center">
				<div class="title">
					<div class="title1"><?php echo $title ?></div>
					<div class="title2"><?php echo $title2 ?></div>
				</div>
				
				<div class="jCarouselLite box" id="demo-07">
					<ul class="news-article">
					<?php 
						$args = array (
								'cat' => $cat,
								'posts_per_page'=> $number
						);
						$query = new WP_Query ( $args );
						while ( $query->have_posts () ) :
						$query->the_post ();
							
						$id = get_the_ID ();
						$tit = get_the_title ( $id );
						$content=get_the_content($id);
						$time=get_the_time('Y-m-d',$id);
						$linkss = get_post_meta ( $id, "hoturl", true );
						
						
					?>
						<li>
							<a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>" target="_blank">
								<?php if (has_post_thumbnail ()) {
							the_post_thumbnail ( 'smevalley', array (
							'alt' => $tit,
							'title' => $tit
							) );}?>
								<div class="media-desc text-left">
									<h4><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf8');?></h4>
									<p><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $content)),  0,100,"...",'utf8');?></p>
								</div>
							</a>
						</li>
						
							<?php endwhile;?>
				
					</ul>
				</div>
				
				<div class="box text-right slider-control">
					<button class="0 active"></button>
					<button class="3"></button>
					<button class="6"></button>
				</div>
			</div>
							
				<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jcarousellite.js">
				</script>
				<script type="text/javascript">

		
				$(document).ready(function() {
					$('#demo-07').jCarouselLite({
						visible : 3,
						btnGo : [ ".0", ".1",".2",".3",".4",".5",".6" ]
					});
				});
	

				
				</script>
			
	<?php }
}
register_widget('valleyViews')
?>