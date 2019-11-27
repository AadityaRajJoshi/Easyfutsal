<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller{

	public function index(){

		$this->data['meta'] = get_msg('meta_login');
		$this->data['page'] = 'login_v';
		
		$this->load->view('login_template_v', $this->data);
	}

	public function login(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', get_msg('label_username'), 'required');
		$this->form_validation->set_rules('password', get_msg('label_password'), 'required');
		# check validation
		if ( $this->form_validation->run() ){
			$username = $this->input->post( 'username' );
			$password = md5( $this->input->post( 'password' ) );

			$where = array(
				'user' => $username,
				'password' => $password
			);

			$this->load->model( 'user_m' );
			$db_user = $this->user_m->get( '*', $where);
			if( $db_user ){
			
				do_redirect('dashboard');
			}else{
				echo 'username and password not matched';
			}
		}

		$this->index();
	}

	public function add(){
		$a = $this->session->userdata('id');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', get_msg('label_name'), 'required');
		$this->form_validation->set_rules('address', get_msg('label_address'), 'required');
		$this->form_validation->set_rules('number', get_msg('label_phone_number'), 'required');

		if($this->form_validation->run()){
			$name = $this->input->post('username');
			$address = $this->input->post('address');
			$number = $this->input->post('number');

			$this->load->model('futsal_m');
			$data = array(
				'Name' => $name,
				'Address' => $address,
				'Number' => $number
			);
			if($this->futsal_m->save($data)){
				do_redirect('index.php/user/list');
			} 
		}
		$this->data['current_menu'] = 'futsal';
		$this->data['meta'] = get_msg('meta_login');
		$this->date['page'] = 'add_v.php';
		$this->load->view('dashboard_template_v', $this->data);
		
	}

	public function list(){
		die('dsa');
	}

}