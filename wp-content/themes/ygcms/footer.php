<!-- 脚部 -->
<?php 
global $ashu_option;
?>
		<div id="Footer" class="xkfooter clear">
			
				<div class="xkfooter1">
					
					<div class="l-change">
						<a href="http://www.gdmv.cn">中文</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
						<a href="http://en.gdmv.cn">English</a>
					</div>
					
					<?php wp_nav_menu( 
					array( 
						'theme_location'   =>'footer_menu1',
						'container_class' => 'nav2',
						'container_id'=>'nav2',
						'menu_class'=>'footernav',
						
						'depth' =>1,
						'echo'=>true
					) ); ?>
				</div>
					
				<div class="xkfooter2" >
					<div class="xkfooter2-desc">
					<div>
					<?php 
						if($ashu_option['general']['_id_text_51']!=''){
							echo "地址：";
							echo $ashu_option['general']['_id_text_51'];
						}
					?>
					</div>
					<div >版权所有&nbsp;©<?php echo date('Y')?>&nbsp;<?php bloginfo('name')?>
					<?php 
					if($ashu_option['general']['_id_text_53']!=''){
						echo "&nbsp;|";
						echo "<a href='http://www.miibeian.gov.cn' >&nbsp;".$ashu_option['general']['_id_text_53']."</a>";
					}
					if($ashu_option['general']['_id_text_52']!=''){
						echo "&nbsp;|&nbsp;技术支持：";
						echo $ashu_option['general']['_id_text_52'];
					}
					?>
					 </div>
					</div>
				</div>
			
		</div>

	</div>
	
	<?php 
		include 'ful/contact.php';
	?>
	
<!-- js -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/script.js"></script>

</body>
</html>














