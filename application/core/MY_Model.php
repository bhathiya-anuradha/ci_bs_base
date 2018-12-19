<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_result($table,$where = array(),$limit = "",$order_by = array())
	{
		$this->db->reset_query();
		$this->db->select('*');
		$this->db->from($table);
		if( ! empty($where))
		{
			$this->db->where($where);
		}
		if( ! $limit != "" && is_numeric($limit))
		{
			$this->db->limit($limit);
		}
		$result = $this->db->get();
		return $result;
	}

	public function get_row_array($table,$where = array(),$limit = "",$order_by = "")
	{
		return $this->get_result($table,$where,$limit,$order_by)->result_array();
	}

	public function get_row($table,$where,$order_by = "")
	{
		$result = $this->get_result($table,$where,1,$order_by)->result_array();
		return ( ! empty($result))?$result[0]:array();
	}


	public function success_return($success = "",$return = array())
	{
		$return['result'] = true;
		$return['success'] = $success;
		return $return;
	}

	public function error_return($error = "",$return = array())
	{	
		$return['result'] = false;
		$return['error'] = $error;
		return $return;
	}

	public function trans_rollback_return($error,$return = array())
	{
		$this->db->trans_rollback();
		$return['result'] = false;
		$return['error'] = $error;
		return $return;
	}

	public function trans_commit_return($return = array(),$success = "")
	{
		if($this->db->trans_status() == true)
		{
			$this->db->trans_commit();
			return $this->success_return($success,$return);
		}
		else
		{
			$this->db->trans_rollback();
			return $this->error_return("Database transaction error",$return);
		}		
	}



}