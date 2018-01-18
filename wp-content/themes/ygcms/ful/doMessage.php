<?php


//处理提交的表单
class DoMessageView{
	var $leave_mess;
	function __construct($post){
		$this->leave_mess=$post;
		
		$this->add_mess("leave_mess");
	}
	
	function get_mess_count($option){
		
		$mess_count=get_option($option);
		if(!get_option($option)){
			add_option($option,'1');
			return 1;
		}else {
			update_option($option, ++$mess_count);
			return $mess_count;
		}
	}
	
	
	function get_mess($option){
		$count=get_option("mess_count");
		if($count<1){
			return "没有留言信息";
		}
		
		$arr_mess=array();
		for($x=1;$x<=$count;$x++){
			$arr_mess[]=get_option($option."_".$x);
		}
		return $arr_mess;
	}
	
	function add_mess($option){
		$mess_count=$this->get_mess_count("mess_count");
		add_option($option."_".$mess_count,$this->leave_mess );
		
		
// 		update_option("mess_count", ++$mess_count);
		
	}
	
	function update_mess($option){
			
	}
	function delete_mess($option){
		delete_option($option);
	}
	
}





























?>