<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deduction_Advances_Model extends MY_Model{
	
	function __construct(){
		parent:: __construct();
	}
	
	function getField($id){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('leave.emp_id'=>$id));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}



	function getFields($id, $x, $i){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('leave.column'=>$id, 'leave.column'=>$x, 'leave.column'=>$i));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}



	function getaccount($fname, $lname, $packavailed){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('leave.column'=>$fname, 'leave.column'=>$lname, 'leave.column'=>$packavailed));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}
	
	function getValue($id,$select,$return=''){
		$this->db->select($select);
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('leave.column'=>$id));
		$query = $this->db->get();
		if($query->num_rows()>0){
			$row=$query->row();
			if($return){
				return (!empty($row->{$return}))?$row->{$return}:false;
			}
			return (!empty($row->{$select}))?$row->{$select}:false;
		}
		return false;
	}
	
	function getSearch($where = array(), $group_by = array(), $order_by = array(), $result = FALSE, $count = FALSE , $row = FALSE){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::group_by($group_by);
		parent::orderby($order_by);
		$query = $this->db->get();
		
		if($result){
			return $query->result();
		}
		
		if($count){
			return $query->num_rows();
		}
		
		if($row){
			if($query->num_rows()>0)
				return $query->row();
			return false;	
		}
		
		return $query;
	}
	
	function getList($where,$where_string,$order_by){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::where_string($where_string);
		// parent::group_by("u.id_user");
		parent::orderby($order_by);
		return $query = $this->db->get();
	}
	
	function getListLimit($where,$where_string,$order_by,$page,$number){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::where_string($where_string);
		// parent::group_by("u.id_user");
		parent::orderby($order_by);
		parent::pagelimit($page, $number);
		return $query = $this->db->get();
	}
	
	/*
	 * From
	 * @return void
	 */
	private function _from()
	{
		$this->db->from("leave_tbl leave");
	}
	
	/*
	 * SELECT
	 * @return void
	 */
	private function _select()
	{
		$this->db->select("
			leave.*
			
		");
		// au.user_fname as add_user_fname, au.user_mname as add_user_mname, au.user_lname as add_user_lname, au.user_code as add_user_code,au.user_email as add_user_email, au.user_picture as add_user_picture,
		// uu.user_fname as update_user_fname, uu.user_mname as update_user_mname, uu.user_lname as update_user_lname, uu.user_code as update_user_code,uu.user_email as update_user_email, uu.user_picture as update_user_picture
	}
	
	/*
	 * JOIN
	 * @return void
	 */
	private function _join()
	{
        //$this->db->join('user_types ut', 'ut.id_user_type = u.user_type_id', 'left');
	}
	
	/*
	 * Fix Argument
	 * @return void
	 */
	private function _fix_arg()
	{
		$this->db->where(array('leave.enabled' => 1));
	}
	
	/*
	 * Insert Query
	 * @return id
	 */
	function insert_table($data){
		$this->db->insert("deduction_item",$data);
		return $this->db->insert_id();
	}
	
	/*
	 * Batch Insert Query
	 * @return void
	 */
	function insert_batch_table($data){
		$this->db->insert_batch("leave_tbl", $data); 
	}
	
	/*
	 * Update Query
	 * @return id
	 */
	function update_table($data,$table_col,$key){
		$this->db->where($table_col,$key);
		$this->db->update("leave_tbl",$data);
        return $key;
	}
	
	/*
	 * Update Where Query
	 * @return void
	 */
	function update_table2($data,$where){
		self::where($where);
		$this->db->update("leave_tbl",$data);
	}
	
	/*
	 * Batch Update Query
	 * @return void
	 */
	function update_batch_table($data,$table_col){
		$this->db->update_batch("leave_tbl", $data, $table_col); 
	}
	
	/*
	 * Delete Query
	 * @return void
	 */
	function delete_table($table_col,$key){
		$this->db->delete("leave_tbl",array($table_col=>$key));
	}
	
		/*
	* Custom
	*/
	function getFields_arr($where,$select,$return='',$return_value=''){
		$this->db->select($select);
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		$query = $this->db->get();
		$layer='';
		foreach($query->result() as $q){
			if($return){
				if($return_value){
					$layer[$q->{$return}]=$q->{$return_value};
				}else{
					$layer[$q->{$return}]=$q->{$return};
				}
			}else{
				$layer[$q->{$select}]=$q->{$select};
			}	
		}
		
		return $layer;
	}
        
        
        function get_employee_approved_leave($id){
            $data = $this->db->query("select * from leave_tbl where emp_id = '$id' "
                    . "and leave_file_date between '2018-08-10' and '2018-08-15' "
                    //. "and leave_to between between '2018-08-10' "
                    /*. "and '2018-08-15'*/." and approved = 1"
                                     ." and enabled = 1"
                    . " group by leave_from");
            return $data->result();
        }
        
        
        
        
        function get_employee_approved_leave_for_daily_time_record($date_start, $date_to){
            $data = $this->db->query("select * from leave_tbl where "
                    . "date(leave_file_date) between '$date_start' and '$date_to' "
                    //. "and leave_to between between '2018-08-10' "
                    /*. "and '2018-08-15'*/." and approved = 1"
                                     . " and enabled = 1"
                    . " order by leave_from");
            return $data->result();
        }
    
    
    
    
    function getSearch_all_emp_leave($where = array(), $group_by = array(), $order_by = array(), $result = FALSE, $count = FALSE , $row = FALSE){
		self::_select();
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where($where);
		parent::group_by($group_by);
		parent::orderby($order_by);
		$query = $this->db->get();
		
		if($result){
			return $query->result();
		}
		
		if($count){
			return $query->num_rows();
		}
		
		if($row){
			if($query->num_rows()>0)
				return $query->row();
			return false;	
		}
		
		return $query;
	}
    function getleave_emp_data($id, $date){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('leave.emp_id'=>$id, 'leave.leave_file_date'=>$date));
		$query = $this->db->get();
		
		if($query->num_rows()>0){
			return $query->row();
		}
		
		return false;
	}
    
    
    
    function del_leave($data, $id, $date){
        $this->db->where('emp_id', $id);
        $this->db->where('leave_file_date', $date);
        $this->db->update('leave_tbl', $data);
    }
    
    
    
    
    function update_emp_leave($data,$table_col,$key,$x, $y){
		$this->db->where($table_col,$key);
        $this->db->where($x,$y);
		$this->db->update("leave_tbl",$data);
        return $key;
	}
        function get_all_employee(){
            $data = $this->db->query("select * from employee_tbl where enabled = 1");
            return $data->result();
        }
        function get_add_on_amount($date_start, $date_to){
            $data = $this->db->query("SELECT * FROM add_on_tbl
WHERE tos BETWEEN '$date_start' AND '$date_to' and enabled = 1;"
                    );
            return $data->result();
        }
        function insert_table_ded($data){
		$this->db->insert("deduction_action", $data); 
	}function get_ded($data){
		$data = $this->db->query("select * from deduction_action where emp_id = '$data' and status = 0");
            return $data->result();
	}
        function update_ded($data,$table_col, $key){
		$this->db->where($table_col,$key);
		$this->db->update("deduction_item",$data);
        return $key;
	}
        function get_update($data){
            $data = $this->db->query("select * from deduction_item where emp_id = '$data'");
            return $data->result();
        }
        function update_deds($data,$table_col, $key){
		$this->db->where($table_col,$key);
                $this->db->where("status",0);
		$this->db->update("deduction_action",$data);
        return $key;
	}
        function update_deduction(){
            $this->db->query("update deduction_item set status = 1 where end < now()");
        }
        function get_deduction(){
            $data = $this->db->query("select * from deduction_item where enabled = 1");
            return $data->result();
        }
        function get_deduction_advances(){
            $data = $this->db->query("select * from deduction_item where enabled = 1");
            return $data->result();
        }

	
}