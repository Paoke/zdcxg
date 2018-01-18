<?php
/*
 * 三栏目新闻栏
 * */
class NewsViews extends WP_Widget{
	function NewsViews(){
		$widget_ops = array('classname'=>'news','description'=>'新闻');
		$this->WP_Widget($id_base = "news",'三栏新闻',$widget_ops);
	}
	function form($instance){
		$cat = esc_attr ( $instance ['cat'] );
		$cat2 = esc_attr ( $instance ['cat2'] );
		$cat3 = esc_attr ( $instance ['cat3'] );
		$id = esc_attr ( $instance ['id'] );
		$target = esc_attr ( $instance ['target'] );
		$title = esc_attr ( $instance ['title'] );
		$title2 = esc_attr ( $instance ['title2'] );
		$number = esc_attr ( $instance ['number'] );
		$zhiding = esc_attr ( $instance ['zhiding'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
		<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>
		
		<p>
	<br />请选择调用的分类1
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
	<br />请选择调用的分类2
</p>
<label for="<?php echo $this->get_field_id('cat2'); ?>">请选择分类:</label>
<br />
<select id="<?php echo $this->get_field_id('cat2'); ?>"
	name="<?php echo $this->get_field_name('cat2'); ?>">
	<option value=''>请选择</option>
<?php
		$categorys2 = get_categories ( array (
				'hide_empty' => 0 
		) );
		
		foreach ( $categorys2 as $category ) {
			$category_id = $category->term_id;
			$category_name = $category->cat_name;
			?>
       
			<option value='<?php echo  $category_id; ?>'
		<?php
			if ($cat2 == $category_id) {
				echo "selected='selected'";
			}
			?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>
	<br />请选择调用的分类3
</p>
<label for="<?php echo $this->get_field_id('cat3'); ?>">请选择分类:</label>
<br />
<select id="<?php echo $this->get_field_id('cat3'); ?>"
	name="<?php echo $this->get_field_name('cat3'); ?>">
	<option value=''>请选择</option>
<?php
		$categorys3 = get_categories ( array (
				'hide_empty' => 0 
		) );
		
		foreach ( $categorys3 as $category ) {
			$category_id = $category->term_id;
			$category_name = $category->cat_name;
			?>
       
			<option value='<?php echo  $category_id; ?>'
		<?php
			if ($cat3 == $category_id) {
				echo "selected='selected'";
			}
			?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>

<p>
	<label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_attr_e('显示数量(默认6):'); ?> <input
		class="widefat" id="<?php echo $this->get_field_id('number'); ?>"
		name="<?php echo $this->get_field_name('number'); ?>" type="text"
		value="<?php echo  $number;; ?>" /></label>
</p>
<br />
<p>
	<label for="<?php echo $this->get_field_id('zhiding'); ?>">文章排序:</label><br />
	<select id="<?php echo $this->get_field_id('zhiding'); ?>"
		name="<?php echo $this->get_field_name('zhiding'); ?>">
		<option value=''
			<?php if ($zhiding == "" ) {echo "selected='selected'";}?>>显示最新文章</option>
		<option value='1'
			<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章</option>
		<option value='2'
			<?php if ($zhiding == "2" ) {echo "selected='selected'";}?>>显示随机文章</option>

	</select>

</p>		
<p>

	<label for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
	<select id="<?php echo $this->get_field_id('target'); ?>"
		name="<?php echo $this->get_field_name('target'); ?>">
		<option value=''
			<?php if ($target == "" ) {echo "selected='selected'";}?>>自身页面转换</option>
		<option value='1'
			<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>

	</select>

</p>

		
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
		$cat2 = apply_filters ( 'widget_title', empty ( $instance ['cat2'] ) ? __ ( '' ) : $instance ['cat2'] );
		$cat3 = apply_filters ( 'widget_title', empty ( $instance ['cat3'] ) ? __ ( '' ) : $instance ['cat3'] );
		$id = apply_filters ( 'widget_title', empty ( $instance ['id'] ) ? __ ( '1' ) : $instance ['id'] );
		$zhiding = apply_filters ( 'widget_title', empty ( $instance ['zhiding'] ) ? __ ( '' ) : $instance ['zhiding'] );
		$target = apply_filters ( 'widget_title', empty ( $instance ['target'] ) ? __ ( '2' ) : $instance ['target'] );
		$number = apply_filters ( 'widget_title', empty ( $instance ['number'] ) ? __ ( '6' ) : $instance ['number'] );
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
		$cat_title2 = get_cat_name($cat2) ;
		$cat_title3 = get_cat_name($cat3) ;
		?>
		<div class="news">
		<div class="box">
		<div class="title">
		<div class="title1"><?php echo $title?></div>
		<div class="title2"><?php echo $title2?></div>
		</div>
		<div class="news-title">
		<a href="javascript:;" class="ouf-1 case"><?php echo $cat_title?></a>
		<a href="javascript:;" class="ouf-2"><?php echo $cat_title2?></a>
		<a href="javascript:;" class="ouf-3"><?php echo $cat_title3?></a>
		</div>
			<?php if($cat){?>
				<ul class="ulf-1">
				<?php 
				$args = array (
				'cat' => $cat,
				'showposts' => $number,
				'post__in' => $post__in,
				'orderby' => $oder 
		);
		$query = new WP_Query ( $args );
		while ( $query->have_posts () ) :
					$query->the_post ();
					
					$id = get_the_ID ();
					$tit = get_the_title ( $id );
					$time=get_the_time('Y-m-d',$id);
					$linkss = get_post_meta ( $id, "hoturl", true );
		?>
				<li class="news-li"><a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf8');?></a>
				<span><?php echo $time?></span>
				<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"...",'utf-8'); ?></p></li>
				<?php endwhile; wp_reset_query();?>
				<div class="news-more">
								<a href="<?php echo get_category_link($cat)?>">更多>></a>
								</div>
				</ul>
				<?php } ?>
				
			<?php if($cat2){?>
				<ul class="ulf-2">
				<?php 
				$args = array (
				'cat' => $cat2,
				'showposts' => $number,
				'post__in' => $post__in,
				'orderby' => $oder 
		);
		$query = new WP_Query ( $args );
		while ( $query->have_posts () ) :
					$query->the_post ();
					
					$id = get_the_ID ();
					$tit = get_the_title ( $id );
					$time=get_the_time('Y-m-d',$id);
					$linkss = get_post_meta ( $id, "hoturl", true );
		?>
				<li class="news-li"><a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf8');?></a>
				<span><?php echo $time?></span>
				<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"...",'utf-8'); ?></p></li>
				<?php endwhile; wp_reset_query();?>
				<div class="news-more">
								<a href="<?php echo get_category_link($cat2)?>">更多>></a>
								</div>
				</ul>
				<?php } ?>
				
			<?php if($cat3){?>
				<ul class="ulf-3">
				<?php 
				$args = array (
				'cat' => $cat3,
				'showposts' => $number,
				'post__in' => $post__in,
				'orderby' => $oder 
		);
		$query = new WP_Query ( $args );
		while ( $query->have_posts () ) :
					$query->the_post ();
					
					$id = get_the_ID ();
					$tit = get_the_title ( $id );
					$time=get_the_time('Y-m-d',$id);
					$linkss = get_post_meta ( $id, "hoturl", true );
		?>
				<li class="news-li"><a href="<?php if($linkss !=''){echo $linkss;}else{echo get_permalink();}?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf8');?></a>
				<span><?php echo $time?></span>
				<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"...",'utf-8'); ?></p></li>
				<?php endwhile; wp_reset_query();?>
				<div class="news-more">
								<a href="<?php echo get_category_link($cat3)?>">更多>></a>
								</div>
				</ul>
				<?php } ?>
				
			</div>
		</div>
<?php 		
	}
}
register_widget('NewsViews');
?>