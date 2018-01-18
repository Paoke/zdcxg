

<?php 
global $ashu_option;
get_header(); 



?>



<!-- 首页轮播图-->
		<div class="banner slides-box">
			<ul class="slides">
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_1'];?>') center"></li>
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_2'];?>') center"></li>
				<li style="background: url('<?php echo $ashu_option['general']['_id_upload_3'];?>') center"></li>
			</ul>
			<script src="<?php echo get_stylesheet_directory_uri();?>/js/poposlides.js"></script>
			<script>
				var arr=new Array();
				arr['auto']=true;
				arr['loop']=true;
				$(".slides").poposlides(arr);
			</script>
		</div> 
		<!-- 主体内容 -->
		<div id="Main" class="main">
			<?php dynamic_sidebar('sidebar1'); ?>
		</div>
<?php get_footer(); ?>