<?php  
/*  
Template Name: 联系我们  
*/  
?> 

	<?php get_header();?>
	
<div class="wrap">

	

	<?php 

		if(function_exists('cmp_breadcrumbs')) {

			cmp_breadcrumbs();

		}


	?>

	<div class="content-box" >



				<?php 
				
				if(have_posts()): while ( have_posts () ) :
				
				the_post ();
				$id = get_the_ID ();
				
				$linkss=get_permalink($id);
				
				$categoryId=get_the_category();

				?>
				<div class="contact-title">
				<b><?php the_title()?></b>
				</div>
				<div class="padding-left-112 contact-us">
				
					<?php the_content();?>
				</div>
				
				
				
					
				
				<?php endwhile;endif;
				?>
<p class="margin-left-54"><b>免费索取招商资料和广东医谷信息</b></p>
	<p class="margin-left-54 margin-bottom-23">请仔细填写以下信息，以方便我们寄送资料和更好的为您服务，谢谢</p>
	<form id="ajax-contact" method="post" action="<?php echo admin_url( 'admin-ajax.php' ); ?>" class="leave-message margin-bottom-65">
	
	<div class="form-group margin-left-146">
					<label for="cname">企业名称：</label>
					<input type="text" name="cname" id="cname" required="required"/>
				</div>
				<div class="margin-left-146 radio">
					<label>所属行业：</label>
					<input type="radio" name="industry" id="inlineRadio1" value="医疗器械研发与生产" class="padding-left-0" checked>医疗器械研发与生产
					<input type="radio" name="industry" id="inlineRadio2" value="医疗器械第三方服务">医疗器械第三方服务
					<input type="radio" name="industry" id="inlineRadio" value="其他">其他
				</div>
				<div class="form-group margin-left-175">
					<label for="name">姓名：</label>
					<input type="text" name="name" id="name" required="required"/>
				</div>
				<div class="form-group margin-left-146">
					<label for="addr">公司地址：</label>
					<input type="text" name="addr" id="addr" required="required"/>
				</div>
				<div class="form-group margin-left-175">
					<label for="code">邮编：</label>
					<input type="text" name="code" id="code" required="required"/>
				</div>
				<div class="form-group margin-left-146">
					<label for="tel">联系电话：</label>
					<input type="tel" name="tel" id="tel" required="required"/>
				</div>
				<div class="form-group margin-left-159">
					<label for="Email">E-mail：</label>
					<input type="email" name="email" id="email" required="required"/>
				</div>
				<div class="form-group margin-left-146">
					<label for="web">公司网址：</label>
					<input type="text" name="web" id="web" required="required"/>
				</div>
				<div class="form-group margin-left-175">
					<label for="message">留言：</label>
					<input type="text" name="message" id="message" required="required"/>
				</div>
				<div class="margin-left-65">
					<label>如何得知广东医谷信息：</label>
					<input type="radio" name="wlf" id="info1" value="论坛，峰会，展览"  checked/>论坛，峰会，展览
				</div>
				<div class="margin-left-222">
					<input type="radio" name="wlf" id="info2" value="互联网电子宣传" />互联网电子宣传
				</div>
				<div class="margin-left-222">
					<input type="radio" name="wlf" id="info3" value="平面广告，新闻媒体宣传" />平面广告，新闻媒体宣传
				</div>
				<div class="margin-left-222">
					<input type="radio" name="wlf" id="info4" value="朋友介绍" />朋友介绍
				</div>
				<div class="margin-left-222">
					<input type="radio" name="wlf" id="info5" value="其他" />其他
				</div>
				<input type="date" name="date" id="date" value="<?php echo date("Y-m-d",time())?>" hidden/>
	
	<input type="submit" name="button" id="button" value="提交" class="btn-blue">
	<div id="form-messages" class="form-messages margin-left-222" style="display: inline;"></div>				
	</form>
				
				<?php edit_post_link('编辑此文章', '<p>', '</p>'); ?>
			
	</div>
</div>


		
		<?php get_footer();?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

