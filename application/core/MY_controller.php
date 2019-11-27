<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public $data = array(
		'meta' => array(
			'title' => '',
			'keyword' => '',
			'description' => ''
		),
		'error' => array(),
		'success' => array(),
		'order' => 'asc',
		'order_by' => 'id'
	);

	public function __construct(){
		parent::__construct(); 
	

	    $this->data['menu'] = get_menu();
	}

	public function invalid_access(){
		$this->session->set_flashdata( 'error', get_msg( 'access' ) );
	    do_redirect('dashboard');
	}
  
}