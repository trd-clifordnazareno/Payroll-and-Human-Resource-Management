<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Computational_Time_Model extends MY_Model{
	
	function __construct(){
		parent:: __construct();
	}
	
	function getField($id){
		self::_select();	
		self::_from();
		self::_join();
		self::_fix_arg();
		parent::where(array('ctm.emp_id'=>$id));
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
		parent::where(array('ctm.column'=>$id, 'ctm.column'=>$x, 'ctm.column'=>$i));
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
		parent::where(array('ctm.column'=>$fname, 'ctm.column'=>$lname, 'ctm.column'=>$packavailed));
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
		parent::where(array('ctm.column'=>$id));
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
		$this->db->from("computational_time_tbl ctm");
	}
	
	/*
	 * SELECT
	 * @return void
	 */
	private function _select()
	{
		$this->db->select("
			ctm.*
			
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
		$this->db->where(array('ctm.enabled' => 1));
	}
	
	/*
	 * Insert Query
	 * @return id
	 */
	function insert_table($data){
		$this->db->insert("computational_time_tbl",$data);
		return $this->db->insert_id();
	}
	
	/*
	 * Batch Insert Query
	 * @return void
	 */
	function insert_batch_table($data){
		$this->db->insert_batch("computational_time_tbl", $data); 
	}
	
	/*
	 * Update Query
	 * @return id
	 */
	function update_table($data,$table_col,$key){
		$this->db->where($table_col,$key);
		$this->db->update("computational_time_tbl",$data);
        return $key;
	}
	
	/*
	 * Update Where Query
	 * @return void
	 */
	function update_table2($data,$where){
		self::where($where);
		$this->db->update("computational_time_tbl",$data);
	}
	
	/*
	 * Batch Update Query
	 * @return void
	 */
	function update_batch_table($data,$table_col){
		$this->db->update_batch("computational_time_tbl", $data, $table_col); 
	}
	
	/*
	 * Delete Query
	 * @return void
	 */
	function delete_table($table_col,$key){
		$this->db->delete("computational_time_tbl",array($table_col=>$key));
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
                    . "and leave_from between '2018-08-10' and '2018-08-15' "
                    //. "and leave_to between between '2018-08-10' "
                    /*. "and '2018-08-15'*/." and approved = 1"
                    . " group by leave_from");
            return $data->result();
        }
        function del_table(){
            $this->db->query("delete from computational_time_tbl");
        }
        function get_all_rec(){
			//$this->db->query("DELETE date1 FROM employee_time_record_tbl date1, employee_time_record_tbl date2 WHERE date1.emp_time_record_id < date2.emp_time_record_id AND date1.date_time_record = date2.date_time_record");
            $data = $this->db->query("select DISTINCT emp_id, emp_name, emp_name, date_time_in, date_time_out, date, over_time_total_hour, under_time_total_hour, total_accomplished_hours, total_hours_to_comply_daily, holiday_pay, holiday_hourly_pay, over_time_premium, day_type, leave_from, leave_to, absent, schedue_time, time_suspend, tardiness_amount_to_deduct, 	total_hours_of_juty_required, 	total_normal_pay, tardiness_time_total, late_in_time_status, late_hour_no_deduction, 	total_pay_for_over_all_hour, late_leave, over_time_amount, salary_per_day_amount, salary_per_hour_amount, total_hours_of_juty_complied	 from computational_time_tbl where enabled = 1 order by date");
            return $data->result();
        }
        function get_compute_rec(){
            $data = $this->db->query("select SUM(`total_hours_of_juty_complied`) as total_time, SUM(`tardiness_time_total`) as total_tardiness_time, "
                    . "SUM(`total_hours_of_juty_required`) as total_accomplished_hours_as_required,"
                    . " SUM(`tardiness_amount_to_deduct`) as tardiness_amount,"
                    . " SUM(`over_time_total_hour`) as over_time_total_time,"
                    . " SUM(`over_time_amount`) as over_time_total_amount,"
                    . " SUM(`total_pay_for_over_all_hour`) as total_salary_tally,"
                    . " emp_id"
                    . " from computational_time_tbl group by emp_id");
            return $data->result();
        }
		function get_leave_count(){
            $data = $this->db->get('computational_time_tbl');
            return $data->result();
        }
		function get_leave_record($date, $emp_id){
        $data = $this->db->query("select * from leave_tbl where leave_from = '$date' and emp_id = '$emp_id' and half_day = 1");
        return $data->result();
        /*if($data){
            foreach($data as $data_rec){
                $date_data = $data_rec->leave_from;
                $emp_id_data = $data_rec->emp_id;
                break;
            }
            $this->db->query("update employee_time_record_tbl set enabled = 0 where date_time_record = '$date_data' and emp_id = '$emp_id_data'");
            $data = array(
                    'date_time_record' => $date,
                    'time_in_date' => '13:30:00',
                    'time_out_date' => '17:30:00',
                    'emp_id' => $emp_id,
                    'enabled' => 1
            );

            $this->db->insert('employee_time_record_tbl', $data);
            
        }*/
        
    }
    function update_leave_specific_date($date, $emp_id){
            $this->db->query("update employee_time_record_tbl set enabled = 0 where date(date_time_record) = '$date' and emp_id = '$emp_id' and enabled = 1");
            /*$data = array(
                    'date_time_record' => $date,
                    'time_in_date' => '13:30:00',
                    'time_out_date' => '17:30:00',
                    'emp_id' => $emp_id,
                    'enabled' => 1
            );

            $this->db->insert('employee_time_record_tbl', $data);*/
            $data = array(
                    'type_of_leave' => 'vacation leave',
                    'leave_from' => $date,
                    'leave_to' => $date,
                    'emp_id' => $emp_id,
                    'half_day' => 1,
                    'use' => 1,
                    'approved' => 1,
                    'enabled' => 1
            );

            $this->db->insert('leave_tbl', $data);
            /*
             * $data = array(
                    'type_of_leave' => 'half day',
                    'leave_from' => $date,
                    'leave_to' => $date,
                    'emp_id' => $emp_id,
                    'half_day' => 1,
                    'use' => 1,
                    'approved' => 1,
                    'enabled' => 1
            );

            $this->db->insert('leave_tbl', $data);
             */
    }///new update
    function update_exess_half_day_leave($from, $to, $emp_id){
            $data = $this->db->query("select count(date) as x, date, computational_time_id from computational_time_tbl where date between '$from' and '$to' and emp_id = '$emp_id' and enabled = '1' group by date");
            return $data->result();
        }
        function get_id($cid){
            $data = $this->db->query("select * from computational_time_tbl where computational_time_id = '$cid'");
            return $data->result();
        }
        function del_exceed_leave($c_id, $date){
            $this->db->query("update computational_time_tbl set enabled = 0 where computational_time_id > '$c_id' and date = '$date'");
        }///new update
        
        
        
        ///new update codes
        function get_computational_model_data(){
            $data = $this->db->query("select sum(salary_per_day_amount) as total_sal_day, emp_id from computational_time_tbl group by emp_id");
            return $data->result();
        }
	///new update codes
	
	
	
	//new
	function update_zeros_enabled(){
		$this->db->query("update coputational_time_tbl set enabled = 1 where enabled = 0");
	}
}