<?php 
if(!defined ('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('get_route')){
	function get_route($slug){
		$path = false;
		switch( $slug ){
			case 'login':
				$path = '/';
			break;

			case 'dashboard':
				$path = 'dashboard';
			break;

			case 'add_futsal':
				$path = 'index.php/user/add';
			break;	
		}
		return $path;
	}
}

if(! function_exists('get_msg')){
	function get_msg( $key ){
		$msg = array(
		
			
			'dashboard'		=> 'Dashboard',
			'futsal'			=> 'futsal',
			'login'         => 'Login',
			'logout'		=> 'Log Out',
			'menu'			=> 'Menu',
			'label_name'         => 'Name',
			'label_address'        => 'Address',
			'label_password'     => 'Password',
			'label_phone_number' => 'Number',
			'label_username'     => 'Name',
			'add' => 'Add',

			'placeholder_name' 			=> 'Enter Name',
			'placeholder_address' 		=> 'Enter address',
			'placeholder_phone_number' 	=> 'Enter Phone Number',
			'placeholder_password' 		=> 'Enter Password',
			'placeholder_username' 		=> 'Enter Username Or Email',
			'placeholder_find_email'	=> 'Your Registred Email Address',


			'breadcrumb_user_edit_own' 	=> array('MY DETAILS'),
 
			'meta_login' => array(
				'title' 	  => 'Login',
				'description' => 'Login panel',
				'keyword' 	  => 'staff, admin, employee'
			),
			
		);
		return $msg[ $key ];
	}
}

if(! function_exists('get_role_by_id')){
	function get_role_by_id( int $id){
		$ci = get_instance();
		$roles = $ci->config->item('role');
		$a =  array_search($id,$roles,true);
		return $a;
	}
}

if(! function_exists('get_role_id')){
	function get_role_id( $role ){
		$ci = get_instance();
		$roles = $ci->config->item('role');
		return $roles[$role];
	}
}

if( !function_exists( 'is_admin' ) ){	
	function is_admin(){
	 	$ci = get_instance();
		return $ci->session->userdata( 'role' ) == "administrator";
	}
}


if( !function_exists( 'is_staff' ) ){	
	function is_staff(){
		$ci = get_instance();
		return $ci->session->userdata( 'role' ) == "staff";
	}
}

if( !function_exists( 'get_session' ) ){
	function get_session( $param = false ){
		$ci = get_instance();
		return $ci->session->userdata($param);
	}
}

if(! function_exists('is_logged_in')){
	function is_logged_in(){
		return get_session('id');
	}
}

if( !function_exists( 'get_menu' ) ){	
	function get_menu(){
		if(is_admin()){
			return array(
				'dashboard' => array(
					'route' => 'dashboard',
					'title' => get_msg( 'dashboard' ),
					'icon' => 'fas fa-home'
				),
				'futsal' => array(
					'title' => get_msg( 'futsal' ),
					'icon' => 'far fa-calendar-times',
					'route' => get_route('add_futsal')
				),
				'logout' => array(
					'route' => get_route( 'logout' ),
					'title' => get_msg( 'logout' ),
					'icon' => 'fas fa-sign-out-alt'
				),
			);
		}elseif( is_staff() ) {
		 	return array(
		 		'dashboard' => array(
		 			'route' => 'dashboard',
		 			'title' => get_msg( 'dashboard' ),
		 			'icon' => 'fas fa-home'
		 		),
		 		
		 		'logout' => array(
					'route' => get_route( 'logout' ),
					'title' => get_msg( 'logout' ),
					'icon' => 'fas fa-sign-out-alt'
				),
		 	);
		}
	}	
}

if( !function_exists( 'breadcrumb_tail' ) ){
	function breadcrumb_tail( $arr ){
		$tail = false;
		$icon = '<i class="fas fa-angle-right"></i>';
		if( is_array( $arr ) ){
			foreach ( $arr as $key => $value ) {
				$tail .= $value . $icon;
			}
			echo $tail;
		}else{
			echo $arr;
		}
	}
}

if(! function_exists('menu')){
	function menu($current_route){
		print_menu(get_menu(), $current_route);
	}
}

if(! function_exists('print_menu')){
	function print_menu( $menu, $current_menu, $wrapper=true){
	    $wrapper_class = 'sidebar-menu';
	    $header = get_msg('menu');

	    if( $wrapper )
	        echo sprintf('<ul class="%s"><li class="sidebar-header">%s</li>', $wrapper_class, $header);
	    
	    foreach( $menu as $id => $m ){
	        $route = isset($m['route']) ? $m['route'] : '#';
	        $item_class = $current_menu == $id ? 'active menu-item' : 'menu-item';
	        
	        echo sprintf('<li class="%s"><a href="%s">',$item_class, $route);

	        if(isset($m['icon']))
	            echo sprintf('<i class="%s"></i>',$m['icon']);

	        echo $m['title'];

	        if( isset($m['menu']) )
	            echo '<i class="fa fa-angle-right pull-right"></i>';

	        echo '</a>';

	        if(isset($m['menu'])){
	            echo '<ul class="sidebar-submenu">';
	            print_menu($m['menu'], $current_menu, false);
	            echo '</ul>';
	        }else{
	            echo '</li>';
	        }
	    }

	    if( $wrapper ){
	        echo '</ul>'; 
	    }
	}
}

if(! function_exists('do_redirect')){
	function do_redirect($route,$mode='refresh'){
		redirect(get_route($route), $mode);
	}
}


if(! function_exists('print_success_msg')){
	function print_success_msg($msg){
		if(!$msg || count($msg) <= 0)
			return;

		echo '<span class="form-success">';
		foreach($msg as $m){echo $m;}
		echo '</span>';
	}
}

if(! function_exists('print_error_msg')){
	function print_error_msg($msg){
		if(!$msg || count($msg) <= 0)
			return;
		
		echo '<span class="form-err">';
		foreach($msg as $m){echo $m;}
		echo '</span>';
	}
}		

if(! function_exists('get_value')){
	function get_value($object, $key, $default=false){
		if(is_object($object)){
			return $object->$key;
		}else{
			return set_value($key, $default);
		}
	}
}


function get_staff_type( $type ){
	if( $type == 1 ){
		return 'Event';
	}elseif( $type == 2 ){
		return 'Packaging';
	}else{
		return 'Event and Packaging';
	}
}