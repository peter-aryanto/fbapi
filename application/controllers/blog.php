<?php
	
	
	class Blog extends CI_Controller {
		
		#the constructor
		function __construct() {
			parent::__construct();
			
			#$this->load->scaffolding('entries');
		}
		
		
		#the main function
		function index() {
			//echo 'Hello World';
			
			$data['page_title'] = 'My title';
			$data['heading'] = 'My heading';
			$data['todo'] = array('clean house','eat lunch');
			//$this->load->view('blog_view', $data);
			
			//$this->load->model('blog_model');	// THIS IS STILL AN ERROR
			
			$this->load->model('blog_model');
		    // Check if form is submitted
		    if ($this->input->post('submit')) {
		        $title = $this->input->post('title');
		        $content = $this->input->post('content');
		
          		// Add the post
         		//$this->blog_model->addBlog($title, $content);
         		
         		// Adding content to db using an array
         		$myArrayOrg = array(
         			'title' => '$titleArr99',
         			'content' => '$contentArr99'
         		);
         		$data['myArray'] = $myArrayOrg;
		        //$this->db->insert('posts', $data['myArray']);         		
				
				// Adding content to db using class & object
         		$myObjectOrg = new MyClass;
         		$data['myObject'] = $myObjectOrg;
		        //$this->db->insert('posts', $data['myObject']);         		
		    }			
		    
		    $data['query'] = $this->db->get('posts');

			/////
     		$myArrayOrg = array(
     			'title' => '$titleArr99',
     			'content' => '$contentArr99'
     		);
     		$data['myArray'] = $myArrayOrg;

     		$myObjectOrg = new MyClass;
     		$data['myObject'] = $myObjectOrg;
			/////
			
			$this->load->view('blog_view', $data);
		}

	}

	class MyClass {
		public $title = '$titleObj99';
		public $content = '$contentObj99';
	}
	
?>