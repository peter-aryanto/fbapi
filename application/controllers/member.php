<?php

class Member extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$viewData["view_title"] = "Simple Membership System";
		$viewData["view_heading1"] = "Main Page";
		
		# create new data
		if($this->input->post("newMember"))
		{
			$newData = array("id"=>$this->input->post("col1"), "name"=>$this->input->post("col2"));
			$this->db->insert("members", $newData);
			header ("Location: member");
		}
		
		# read existing data
		$viewData["members"] = $this->db->get("members");
		$this->load->view("member_view", $viewData);
		
		# find existing data
		
		# update existing data
		
		# delete existing data
	}
}

?>