<?php
/*
 * 新闻滚动
 * */
class Carousel2Views extends WP_Widget{
	function __construct(){
		$widget_ops = array('classname'=>'construct2','description'=>'医谷新闻滚动');
		$this->WP_Widget($id_base = "carsoule2",'医谷新闻滚动',$widget_ops);
	}
	function form($instance){
		$cat = esc_attr ( $instance ['cat'] );
		$id = esc_attr ( $instance ['id'] );
		$target = esc_attr ( $instance ['target'] );
		$title = esc_attr ( $instance ['title'] );
		$title2 = esc_attr ( $instance ['title2'] );
		$number = esc_attr ( $instance ['number'] );
		
		?>
				
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
				<br />请选择每次滚动的个数(请保证：所有条目/每次滚动个数=0)
			</p>
			<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_attr_e('每次滑动的个数,默认为0,不滑动:'); ?> 
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
	
	<div class="carousel wm-margin-top-41" style="background: none;">
				<div class="box">
					<h1 style="color:#686868; text-align: left; margin-bottom:31px;">合作企业</h1>
					<div class="carousel-list" id="carousel1">
						<ul>
						<?php 
						$args = array (
								'cat' => $cat,
								'posts_per_page'=>-1
						);
						$query = new WP_Query ( $args );
						while ( $query->have_posts () ) :
							$query->the_post ();
							
							$id = get_the_ID ();
							$tit = get_the_title ( $id );
							$time=get_the_time('Y-m-d',$id);
							$linkss = get_post_meta ( $id, "hoturl", true );
						
						?>
							<li>
								<a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>" target="_blank">
							<?php if (has_post_thumbnail ()) {
							the_post_thumbnail ( 'carousle', array (
							'alt' => $tit,
							'title' => $tit
							) );
						}?>
								</a>
								<div class="carousel-desc"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,20,"...",'utf8');?></div>
							</li>
							
							<?php endwhile;?>
						</ul>
					</div>
					<div class="news-more">
						<!-- <div class="line"></div> -->
						<a href="javascript:;" class="next" id="next1">换一批
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> <a href="<?php echo get_category_link($cat)?>">更多>></a>
					</div>
				</div>
				<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jcarousellite.js">
				</script>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#carousel1').jCarouselLite({
							btnPrev : '',
							btnNext : '#next1',
							auto :2000,
							circular : true,
							visible : 7,
							scroll : <?php echo $number?>
						});
					});
				</script>
			</div>
	<?php }
}
wp_reset_query();
register_widget('Carousel2Views')
?>