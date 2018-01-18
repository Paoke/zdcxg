<?php
/*
 * 公司介绍小工具，包括小工具标题、副标题，各模块图片、标题、介绍 
 * */

	class IntroduceViews extends WP_Widget{
		function IntroduceViews(){
			$widget_ops = array('classname'=>'introduce','description'=>'三栏公司介绍');
			$this->WP_Widget($id_base = "introduce",'公司介绍',$widget_ops);
		}
		function form($instance){ 
			$title=esc_attr($instance['title']);
			$title2=esc_attr($instance['title2']);
			$cat = esc_attr ( $instance ['cat'] );
			$cat_title = esc_attr ( $instance ['cat_title'] );
			$cat_desc = esc_attr ( $instance ['cat_desc'] );
			$cat2 = esc_attr ( $instance ['cat2'] );
			$cat2_title = esc_attr ( $instance ['cat2_title'] );
			$cat2_desc = esc_attr ( $instance ['cat2_desc'] );
			$cat3 = esc_attr ( $instance ['cat3'] );
			$cat3_title = esc_attr ( $instance ['cat3_title'] );
			$cat3_desc = esc_attr ( $instance ['cat3_desc'] );
			$id = esc_attr ( $instance ['id'] );
			
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('副标题:'); ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>
			
			<p><br />模块1的标题
			<input class="widefat" id="<?php echo $this->get_field_id('cat_title'); ?>" name="<?php echo $this->get_field_name('cat_title'); ?>" type="text" value="<?php echo $cat_title; ?>" /></label></p>
			<p>模块1的描述
			<textarea style="width: 98%;" id="<?php echo $this->get_field_id('cat_desc')?>" rows="5" cols="21" name="<?php echo $this->get_field_name('cat_desc')?>" value="<?php echo $cat2_desc ; ?>"><?php echo $cat_desc; ?></textarea></p>
			
			<p><br />模块2的标题
			<input class="widefat" id="<?php echo $this->get_field_id('cat2_title'); ?>" name="<?php echo $this->get_field_name('cat2_title'); ?>" type="text" value="<?php echo $cat2_title; ?>" /></label></p>
			<p>模块2的描述
			<textarea style="width: 98%;" id="<?php echo $this->get_field_id('cat2_desc')?>" rows="5" cols="21" name="<?php echo $this->get_field_name('cat2_desc')?>" value="<?php echo $cat2_desc ; ?>"><?php echo $cat2_desc; ?></textarea></p>
			
			<p><br />模块3的标题
			<input class="widefat" id="<?php echo $this->get_field_id('cat3_title'); ?>" name="<?php echo $this->get_field_name('cat3_title'); ?>" type="text" value="<?php echo $cat3_title; ?>" /></label></p>
			<p>模块3的描述
			<textarea style="width: 98%;" id="<?php echo $this->get_field_id('cat3_desc')?>" rows="5" cols="21" name="<?php echo $this->get_field_name('cat3_desc')?>" value="<?php echo $cat3_desc ; ?>"><?php echo $cat3_desc; ?></textarea></p>
			
						
		<?php }
		function  update($new_instance, $old_instance){
			return $new_instance;
		}
		function widget($args, $instance){ 
			extract ( $args );
			$title = apply_filters ( 'widget_title', empty ( $instance ['title'] ) ? __ ( '' ) : $instance['title'] );
			$title2=esc_attr($instance['title2']);
			$cat = esc_attr ( $instance ['cat'] );
			$cat_title = esc_attr ( $instance ['cat_title'] );
			$cat_desc = esc_attr ( $instance ['cat_desc'] );
			$cat2 = esc_attr ( $instance ['cat2'] );
			$cat2_title = esc_attr ( $instance ['cat2_title'] );
			$cat2_desc = esc_attr ( $instance ['cat2_desc'] );
			$cat3 = esc_attr ( $instance ['cat3'] );
			$cat3_title = esc_attr ( $instance ['cat3_title'] );
			$cat3_desc = esc_attr ( $instance ['cat3_desc'] );
			?>
			<div class="introduce">
				<div class="box">
					<div class="title">
						<div class="title1"><?php echo $title?></div>
						<div class="title2"><?php echo $title2?></div>
					</div>


					<ul class="introduce-menu">
						<li class="introduce-li">
							<div class="introduce-img">
								<img alt="<?php echo $cat_title?>-中大创投" src="<?php echo get_stylesheet_directory_uri();?>/images/combac.png">
							</div>
							<div class="introduce-content">
								<div class="introduce-main"><?php echo $instance['cat_title']?></div>
								<div class="introduce-sub">
									<p>
										<?php echo  $instance['cat_desc']?>
									</p>
								</div>
							</div>
						</li>
						<li class="introduce-li">
							<div class="introduce-img">
								<img alt="<?php echo $cat2_title?>-中大创投" src="<?php echo get_stylesheet_directory_uri();?>/images/investment.png">
							</div>
							<div class="introduce-content">
								<div class="introduce-main"><?php echo $cat2_title?></div>
								<div class="introduce-sub">
									<p>
									<?php echo $cat2_desc?>
										</p>
								</div>
							</div>
						</li>
						<li class="introduce-li" style="margin-right: 0px;">
							<div class="introduce-img">
								<img alt="<?php echo $cat3_title?>-中大创投" src="<?php echo get_stylesheet_directory_uri();?>/images/service.png">
							</div>
							<div class="introduce-content">
								<div class="introduce-main"><?php echo $cat3_title?></div>
								<div class="introduce-sub">
									<p>
										<?php echo $cat3_desc?>
									</p>
								</div>
							</div>
						</li>

					</ul>
				</div>
			</div>
		<?php }
	}
	
		
		register_widget('IntroduceViews');

	