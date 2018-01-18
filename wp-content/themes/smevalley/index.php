

<?php get_header(); 

global $ashu_option;


?>



<!-- 首页轮播�?-->
		<div class="banner slides-box">
			<ul class="slides">
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_1'];?>') center"></li>
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_2'];?>') center"></li>
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_3'];?>') center"></li>
			</ul>
			<script src="<?php echo get_stylesheet_directory_uri();?>/js/poposlides.js"></script>
			<script>
				$(".slides").poposlides({
					auto:true,
					playspeed:7000
				});
			</script>
		</div>
		<!-- 主体内容 -->
		<div id="Main" class="main">		
			<?php dynamic_sidebar('sidebar1'); ?>
			<script>
				$('.slider-control').children().click(function(){
					$(this).addClass('active').siblings().removeClass('active');
				})
				
			</script>
		</div>
<?php get_footer(); ?>