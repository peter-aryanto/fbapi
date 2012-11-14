<?php
	class Member_Model extends CI_Model {
	 
	 	function __construct() 
	 	{
	 		parent::__construct();
	 	}
	 
	    function createData($newData) 
	    {
	        $dataBlog = array(
	            'title' => $title,
	            'content' => $content
	        );
	 
	        $this->db->insert('posts', $dataBlog);
	    }
	    
	    fucntion readData()
	    {
	    	$records = $this->db->read
	    }
	 
	}
?>