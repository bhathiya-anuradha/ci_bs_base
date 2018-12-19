<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
	}

	public function get_get_trim($key)
	{
		return trim($this->input->get($key));
	}

	public function get_post_trim($key)
	{
		return trim($this->input->post($key));
	}

	public function feedback_redirect($uri,$result,$success,$error = "")
	{
		if($result['result'])
		{
			$_SESSION['flash_success'] = $success;
		}
		else
		{
			$_SESSION['flash_error'] = $error;
		}		
		redirect($uri);
	}

	public function feedback_redirect_self($result,$success,$error = "")
	{
		$this->feedback_redirect($this->get_full_uri(),$result,$success,$error);
	}

	public function get_full_uri()
	{
		$uri = $this->uri->uri_string();
		$query = $_SERVER['QUERY_STRING'];
		return "{$uri}?{$query}";
	}


}