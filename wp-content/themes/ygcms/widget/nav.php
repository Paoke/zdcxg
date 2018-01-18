<?php
class nav extends WP_Widget {
	function nav() 

	{
		$widget_ops = array (
				'classname' => 'nav1',
				'description' => '自动调用页面和分类目录的树形层级链接，如果没有层级，那么他就不会显示出来[注意，这个模块首页无效]' 
		);
		
		$control_ops = array (
				'width' => 200,
				'height' => 300 
		);
		
		parent::WP_Widget ( $id_base = "nav1", $name = '自动调用页面和分类树形层级', $widget_ops, $control_ops );
	}
	function form($instance) {
	}
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
		extract ( $args );
		
		$id = $instance ['id'];
		
		$before_content = $instance ['before_content'];
		
		$after_content = $instance ['after_content'];
		
		if (is_category ()) {
			$cat_id = get_query_var ( 'cat' );
			
			$cat_link = get_category_link ( $cat_id );
			
			$category = get_category ( $cat_id );?>
			
			

					

				
			
			
			<?php 
			if ( get_category_children($cat_id) != "" ) { ?>
		
		
		<ul class="menu-list text-center">
		
			<h1 class="color-blue margin-bottom-36"><?php echo $category->cat_name?></h1>

		 <?php  if ( get_category_children($cat_id) != "" ) {wp_list_categories("child_of=".$cat_id."&depth=0&hide_empty=0&title_li="); }?>

	</ul>



	<?php } else{
		
		
		//获得父目录
		$parent_id=$category->parent;
		$category_parent=get_category($parent_id);
		$category_parent_name=$category_parent->name;
		?>
	<ul class="menu-list text-center">
		
			<h1 class="color-blue margin-bottom-36"><?php echo $category_parent_name; ?></h1>

		 <?php  if ( get_category_children($parent_id) != "" ) {wp_list_categories("child_of=".$parent_id."&depth=0&hide_empty=0&title_li="); }?>

	</ul>
	
	<?php } }?>





 <?php if(is_single()) {?>

 <?php
 
 			$category=get_the_category();
 			$cat=$category->ter_id;
			?>

          <?php if ( get_category_children($cat) != "" ) { ?>

	<ul class="menu-list text-center">
		
			<h1 class="color-blue margin-bottom-36"><?php echo $category->cat_name?></h1>

		 <?php  if ( get_category_children($cat) != "" ) {wp_list_categories("child_of=".$cat."&depth=0&hide_empty=0&title_li="); }?>

	</ul>



<?php }
	else {
		//获得父目录
		$parent_id=$category[0]->parent;
		$category_parent=get_category($parent_id);
		$category_parent_name=$category_parent->name;
		?>
		
	<ul class="menu-list text-center">
		
			<h1 class="color-blue margin-bottom-36"><?php echo $category_parent_name; ?></h1>

		 <?php  if ( get_category_children($parent_id) != "" ) {wp_list_categories("child_of=".$parent_id."&depth=0&hide_empty=0&title_li="); }?>

	</ul>
		
		
	<?php }
		
		}?>

  <?php if(is_page()) { 
			
			global $wpdb;
			global $post;
			
			$post_data = get_post ( $post->ID, ARRAY_A );
			
			$slug = $post_data ['post_name'];
			
			$name = $slug; // page别名
			
			$parent_id = get_post ( $post->post_parent, ARRAY_A );
			
			$parent_slug = $parent_id ['post_name'];
			
			$parent_title = get_the_title ( $post->post_parent );
			
			$parent_link = get_page_link ( $post->post_parent );
			
			$childrensd = wp_list_pages ( "title_li=&child_of=" . $post->ID . "&echo=0&depth=1" );
			
			if ($childrensd != "" || $post->post_parent) {
				
				?>

		



   

          <?php if($post->post_parent):  ?>

          <ul class="menu-list text-center">  <?php $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=1"); if ($children){ echo $children; }  ?></ul>

        <?php else: ?>

         <ul class="menu-list text-center"> <?php  $children = wp_list_pages("title_li=&child_of=". $post->ID."&echo=0&depth=1");  if ($children){ echo $children; }?></ul>

           <?php endif; ?> 

        

        





<?php
			}
		}
	}
}

register_widget ( 'nav' );

?>