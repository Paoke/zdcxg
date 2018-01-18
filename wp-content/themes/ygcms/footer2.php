<!-- 脚部 -->
<?php 
global $ashu_option;
?>
		<div id="Footer" class="footer">
			<div class="box">
				<div class="footer1">
					<div class="footer-in footernav">
						<div class="navtitle">友情链接</div>
						<?php 
						wp_nav_menu(
							array(
							'theme_location'=>'footer_menu1',
							'menu'            => 'header-menu',
							'container'       => 'div', //最外层容器标签名
							'container_class' => '', //最外层容器class名
							'container_id'    => '',//最外层容器id值
							'menu_class'      => 'navlist', //ul标签class
							'menu_id'         => '',
							)
						);
						?>
						
					</div>
					<div class="footer-in footernav">
						<div class="navtitle">关于我们</div>
						<?php 
						wp_nav_menu(
							array(
							'theme_location'=>'footer_menu2',
							'menu'            => 'header-menu',
							'container'       => 'div', //最外层容器标签名
							'container_class' => '', //最外层容器class名
							'container_id'    => '',//最外层容器id值
							'menu_class'      => 'navlist', //ul标签class
							'menu_id'         => '',
							)
						);
						?>
						
					</div>
					<div class="footer-in footer-text">
						<div class="text-title"><?php echo $ashu_option['general']['_id_text_3'];?></div>
						<div class="text-desc">
							<p><?php 
								if($ashu_option['general']['_id_text_phone']!=''){
									echo "电话：";									
									echo $ashu_option['general']['_id_text_phone'];
								}?>
							</p>
							<p><?php 
								if($ashu_option['general']['_id_text_chuanzhen']!=''){
									echo "传真：";									
									echo $ashu_option['general']['_id_text_chuanzhen'];
								}?>
							</p>
							<p><?php 
								if($ashu_option['general']['_id_text_mail']!=''){
									echo "邮箱：";									
									echo $ashu_option['general']['_id_text_mail'];
								}?>
							</p>
							<p><?php 
								if($ashu_option['general']['_id_text_qq']!=''){
									echo "QQ：";									
									echo $ashu_option['general']['_id_text_qq'];
								}?>
							</p>
							
						</div>
					</div>
					<div class="footer-in footer-text" >
						<div class="text-title"><?php echo $ashu_option['general']['_id_text_4'];?></div>
						<div class="text-desc" style="border: none;">
							<a href="<?php echo $ashu_option['general']['_id_text_42'];?>" target="_blank"><?php echo $ashu_option['general']['_id_text_41'];?></a> 
							<img alt=""src="<?php echo $ashu_option['general']['_id_text_43'];?>">
						</div>
					</div>
				</div>
				<div class="footer2">
					<div class="footer2-desc">
					<div>
					<?php 
						if($ashu_option['general']['_id_text_51']!=''){
							echo "地址：";
							echo $ashu_option['general']['_id_text_51'];
						}
					?>
					</div>
					<div>Copyright&nbsp;©<?php echo date('Y')?>&nbsp;<?php bloginfo('name')?> All Rights Reserved&nbsp;
					<?php 
					if($ashu_option['general']['_id_text_52']!=''){
						echo "|&nbsp;技术支持：";
						echo $ashu_option['general']['_id_text_52'];
					}
					if($ashu_option['general']['_id_text_53']!=''){
						echo "&nbsp;&nbsp;&nbsp;";
						echo "<a href='http://www.miibeian.gov.cn'>".$ashu_option['general']['_id_text_53']."</a>";
					}
					?>
					 </div>
					</div>
				</div>
			</div>
		</div>

	</div>
<!-- js -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/script.js"></script>

</body>
</html>














