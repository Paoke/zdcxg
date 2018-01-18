<?php
/*
 * 图片新闻列表
 * */
class PicViews extends WP_Widget{
	function PicViews(){
		$widget_ops = array('classname'=>'pic','description'=>'图片新闻栏目');
		$this->WP_Widget($id_base = "pic",'图片新闻',$widget_ops);
	}
	function form($instance){
		$cat = esc_attr ( $instance ['cat'] );
		$id = esc_attr ( $instance ['id'] );
		$target = esc_attr ( $instance ['target'] );
		$title = esc_attr ( $instance ['title'] );
		$title2 = esc_attr ( $instance ['title2'] );
		$zhiding = esc_attr ( $instance ['zhiding'] );
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
		$zhiding = apply_filters ( 'widget_title', empty ( $instance ['zhiding'] ) ? __ ( '' ) : $instance ['zhiding'] );
		$target = apply_filters ( 'widget_title', empty ( $instance ['target'] ) ? __ ( '2' ) : $instance ['target'] );
		if ($target == "1") {
			$tagerts = 'target="_blank"';
		}
		if ($zhiding == "1") {
			$post__in = get_option ( 'sticky_posts' );
		}
		if ($zhiding == "2") {
			$oder = "rand";
		} else {
			$oder = "ASC";
		}
		$cat_title = get_cat_name($cat) ;
		
		?>
		<div class="pic-news">
				<div class="box">
					<div class="title">
						<div class="title1"><?php echo $title?></div>
						<div class="title2"><?php echo $title2?></div>
					</div>
					<ul>
					<?php 
					$args = array (
							'cat' => $cat,
							'post__in' => $post__in,
							'orderby' => $oder
					);
					$query = new WP_Query ( $args );
					$wmx=0;
						while ($query->have_posts ()):
							$query->the_post ();
						$wmx++;
						$id = get_the_ID ();
						$tit = get_the_title ( $id );
						$time=get_the_time('Y-m-d',$id);
						$linkss = get_post_meta ( $id, "hoturl", true );
						
					?>
						<li class="pic-list" style="<?php if($wmx%3==0){echo 'margin-right: 0px';}else{}?>">
							<?php if (has_post_thumbnail ()) {
							the_post_thumbnail ( 'pic', array (
							'alt' => $tit,
							'title' => $tit
							) );
						}?>
							<div class="pic-title" >
								<a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8');?></a>
							</div>
							<div class="pic-desc"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,80,"...",'utf-8'); ?></div>
						</li>
						<?php endwhile;?>
					</ul>
					<div class="news-more">
						<a href="<?php echo get_category_link($cat)?>">更多>></a>
					</div>
				</div>
			</div>
<?php 		
	}
}
register_widget('PicViews');
?>