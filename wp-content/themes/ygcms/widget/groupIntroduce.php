<?php
/*
 * 公司介绍小工具，四个栏目，带阴影带动画
 * */

	class groupIntroduceViews extends WP_Widget{
		function __construct(){
			$widget_ops = array('classname'=>'groupintroduce','description'=>'四栏公司介绍，鼠标划过加滤镜');
			$this->WP_Widget($id_base = "groupIntroduce",'四栏公司介绍',$widget_ops);
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
			$cat4_title = esc_attr ( $instance ['cat4_title'] );
			$cat4_desc = esc_attr ( $instance ['cat4_desc'] );
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
			
			<p><br />模块四的标题
			<input class="widefat" id="<?php echo $this->get_field_id('cat4_title'); ?>" name="<?php echo $this->get_field_name('cat4_title'); ?>" type="text" value="<?php echo $cat4_title; ?>" /></label></p>
			<p>模块4的描述
			<textarea style="width: 98%;" id="<?php echo $this->get_field_id('cat4_desc')?>" rows="5" cols="21" name="<?php echo $this->get_field_name('cat4_desc')?>" value="<?php echo $cat4_desc ; ?>"><?php echo $cat4_desc; ?></textarea></p>
			
						
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
			$cat4_title = esc_attr ( $instance ['cat4_title'] );
			$cat4_desc = esc_attr ( $instance ['cat4_desc'] );
			?>
			<div class="ca-introduce wm-margin-top-41">
			<ul class="ca-menu">
                      <li>
                        <a href="javascript:;">
                            <span class="ca-icon-1"></span>
                            <div class="ca-content">
                                <h2 class="ca-main"><?php echo $cat_title;?></h2>
                                <div class="small-1px"></div>                                
                                <h3 class="ca-sub"><p><?php echo $cat_desc;?></p></h3>
                            </div>
                        </a>
                    </li>
						<li>
                        <a href="javascript:;">
                            <span class="ca-icon-2"></span>
                            <div class="ca-content">
                                <h2 class="ca-main"><?php echo $cat2_title;?></h2>
                                <h3 class="ca-sub"><p><?php echo $cat2_desc;?></p></h3>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;">
                            <span class="ca-icon-3"></span>
                            <div class="ca-content">
                                <h2 class="ca-main"><?php echo $cat3_title;?></h2>
                                <h3 class="ca-sub"><p><?php echo $cat3_desc;?></p></h3>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="javascript:;">
                            <span class="ca-icon-4"></span>
                            <div class="ca-content">
                                <h2 class="ca-main"><?php echo $cat4_title;?></h2>
                                <h3 class="ca-sub"><p><?php echo $cat4_desc;?></p></h3>
                            </div>
                        </a>
                    </li>
                   
                </ul></div>
		<?php }
	}
	
		
		register_widget('groupIntroduceViews');

	