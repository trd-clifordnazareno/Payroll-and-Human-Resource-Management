<?php if ( !  defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model 
{
	
	public function __construct(){
		parent::__construct();
	}
	
	/*
	 * WHERE
	 * @return void
	 */
	public function where($where)
	{
		if(!empty($where))
		$this->db->where($where);
	}
	
	/*
	 * WHERE STRING
	 * @return void
	 */
	public function where_string($where)
	{
		if(!empty($where))
		foreach($where as $val){
			if($val)
			$this->db->where($val);
		}
	}
	
	/*
	 * GROUP BY
	 * @return void
	 */
	public function group_by($group_by)
	{
		if(!empty($group_by))
		$this->db->group_by($group_by); 
	}
	
	/*
	 * ORDER BY
	 * @return void
	 */
	public function orderby($order_by)
	{
		if ( ! empty($order_by))
		{
			foreach($order_by as $field => $direction)
				$this->db->order_by($field, $direction);
		}
	}

	/*
	 * LIMIT - OFFSET
	 * @return void
	 */
	public function limit($limit, $offset)
	{
		if ($offset > 0)
		{
			$offset = ($offset * $limit) - $limit;
			$this->db->limit($limit, $offset);
		}
	}
	
	/*
	 * PAGE LIMIT - OFFSET
	 * @return void
	 */
	public function pagelimit($page, $number)
	{
		$this->db->limit($number,($page-1)*$number);
	}
}
