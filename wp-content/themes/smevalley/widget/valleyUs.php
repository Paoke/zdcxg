<?php
/*
 *创新谷关于我们
 * */
class valleyUsViews extends WP_Widget{
	function valleyUsViews(){

		$widget_ops = array('classname'=>'','description'=>'创新谷关于我们');
		$this->WP_Widget($id_base = "valleyUs",'创新谷关于我们',$widget_ops);
	}
	function form($instance){	
		$id = esc_attr ( $instance ['id'] );
		$title = esc_attr ( $instance ['title'] );
		$title2 = esc_attr ( $instance ['title2'] );
		?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
					
				<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> 
					<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>
				
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
		?>
	
	<!--------------- 关于我们------------->
			<div class="bg-about text-center">
				<div class="title">
					<div class="title22"><?php echo $title ?></div>
					<div class="title-small2"><?php echo $title2 ?></div>
				</div>
				
				<div class="box">
					<ul class="listicon-about text-center">
						<li>
							<a href="http://zdcxg.com/?page_id=22" class="icon-about">
								<h4 class="icon-desc">中大创新谷</h4>
							</a>
						</li>
						
						<li>
							<a href="http://zdcxg.com/?cat=2" class="icon-about2">
								<h4 class="icon-desc">团队</h4>
							</a>
						</li>
						
						<li>
							<a href="http://zdcxg.com/?page_id=23" class="icon-about3">
								<h4 class="icon-desc">理念</h4>
							</a>
						</li>
						
						<li>
							<a href="http://zdcxg.com/?page_id=39" class="icon-about4">
								<h4 class="icon-desc">服务</h4>
							</a>
						</li>
						
						<li>
							<a href="http://zdcxg.com/?page_id=40" class="icon-about5">
								<h4 class="icon-desc">体系</h4>
							</a>
						</li>
						
						<li>
							<a href="http://zdcxg.com/?cat=3" class="icon-about6">
								<h4 class="icon-desc">导师</h4>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
	<?php }
}
register_widget('valleyUsViews')
?>