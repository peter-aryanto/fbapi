<?php
	class Attendee_model extends CI_Model {
	 
	 	function __construct() {
	 		parent::__construct();
	 	}
	 
	    function addAttendee($name, $email) {
	        $attendee = array(
	            'name' => $name,
	            'email' => $email
	        );
	 
	        $this->db->insert('attendee', $attendee);
	        //$this->db->query("INSERT into attendee VALUES($name, $email)");
	    }
	 
	}
?>