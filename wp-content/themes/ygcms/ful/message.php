<?php
/* 留言功能 */

class MessageView{
	
	
	function __construct(){
		add_action('admin_menu', array(&$this,'do_message'));
	}
	function do_message(){
		add_menu_page( 'leave_message', '我的留言', 'moderate_comments', 'message',array(&$this,'display_function'),'',26);
	}
	
	function display_function(){
		
		$arr=DoMessageView::get_mess("leave_mess");
	
		?>		
		
	<div class="wrap">
			<h1  style="text-align: center;">留言表</h1>
			<table class="wp-list-table widefat fixed striped posts">
				<thead>
					<tr>
						<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><label class="screen-reader-text" for="cb-select-all-1">全选</label><input id="cb-select-all-1" type="checkbox"></th>
						<th scope="col" id="categories" class="manage-column column-categories" style="">姓名</th>
						<th scope="col" id="title" class="manage-column column-title sortable desc" style="">企业名称</th>
						<th scope="col" id="author" class="manage-column column-author" style="">所属行业</th>
						<th scope="col" id="tags" class="manage-column column-tags" style="">公司地址</th>
						<th scope="col" id="comments" class="manage-column column-comments num sortable desc" style="">邮编</th>
						<th scope="col" id="date" class="manage-column column-date sortable asc" style="">联系电话</th>
						<th scope="col" id="viewscolumn" class="manage-column column-viewscolumn" style="">E-mail</th>
						<th scope="col" id="viewscolumn" class="manage-column column-viewscolumn" style="">公司网址</th>
						<th scope="col" id="viewscolumn" class="manage-column column-viewscolumn" style="">留言</th>
						<th scope="col" id="viewscolumn" class="manage-column column-viewscolumn" style="">得知医谷方式</th>
						<th scope="col" id="viewscolumn" class="manage-column column-viewscolumn" style="">日期</th>
					</tr>
				</thead>

				<tbody id="the-list">
				<?php 
					if(is_array($arr)){
						foreach ($arr as $value){
					?>	
					<tr id="" class="iedit author-self level-0  type-post status-publish format-standard has-post-thumbnail hentry category-hezuoqiye">
						<th scope="row" class="check-column">
							<label class="screen-reader-text" for="cb-select-426"><?php echo $value['cname']?></label>
							<input id="cb-select-426" type="checkbox" name="post[]" value="426">
							<div class="locked-indicator"></div>
						</th>
						<td><?php echo $value['name']?></td>
						<td class="post-title page-title column-title"><?php echo $value['cname'];?></td>
						<td><?php echo $value['industry']?></td>
						<td><?php echo $value['addr']?></td>
						<td><?php echo $value['code']?></td>
						<td><?php echo $value['tel']?></td>
						<td><?php echo $value['email']?></td>
						<td><?php echo $value['web']?></td>
						<td><?php echo $value['message']?></td>
						<td><?php echo $value['wlf']?></td>
						<td><?php echo $value['date']?></td>
					</tr>
					
					<?php 
				}
	}else{?>
				<td><?php echo $arr;?></td>
<?php }
				?>
					
				</tbody>

			</table>
		</div>
	
	
		<?php 
	}
}

	$messages=new MessageView();
	
	
