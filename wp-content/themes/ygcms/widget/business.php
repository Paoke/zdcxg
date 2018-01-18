<?php
class BusinessViews extends WP_Widget{
	
	function __construct(){
		$widget_ops = array('classname'=>'business','description'=>'多模块业务介绍');
		$this->WP_Widget($id_base = "business",'多模块业务介绍',$widget_ops);
	}
	
	function form($instance){
		

	}
	
	function update($new_instance, $old_instance){
			return $new_instance;
	}
	
	function widget($args, $instance){
		?>	
		<div class="business wm-margin-top-41">
		<div class="box">
			<div class="module attract-investment wm-width-389 wm-float-left">
				<h1 style="color:#217be5; ">招商指南</h1>
				<ul>
					<li >
						<a href=" http://www.gdmv.cn/?page_id=429" class="inverstment1" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment1.png') no-repeat 0% 50%;">园区环境</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=431" class="inverstment2" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment2.png') no-repeat 0% 50%;">入园标准</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?cat=19" class="inverstment3" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment3.png') no-repeat 0% 50%;">招商动态</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=550" class="inverstment4" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment4.png') no-repeat 0% 50%;">优惠政策</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?page_id=435" class="inverstment5" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment5.png') no-repeat 0% 50%;">园区需求</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?cat=17" class="inverstment6" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/investment/investment6.png') no-repeat 0% 50%;">项目合作</a>
					</li>
				</ul>
			</div>
			<div class="module guide wm-width-389 wm-float-left">
				<h1 style="color:#01bbb3; ">办事指南</h1>
				<ul>
					<li>
						<a href="http://www.gdmv.cn/?page_id=554" class="guide1" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide1.png') no-repeat 0% 50%;">入驻模式</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=181" class="guide2" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide2.png') no-repeat 0% 50%;">工商登记</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?page_id=105" class="guide3" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide3.png') no-repeat 0% 50%;">税务登记</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=439" class="guide4" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide4.png') no-repeat 0% 50%;">注册认证</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?cat=21" class="guide5" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide5.png') no-repeat 0% 50%;">资料下载</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=24" class="guide6" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/guide/guide6.png') no-repeat 0% 50%;">留言信箱</a>
					</li>
				</ul>
			</div>
			<div class="module support wm-width-389 wm-float-left">
			<h1 style="color:#ce756a; ">服务支持</h1>
				<ul>
					<li>
						<a href="http://www.gdmv.cn/?page_id=442" class="support1" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support1.png') no-repeat 0% 50%;">人才服务</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=444" class="support2" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support2.png') no-repeat 0% 50%;">认证需求</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?page_id=446" class="support3" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support3.png') no-repeat 0% 50%;">资金服务</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=448" class="support4" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support4.png') no-repeat 0% 50%;">供应链服务</a>
					</li>
					<li>
						<a href="http://www.gdmv.cn/?page_id=450" class="support5" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support5.png') no-repeat 0% 50%;">技术服务</a>
					</li>
					<li style="margin-right:0px;">
						<a href="http://www.gdmv.cn/?page_id=452" class="support6" style="background: url('<?php echo get_stylesheet_directory_uri();?>/images/support/support6.png') no-repeat 0% 50%;">产品活动</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
	
	<?php }
}
	register_widget('BusinessViews')
	


?>