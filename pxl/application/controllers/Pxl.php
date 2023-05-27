<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pxl extends ADMIN_Controller {
	function __construct()
	{
		parent::__construct();
		error_reporting(1);
		$this->load->library('form_validation');
		$this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->db->reconnect();
        $this->data['uploads'] = base_url()."resources/uploads/";
		$this->data['assets'] = base_url()."resources/frontend/";	
		$this->data['settings'] =settings();
		$this->data['title'] = settings()->site_title;
		$this->data['show_header'] = 1;

		if(isset($_SESSION['PXLLOGIN'])){
			if(user_info()->delete_now == 1){
				if($this->uri->segment(1)!="delete" && $this->uri->segment(2)!="cancel_deletion"){
					redirect(base_url()."delete/account");
				}
			}
		}
	}


	private function generateRandomString($length = 10) {
	    $characters = '023456789abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	private function generateRandomStringCode($length = 10) {
	    $characters = '023456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function do_set_usertype_session($id){
		$_SESSION['ACCOUNT_TYPE'] = $id;
	}
	public function logout(){
		unset($_SESSION["PXLLOGIN"]);
		session_destroy();
		redirect(base_url()."login");
	}
	public function index()
	{
		if(isset($_SESSION["PXLLOGIN"])){

			if(user_info()->status == 1){
				redirect(base_url()."dashboard");
			} else {
				$this->data['active_athlete'] = 1;
				$this->data['step'] = 1;

				$this->data['heading'] = "Hello<span>!</span>";
				$this->data['text'] = "Welcome to your <span>PXL</span> Journey";

				$this->load->view('frontend/home',$this->data);
			}
		} else {
			redirect(base_url()."login");
		}
	}
	
	public function login()
	{
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url());
		}
		else{
			$this->data['show_header'] = 0;
			$this->load->view('frontend/login',$this->data);
		}
	}

	public function do_create_athlete_profile(){
		if(isset($_SESSION["PXLLOGIN"]) && user_info()->user_type == 2){
				$rendomcode = $this->generateRandomString(25);
				$url_click = base_url()."do/verify/email/".($rendomcode);

				$arr = array(
					'full_name' => $this->input->post('name'),
					'email'=> user_info()->email,
					'created_at'=> date("Y-m-d H:i:s"),
					'password'=> md5($this->input->post('password')),
					'status'=> 1,
					'email_verify' => 1,
					'session_id' => $rendomcode,
					'user_type' => 1
				);
				$this->db->insert('users',$arr);

				$_SESSION['valid'] = "Your Athlete profile has been created successfully!";
				redirect(base_url()."create/athlete/profile");
		} else {
			redirect(base_url());
		}
	}
	public function signup()
	{
		if(!isset($_SESSION['TAB_SIGNUP'])){
			$_SESSION['TAB_SIGNUP'] = 1;
		}
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url());
		}
		else{
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_message('is_unique', 'The %s already exists in the records.');
				
			if ($this->form_validation->run() == FALSE)
			{
				$this->data['title'] = "Signup";
				$this->load->view('frontend/signup',$this->data);
			}
			else
			{
				$email_check = $this->input->post('email');

				$check_email = $this->db->query("SELECT * FROM users WHERE email = '".$email_check."' AND user_type = ".$this->input->post('type'))->num_rows();

				if($check_email > 0){
					$_SESSION['TAB_SIGNUP'] = $this->input->post('type');
					$_SESSION["invalid"] = "This email already exists in our records.";
					redirect(base_url()."signup");
					die;
				}
				$rendomcode = $this->generateRandomString(25);
				$url_click = base_url()."do/verify/email/".($rendomcode);

				$arr = array(
					'full_name' => $this->input->post('name'),
					'email'=> $this->input->post('email'),
					'created_at'=> date("Y-m-d H:i:s"),
					'password'=> md5($this->input->post('password')),
					'status'=> 0,
					'email_verify' => 0,
					'session_id' => $rendomcode,
					'user_type' => $this->input->post('type')
				);
				$this->db->insert('users',$arr);
				$u_id = $this->db->insert_id();

				// iNSERT TASKS FOR ATHLETES
				if($this->input->post('type')==1){
					$arr = array(
							'uID' => $u_id,
							'task_name'=> 'Complete Athletic Evaluation',
							'task_detail'=> 'test',
							'task_date'=> date("Y-m-d"),
						);
					$this->db->insert('tasks',$arr);
					$arr_2 = array(
							'uID' => $u_id,
							'task_name'=> 'Complete Biological Evaluation',
							'task_detail'=> 'test',
							'task_date'=> date("Y-m-d"),
						);
					$this->db->insert('tasks',$arr_2);
				}

				$message = '
				<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$this->input->post('name').'</strong>,<br /><br/>
					Please click on below link to verify your email address to login.
					
					<br><br>
					<a href='.$url_click.'>'.$url_click.'</a>
					<br />	<br />	
					Best Regards,
					<br>
					'.settings()->site_title.'</span>						
			';
			$this->do_send_email(settings()->email, $this->input->post('email'), 'PXL - Verify Account', $message, 0);

				$_SESSION["valid"] = "An invitation link has been sent to your email address for verification.";
				redirect(base_url()."login");
			}
		}
	}

	public function callback_is_unique($email){
		echo $email;
		die;
	}


	public function profile($id=0)
	{
		$user_id = $id=0?user_info()->id:$id;
		$this->data['user_id'] = $user_id;

		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/profile',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}
	public function coach_profile($id=0)
	{
		$user_id = $id==0?user_info()->id:$id;
		$row = $this->db->query("SELECT * FROM users WHERE id = ".$user_id." AND user_type = 2")->result_object()[0]; 
		$this->data['row'] = $row;
		$this->data['user_id'] = $user_id;
		$this->data['id'] = $id;
		$this->load->view('frontend/profile_coach',$this->data);
	}
	public function notifications()
	{
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/notifications',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}

	public function workouts(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/workouts',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}

	public function players(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['heading'] = "Players";
			$this->data['text'] = "Learn from the <span>Best</span> virtually & in person.";
			$this->load->view('frontend/players',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}

	public function deletion_notice(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/deletion_notice',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}


	public function settings()
	{
		// redirect(base_url()."pxl/wait");
    	// die;
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/settings',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}
	public function public_profile(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/public_profile',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}

	public function plus(){
		$this->data['step'] = 4;

		$this->data['heading'] = "HELLO<span>!</span>";
		$this->data['text'] = "Welcome to your <span>PXL</span> Journey";
		$this->load->view('frontend/pxl_plus',$this->data);
	}
	public function coaches(){
		$this->data['heading'] = "Coaches";
		$this->data['text'] = "Learn from the <span>Best</span> virtually & in person. ";
		$this->load->view('frontend/coaches',$this->data);
	}
	public function events(){
		$this->data['heading'] = "Affiliates";
		$this->data['text'] = "We have <span>Partners</span> across <br>the nation";
		$this->load->view('frontend/events',$this->data);
	}

	public function shop(){
		$this->data['active_shop'] = 1;
		$this->data['text'] = "Looking for something <br>to <span>buy?</span>";
		$this->load->view('frontend/shop',$this->data);
	}

	public function shop_account($id){
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url()."shop/shipping/".$id);
		} else {
			$this->data['active_shop'] = 1;
			$this->data['shop_step'] = 1;
			$this->data['id'] = $id;
			$this->load->view('frontend/shop_account',$this->data);
		}
	}

	public function shop_shipping($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_shop'] = 1;
			$this->data['shop_step'] = 2;
			$this->data['id'] = $id;
			$this->load->view('frontend/shop_shipping',$this->data);
		} else {
			redirect(base_url()."shop/account/".$id);
		}
	}

	public function shop_payment($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_shop'] = 1;
			$this->data['shop_step'] = 3;
			$this->data['id'] = $id;
			$this->load->view('frontend/shop_payment',$this->data);
		} else {
			redirect(base_url()."shop/account/".$id);
		}
	}

	public function update_address($id){
		$get_address = $this->db->query("SELECT * FROM user_save_address WHERE id = ".$id." AND uID = ".user_info()->id)->result_array()[0];
		$_SESSION['ADDRESS_SAVE'] = $id;
		$_SESSION['SHIPPING_DETAILS'] = $get_address;
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function save_shipping($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$_SESSION['SHIPPING_DETAILS'] = $_POST;
			redirect(base_url()."shop/payment/".$id);
		} else {
			redirect(base_url()."shop/account/".$id);
		}
	}

	public function minus_qty(){
		$qty = isset($_SESSION['qty'])?$_SESSION['qty']:1;
		if($qty == 1){
			$_SESSION['invalid'] = "product quantity can't be ZERO";
			redirect($_SERVER['HTTP_REFERER']);
		}
		$_SESSION['qty'] = $qty - 1;
		echo  $qty-1;
		// redirect($_SERVER['HTTP_REFERER']);
	}
	public function plus_qty(){
		$qty = isset($_SESSION['qty'])?$_SESSION['qty']:1;
		$_SESSION['qty'] = $qty + 1;
		echo  $qty+1;
		// redirect($_SERVER['HTTP_REFERER']);
	}

	public function get_right_side_bar($id){
		$this->data['id'] = $id;
		echo $this->load->view('frontend/common/summary_product',$this->data, true);
	}

	public function update_discount(){

		$cop = $this->input->post('discount_item');

		$coupoun = $this->db->query("SELECT * FROM coupons WHERE coupoun = '".$cop."'")->result_object()[0];
	
		if(empty($coupoun)) {
			$_SESSION['invalid'] = "Invalid Coupoun code.";
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$_SESSION['COUPN_ADD'] = $cop;
			$_SESSION['discount'] = $coupoun->disocunt;
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function do_payment_shop($id){

    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$product = $this->db->query("SELECT * FROM products WHERE id = ".$id)->result_array()[0];
			// Buyer information
			$name = $_POST['name_on_card'];
			$nameArr = explode(' ', $name);
			$firstName = !empty($nameArr[0])?$nameArr[0]:'';
			$lastName = !empty($nameArr[1])?$nameArr[1]:'';
			// $city = 'Charleston';
			// $zipcode = '25301';
			$countryCode = 'US';
			
			// Card details
			$creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
			$creditCardType = $_POST['card_type'];
			$expMonth = $_POST['expiry_month'];
			$expYear = $_POST['expiry_year'];
			$cvv = $_POST['cvv'];
			
			// Load PaypalPro library
			$this->load->library('PaypalPro');
			
			// Payment details
			$paypalParams = array(
				'paymentAction' => 'Sale',
				'itemName' => $product['title'],
				'itemNumber' => $product['id'],
				'amount' => $_SESSION['total_price'],
				'currencyCode' => 'USD',
				'creditCardType' => 'Visa',
				'creditCardNumber' => $creditCardNumber,
				'expMonth' => $expMonth,
				'expYear' => $expYear,
				'cvv' => $cvv,
				'firstName' => $firstName,
				'lastName' => $lastName,
				// 'city' => $city,
				// 'zip'	=> $zipcode,
				'countryCode' => $countryCode,
			);
			$response = $this->paypalpro->paypalCall($paypalParams);
			$paymentStatus = strtoupper($response["ACK"]);
			// echo "<pre>";
			// print_r($response);
			// die;
			if($paymentStatus == "SUCCESS"){
				// Transaction info
				$transactionID = $response['TRANSACTIONID'];
				$paidAmount = $response['AMT'];
				$currency = $response['CURRENCYCODE'];
				
				// INSERT ORDER				
				$arr = array(
					'uID' => user_info()->id,
					'product_id' => $id,
					'price' => $paidAmount,
					'address' => $_SESSION['SHIPPING_DETAILS']['address'],
					'street' => $_SESSION['SHIPPING_DETAILS']['street'],
					'zipcode' => $_SESSION['SHIPPING_DETAILS']['zipcode'],
					'shipping_fee' => 0,
					'tax' => $_SESSION['TAXX_PRICE'],
					'discount' => isset($_SESSION['discount'])?$_SESSION['discount']:0,
					'transaction_id' => $transactionID,
					'payment_done' => 1,
					'status' => 1,
					'created_at' => date("Y-m-d H:i:s"),
				);
				$this->db->insert('orders',$arr);

				unset($_SESSION['price']);
				unset($_SESSION['qty']);
				unset($_SESSION['discount']);
				unset($_SESSION['ADDRESS_SAVE']);
				unset($_SESSION['SHIPPING_DETAILS']);
				unset($_SESSION['COUPN_ADD']);
				unset($_SESSION['TAXX_PRICE']);
				unset($_SESSION['total_price']);

				$this->do_send_notification(user_info()->id, "Your order has been placed successfully!", 2);
				
				$_SESSION['SUBSCRIBE_DONE'] = 1;
				redirect($_SERVER['HTTP_REFERER']);

			}else{
				$_SESSION['invalid'] = $response['L_LONGMESSAGE0'];
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
    }

    public function do_back_shop(){
    	unset($_SESSION['SUBSCRIBE_DONE']);
    	redirect(base_url()."shop");
    }

	public function cance_order(){
		unset($_SESSION['price']);
		unset($_SESSION['qty']);
		unset($_SESSION['discount']);
		unset($_SESSION['ADDRESS_SAVE']);
		unset($_SESSION['SHIPPING_DETAILS']);
		unset($_SESSION['COUPN_ADD']);
		redirect(base_url()."shop");
	}

	public function invite_coaches(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 1;

			$this->data['heading'] = "Just get it <span>Done!</span>";
			$this->data['text'] = "This is part of your workout.";
			$this->load->view('frontend/invite_coaches',$this->data);
		}
		else{
			redirect(base_url()."login");
		}
	}

	public function do_invite_coaches(){
		if(isset($_SESSION["PXLLOGIN"])){
			$email_to = $this->input->post("email_coach");
			// SEND EMAIL
			$message = '
				<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>COACH</strong>,<br /><br/>
					'.user_info()->full_name.' would like to invite you on <b>PXL</b> platform as a coach.
					<br>
					Click on below link to signup and create your profile.

					<br><br>
					<a href='.base_url().'>'.base_url().'</a>
					<br />	<br />	
					Best Regards,
					<br>
					'.settings()->site_title.'</span>						
			';
			$this->do_send_email(settings()->email, $email_to, 'PXL - Invite Coach', $message, 0);
			redirect(base_url()."testing");
		}
		else{
			redirect(base_url()."login");
		}
	}


	public function testing()
	{
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 2;

			$this->data['heading'] = "Just get it <span>Done!</span>";
			$this->data['text'] = "This is part of your workout.";

			$this->load->view('frontend/testing',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function explore(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 4;

			$this->data['heading'] = "GO <span>Play!</span>";
			$this->data['text'] = "";

			$this->load->view('frontend/explore',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function tasks(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/tasks',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function schedule(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/schedule',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function support(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/support',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function get_moving(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 3;

			$this->data['heading'] = "<span>Whew,</span>";
			$this->data['text'] = "Good Work!";

			$this->load->view('frontend/get_moving',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function get_moving_packages($id){
		
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 3;
			$this->data['id'] = $id;
			$this->data['heading'] = "<span>Whew,</span>";
			$this->data['text'] = "Good Work!";

			$this->load->view('frontend/moving_packages',$this->data);
		} else {
			redirect(base_url()."login");
		}
	}

	public function do_submit_testing(){
		if(isset($_SESSION["PXLLOGIN"])){
			$value = $this->input->post('tested');
			if($value == 1){
				
				$testing = $this->db->query("SELECT * FROM testing WHERE uID = ".user_info()->id)->result_object()[0];

		    	$arr = array(
					'uID' => user_info()->id,
					'created_at'=> date("Y-m-d"),
					'hemoglobin' => $this->input->post('hemoglobin'),
					'hematocrit' => $this->input->post('hematocrit'),
					'white_blood_count' => $this->input->post('white_blood_count'),
					'platelet_count' => $this->input->post('platelet_count'),
					'glucose' => $this->input->post('glucose'),
					'creatine' => $this->input->post('creatine'),
					'ast' => $this->input->post('ast'),
					'alt' => $this->input->post('alt'),
					'protein' => $this->input->post('protein'),
					'anion' => $this->input->post('anion'),
				);

				$input = "file_test";
		        if((isset($_FILES[$input]) && $_FILES[$input]['size'] > 0)) {
		        	$image = $this->image_upload($input,'./resources/uploads/collection/','pdf|PDF');
			        if($image['upload'] == true || $_FILES[$input]['size']<1){
			            $image = $image['data'];
			            $arr['test_1'] = $image['file_name'];
			        } else {
			        	// print_r($image['data']);
			        	$_SESSION['invalid'] = $image['data'];
			        	redirect(base_url()."testing");
			        	die;
			        }
		    	}
		    	

		    	if(empty($testing)){
		    		$this->db->insert('testing',$arr);
		    	} else {
		    		unset($arr['uID']);
		    		$this->db->where('uID', user_info()->id);
					$this->db->update('testing',$arr);
		    	}
		    	if($_GET['return'] == 1){
		    		$_SESSION['valid'] = "Your biological evaluation information has been updated successfully!";
		    		redirect($_SERVER['HTTP_REFERER']);
		    	} else {
		    		$_SESSION['valid'] = "Your test has been uploaded successfully!";
					redirect(base_url()."get/moving");
				}
			} else {
				redirect(base_url()."get/moving");
			}
		} else {
			redirect(base_url()."login");
		}
	}

	public function do_submit_profile(){
		if(isset($_SESSION["PXLLOGIN"])){
			$arr = array(
				'dob' => $this->input->post('age'),
				'current_sport'=> $this->input->post('sports'),
				'address'=> $this->input->post('address'),
				'phone'=> $this->input->post('phone'),
				'sports'=> "all",
				'country' => $this->input->post('country'),
			);

			if(user_info()->user_type == 2){
				$arr['overview'] 	= nl2br($this->input->post('overview'));
				$arr['experience'] 	= nl2br($this->input->post('experience'));
			}

			if(user_info()->user_type == 1){
				$arr['weight'] 	= $this->input->post('weight');
				$arr['height'] 	= $this->input->post('height');
			}

			$input = "logo";
	        if((isset($_FILES[$input]) && $_FILES[$input]['size'] > 0)) {
	        	$image = $this->image_upload($input,'./resources/uploads/profiles/','jpg|jpeg|png');
		        if($image['upload'] == true || $_FILES[$input]['size']<1){
		            $image = $image['data'];
		            $arr['profile_pic'] = $image['file_name'];
		        }
	    	}

			$this->db->where('id', user_info()->id);
			$this->db->update('users',$arr);
			if(isset($_GET['return']) && $_GET['return'] == 1) {
				$_SESSION['valid'] = "Your profile has been updated successfully!";
				redirect(base_url()."public/profile");
			} else {
				redirect(base_url()."invite/coaches");
			}
		}
		else{
			redirect(base_url()."login");
		}
    }

	public function do_login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$type = $this->input->post('type');
		
		$check_login = $this->db->query("SELECT * FROM `users` where LOWER(`email`) = '".strtolower($email)."' AND `password` = '".$password."'");
		$ceck_count = $check_login->num_rows();
		if($ceck_count > 0){
			$row = $check_login->result_object()[0];
			if($type==1){
				$check_login_again = $this->db->query("SELECT * FROM `users` where LOWER(`email`) = '".strtolower($email)."' AND `password` = '".$password."' AND user_type = 1")->num_rows();
				if($check_login_again == 0){
					$type_text = $type == 1 ? "Athlete" : "Coach";
					$_SESSION["invalid"] = "This email is not sign up as ".$type_text.". Please signup.";
					redirect(base_url()."login");
					die;
				}
			} else {
				$check_login_again = $this->db->query("SELECT * FROM `users` where LOWER(`email`) = '".strtolower($email)."' AND `password` = '".$password."' AND user_type = 2")->num_rows();
				if($check_login_again == 0){
					$type_text = $type == 1 ? "Athlete" : "Coach";
					$_SESSION["invalid"] = "This email is not sign up as ".$type_text.". Please signup.";
					redirect(base_url()."login");
					die;
				}
			}

			$check_login_aag = $this->db->query("SELECT * FROM `users` where LOWER(`email`) = '".strtolower($email)."' AND `password` = '".$password."' AND user_type = ".$type)->result_object()[0];

			
			if( $row->status == 0 && $row->user_type == 2){
				unset($_SESSION['PXLLOGIN']);
				$_SESSION["invalid"] = "Your account is not approved by admin yet!";
				redirect(base_url()."login");
				die;
			}

			$_SESSION["PXLLOGIN"] = $check_login_aag;
			if($row->status==0){
				if($row->email_verify == 0){
					unset($_SESSION['PXLLOGIN']);
					$_SESSION["invalid"] = "Please verify your email address to login.";
					redirect(base_url());
					die;
				} else {
					$_SESSION["invalid"] = "Please setup your profile.";
					redirect(base_url());
				}
			} else {
				if(isset($_GET['ret']) && $_GET['ret'] == "shop"){
					redirect(base_url()."shop/account/".$_GET['id']);
				} else {
					redirect(base_url()."dashboard");
				}
			}
		}
		else {

			// $show_custom_login = $this->db->query("SELECT * FROM `users` where LOWER(`email`) = '".strtolower($email)."'")->num_rows();
			// if($show_custom_login > 0){
			// 	$type_text = $type == 1 ? "Athlete" : "Coach";
			// 	$_SESSION["invalid"] = "This email is not sign up as ".$type_text." Please signup.";
			// 	redirect(base_url()."login");
			// }else {
				$_SESSION["invalid"] = "Invalid Email Address or Password!";
				redirect(base_url()."login");
			
		}
	}

	public function do_verify_email($code){
		$check_code = $this->db->query("SELECT * FROM users WHERE session_id = '".$code."'")->result_object()[0];
		if(empty($check_code)){
			$_SESSION["invalid"] = "Invalid Link or expired!";
			redirect(base_url()."login");
		} else {
			$arr = array(
				'session_id' => null,
				'email_verify'=> 1,
				// 'status'=> $check_code->user_type==1?0:1,
				'status'=> 0,
			);
			
			$this->db->where('session_id', $code);
			$this->db->update('users',$arr);
			$_SESSION["valid"] = "Your email has been verified successfully!";
			redirect(base_url()."login");
		}
	}

	public function dashboard(){
		if(isset($_SESSION["PXLLOGIN"])){

			if(user_info()->user_type == 1){
				if(user_info()->status == 0){
					$_SESSION["invalid"] = "Please complete your profile to access your dashboard!";
					redirect(base_url());
				} else {
					// redirect(base_url()."pxl/wait");
					$this->load->view('frontend/dashboard',$this->data);
				}
			} else {
				$this->load->view('frontend/dashboard_coach',$this->data);
			}
		} else {
			redirect(base_url()."login");
		}
	}

	public function wait(){
		// if(isset($_SESSION["PXLLOGIN"])){
		// 	if(user_info()->status == 0){
		// 		$_SESSION["invalid"] = "Please complete your profile to access your dashboard!";
		// 		redirect(base_url());
		// 	} else {
				$this->load->view('frontend/comming_soon', $this->data);
				// $this->load->view('frontend/dashboard',$this->data);
		// 	}
		// } else {
		// 	redirect(base_url()."login");
		// }
	}

	

	public function forgot_password(){
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url()."mobile/home");
		} else {
			$this->data['show_header'] = 0;
			$this->load->view('frontend/forgot_password',$this->data);
		}
	}
	public function forgot_password_email()
	{
		$email_to = $this->input->post('email');
		$ret = $this->db->query("SELECT * FROM `users` where `email` = '".$email_to."'");
		$ret_num = $ret->num_rows();
		if($ret_num == 0 )
		{
			$_SESSION['invalid'] = 'Email Address not found in our records!';
			redirect(base_url().'forgot/password');
		}
		else
		{
			$rendomcode = $this->generateRandomStringCode(4);
			$arr = array(
				'otp_code' => $rendomcode,
			);
			$this->db->where('email', $email_to);
			$this->db->update('users',$arr);

			// SEND EMAIL
			$message = '
				<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>USER</strong>,<br /><br/>
					Please use below code to reset your password.
					<br />
					<br />
					OTP Code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>:&nbsp;&nbsp;</strong> '.$rendomcode.'<br />
					<br />	
					Best Regards,
					<br>
					'.settings()->site_title.'</span>						
			';
			$this->do_send_email(settings()->email, $email_to, 'Forgot Password', $message, 1);
			
			$_SESSION['EMAILFORGOT'] = $email_to;
			$_SESSION['valid'] = 'OTP code has been sent successfully to your email!';
			redirect(base_url().'otp/password');
		}
	}

	public function forgot_password_otp(){
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url());
		} else {
			if(isset($_SESSION['EMAILFORGOT'])){
				$this->load->view('frontend/forgot_otp',$this->data);
			} else {
				$_SESSION['invalid'] = 'Invalid Link or email not found!';
				redirect(base_url().'login');
			}
		}
	}

	public function validate_otp(){
		if(isset($_SESSION["PXLLOGIN"])){
			redirect(base_url());
		} else {
			if(isset($_SESSION['EMAILFORGOT'])){
				$check_otp = $this->db->query("SELECT * FROM users WHERE LOWER(email) = '".strtolower($_SESSION['EMAILFORGOT'])."' AND otp_code = ".$this->input->post('otp'))->result_object()[0];
				if(!empty($check_otp)){
					$this->load->view('frontend/password_recover',$this->data);
				} else {
					$_SESSION['invalid'] = 'Invalid OTP Code!';
					redirect(base_url().'otp/password');
				}
				
			} else {
				$_SESSION['invalid'] = 'Invalid Link or email not found!';
				redirect(base_url().'login');
			}
		}
	}

	public function do_change_password(){
		$this->form_validation->set_rules('opass', 'Old password', 'trim|required');
		$this->form_validation->set_rules('npass', 'New password', 'trim|required');
		$this->form_validation->set_rules('cnpass', 'Confirm password', 'trim|required|matches[npass]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('frontend/change_password',$this->data);
		}
		else
		{
			$old = $this->db->query("SELECT * FROM users WHERE id = ".user_info()->id." AND password = '".md5($this->input->post('opass'))."'")->num_rows();
			if($old == 0){
				$_SESSION["invalid"] = "Old password is not correct.";
				redirect(base_url()."change/password");
				die;
			}

			$arr = array(
				'password'=> md5($this->input->post('npass')),
				'password_change'=> date("Y-m-d H:i:s"),
			);
			$this->db->where('id', user_info()->id);
			$this->db->update('users',$arr);
			$_SESSION["valid"] = "You password has been changed successfully.";
			redirect(base_url()."settings");
		}
	}

	public function do_update_password(){
		$this->form_validation->set_rules('password', 'New password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('frontend/password_recover',$this->data);
		}
		else
		{
			$arr = array(
				'password'=> md5($this->input->post('password')),
			);
			$this->db->where('email', $_SESSION['EMAILFORGOT']);
			$this->db->update('users',$arr);
			unset($_SESSION['EMAILFORGOT']);
			$_SESSION["valid"] = "You password has been updated successfully.";
			redirect(base_url()."login");
		}
	}

	public function contact_us()
	{
		$this->load->view('frontend/contact_us',$this->data);
	}

    public function do_update_profile(){
    	$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
    	$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
    	$this->form_validation->set_rules('mobile', 'Phone Number', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('frontend/profile',$this->data);
		}
		else
		{
			$arr = array(
				'first_name'=> $this->input->post('fname'),
				'last_name'=> $this->input->post('lname'),
				'mobile'=> $this->input->post('mobile'),
			);

			$input = "logo";
	        if((isset($_FILES[$input]) && $_FILES[$input]['size'] > 0)) {
	        	$image = $this->image_upload($input,'./resources/uploads/profiles/','jpg|jpeg|png');
		        if($image['upload'] == true || $_FILES[$input]['size']<1){
		            $image = $image['data'];
		            $arr['image'] = $image['file_name'];
		        }
	    	}

			$this->db->where('id', user_info()->id);
			$this->db->update('users',$arr);
			$_SESSION["valid"] = "Profile has been updated successfully.";
			redirect(base_url()."profile");
		}
    }

    public function subscription($id){
    	if(isset($_SESSION["PXLLOGIN"])){
			$this->data['active_athlete'] = 1;
			$this->data['step'] = 3;
			$this->data['package_id'] = $id;
			$this->load->view('frontend/payment_form',$this->data);
		} else {
			redirect(base_url()."login");
		}
    }

    public function create_athlete_profile(){
    	if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 2){
				$this->load->view('frontend/create_athlete_profile',$this->data);
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
    }

    public function my_evaluation(){
    	if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 1){
				$this->load->view('frontend/my_evaluation',$this->data);
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
    }

    public function my_biological_evaluation(){
    	if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 1){
				$this->load->view('frontend/my_biological_evaluation',$this->data);
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
    }

    public function my_athletic_evaluation(){
    	if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 1){
				$this->load->view('frontend/my_athletic_evaluation',$this->data);
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
    }
    public function do_submit_athletic_evaluation(){
		if(isset($_SESSION["PXLLOGIN"])){
			
			$testing = $this->db->query("SELECT * FROM athlete_evaluation WHERE uID = ".user_info()->id)->num_rows();
			$arr = array(
					"evaluation_data"=>json_encode($_POST),
					"uID"=>user_info()->id,
				);
			if($testing>0){
				unset($arr['uID']);
				$this->db->where('uID', user_info()->id);
				$this->db->update('athlete_evaluation',$arr);
			} else {
				$this->db->insert('athlete_evaluation',$arr);
			}
			$_SESSION['valid'] = "Your Athletic Evaluation has been updated successfully!";
			redirect(base_url()."athletic/evaluation");
			
		}
		else{
			redirect(base_url()."login");
		}
    }
    public function downgrade($id){
    	$arr = array(
				'package_id' => $id,
				'subscriptin_start' => 0,
				'subscriptin_date' => date("Y-m-d"),
				'subscription_expiry' => null,
				'transaction_id' => null,
				'transaction_amount' => 0,
				'payment_done' => 0,
				'status' => 1,
			);
			$this->db->where('id', user_info()->id);
			$this->db->update('users',$arr);
			
			if(isset($_GET['return']) && $_GET['return'] == "moving"){
				$_SESSION['SUBSCRIBE_DONE'] = 1;
				redirect(base_url()."subscription/".$id);
			} else {
				$_SESSION['valid'] = "Your subscription has been updated successfully.";
				redirect($_SERVER['HTTP_REFERER']);
			}
    }

    public function do_payment_subscription($id){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$product = $this->db->query("SELECT * FROM packages WHERE id = ".$id)->result_array()[0];
			// Buyer information
			$name = $_POST['name_on_card'];
			$nameArr = explode(' ', $name);
			$firstName = !empty($nameArr[0])?$nameArr[0]:'';
			$lastName = !empty($nameArr[1])?$nameArr[1]:'';
			// $city = 'Charleston';
			// $zipcode = '25301';
			$countryCode = 'US';
			
			// Card details
			$creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
			$creditCardType = $_POST['card_type'];
			$expMonth = $_POST['expiry_month'];
			$expYear = $_POST['expiry_year'];
			$cvv = $_POST['cvv'];
			
			// Load PaypalPro library
			$this->load->library('PaypalPro');
			
			// Payment details
			$paypalParams = array(
				'paymentAction' => 'Sale',
				'itemName' => $product['title'],
				'itemNumber' => $product['id'],
				'amount' => $product['price'],
				'currencyCode' => 'USD',
				'creditCardType' => 'Visa',
				'creditCardNumber' => $creditCardNumber,
				'expMonth' => $expMonth,
				'expYear' => $expYear,
				'cvv' => $cvv,
				'firstName' => $firstName,
				'lastName' => $lastName,
				// 'city' => $city,
				// 'zip'	=> $zipcode,
				'countryCode' => $countryCode,
			);
			$response = $this->paypalpro->paypalCall($paypalParams);
			$paymentStatus = strtoupper($response["ACK"]);
			// echo "<pre>";
			// print_r($response);
			// die;
			if($paymentStatus == "SUCCESS"){
				// Transaction info
				$transactionID = $response['TRANSACTIONID'];
				$paidAmount = $response['AMT'];
				$currency = $response['CURRENCYCODE'];

				$today = date("Y-m-d");
            	$new_date = date('Y-m-d', strtotime('30 days', strtotime($today)));

				$arr = array(
					'package_id' => $id,
					'subscriptin_start' => 1,
					'subscriptin_date' => date("Y-m-d"),
					'subscription_expiry' => $new_date,
					'transaction_id' => $transactionID,
					'transaction_amount' => $paidAmount,
					'payment_done' => 1,
					'status' => 1,
				);
				$this->db->where('id', user_info()->id);
				$this->db->update('users',$arr);
				
				// $_SESSION['valid'] = "You've successfully subscribed to PXL.";
				// redirect(base_url()."explore");
				$_SESSION['SUBSCRIBE_DONE'] = 1;
				redirect($_SERVER['HTTP_REFERER']);

			}else{
				$_SESSION['invalid'] = $response['L_LONGMESSAGE0'];
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
    }

    public function do_submit_task(){
    	if(isset($_SESSION["PXLLOGIN"])){
			$arr = array(
					'uID' => user_info()->id,
					'task_name'=> $this->input->post('task_name'),
					'task_detail'=> 'test',
					'task_date'=> $this->input->post('task_date'),
				);
			$this->db->insert('tasks',$arr);
			$_SESSION['valid'] = "New task added successfully!";
			redirect(base_url()."tasks");
		} else {
			redirect(base_url()."login");
		}
    }

    public function do_save_schedule(){
    	if(isset($_SESSION["PXLLOGIN"])){
    		$s_time = date("H:i:s", strtotime($this->input->post('start_time')));
    		$e_time = date("H:i:s", strtotime($this->input->post('end_time')));
			$arr = array(
					'uID' => user_info()->id,
					'title'=> $this->input->post('task_name'),
					'task_date'=> $this->input->post('task_date'),
					'start_time'=> $s_time,
					'end_time'=> $e_time,
				);
			
			$this->db->insert('schedule',$arr);
			$_SESSION['valid'] = "New schedule added successfully!";
			redirect(base_url()."schedule");
		} else {
			redirect(base_url()."login");
		}
    }

    public function do_update_task($id){
    	$tasks = $this->db->query("SELECT * FROM tasks WHERE id = ".$id)->result_object()[0];

    	$value = $tasks->complete==1?0:1;

    	$arr = array(
			'complete' => $value,
		);
		$this->db->where('id', $id);
		$this->db->update('tasks',$arr);

		$_SESSION['valid'] = $tasks->complete==1?"Task has been marked as incomplete!":"Task Completed successfully!";
		echo 1;
    }

    public function do_delete_account(){
    	if(isset($_SESSION['PXLLOGIN'])){

    		$checkbox = $this->input->post('accept');
    		if($checkbox==1){
    			$today = date("Y-m-d");
            	$new_date = date('Y-m-d', strtotime('14 days', strtotime($today)));
    			$arr = array(
					'delete_now' 	=> 1,
					'delete_date' 	=> $new_date
				);
				$this->db->where('id', user_info()->id);
				$this->db->update('users',$arr);
				unset($_SESSION['PXLLOGIN']);
				// session_destroy();
				$_SESSION['valid'] = "Your account deletion process has been started.";
    			redirect(base_url()."login");

    		} else {
    			$_SESSION['invalid'] = "Please confirm you want to delete the account!";
    			redirect(base_url()."settings");
    		}
    		die;

    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }


    public function cancel_deletion(){
    	if(isset($_SESSION['PXLLOGIN'])){
    			$arr = array(
					'delete_now' 	=> 0,
					'delete_date' 	=> null
				);
				$this->db->where('id', user_info()->id);
				$this->db->update('users',$arr);
    			redirect(base_url()."dashboard");


    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function change_user_name(){
    	if(isset($_SESSION['PXLLOGIN'])){
    		$this->load->view('frontend/change_username',$this->data);
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function upgrade_plan(){
    	if(isset($_SESSION['PXLLOGIN'])){
    		if(user_info()->user_type == 1){
    			$this->load->view('frontend/upgrade_plan',$this->data);
    		}else {
    			redirect(base_url()."settings");
    		}
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function messages($id=""){
    	// redirect(base_url()."pxl/wait");
    	// die;
    	if(isset($_SESSION['PXLLOGIN'])){
    		if(user_info()->status == 0){
    			$_SESSION['invalid'] = "Please complete your profile to message players.";
    			redirect(base_url());
    		} else {
    			$this->data['player_id'] = $id;
    			$user_check = $this->db->query("SELECT * FROM users WHERE (id = '".$id."' OR username = '".$id."')")->result_object()[0];
    			$this->data['user_selected'] = $user_check->id;
    			$this->data['user_selected_full'] = $user_check;
    			if($id!= ""){
    				$this->db->query("UPDATE conversations SET m_read = 1 WHERE ((user_id = ".$user_check->id." AND player_id = ".user_info()->id.") OR (user_id = ".user_info()->id." AND player_id = ".$user_check->id.")) ");
				}
    			$this->load->view('frontend/messages',$this->data);
    		}
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function delete_chat($id){
    	if(isset($_SESSION['PXLLOGIN'])){
    		
    		$this->db->query("DELETE FROM conversations WHERE (user_id = ".$id." AND player_id = ".user_info()->id.") OR (user_id = ".user_info()->id." AND player_id = ".$id.")");
    		$_SESSION['valid'] = "Chat has been deleted successfully!";
    		redirect(base_url()."messages");
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function conversation($id){
    	// redirect(base_url()."pxl/wait");
    	// die;
    	if(isset($_SESSION['PXLLOGIN'])){
    		if(user_info()->status == 0){
    			$_SESSION['invalid'] = "Please complete your profile to message players.";
    			redirect(base_url());
    		} else {
    			$conversation = $this->db->query("SELECT * FROM conversations WHERE 
    				(
    					(player_id = ".$id." AND user_id = ".user_info()->id.")
    					OR 
    					(player_id = ".user_info()->id." AND user_id = ".$id.")
    				)")->result_object()[0];


    			$player_profile = $this->db->query("SELECT * from users WHERE id = ".$id)->result_object()[0];

    			if(empty($conversation)){
    				$arr = array(
						'user_id' => user_info()->id,
						'player_id'=> $id,
						'is_coach' => $player_profile->user_type==1?0:1
					);
					$this->db->insert('conversations',$arr);
					$chat_id = $this->db->insert_id();
    			}
    			$user_name = $player_profile->username !=null?$player_profile->username:$player_profile->id;
    			redirect(base_url()."messages/".$user_name);
    		}
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function do_update_username(){
    	if(isset($_SESSION['PXLLOGIN'])){
    		$check_username = $this->db->query("SELECT * FROM users WHERE LOWER(username) = '".strtolower($this->input->post('username'))."' AND id != ".user_info()->id)->num_rows();
    		if($check_username == 0){
	    		$arr = array(
					'username' 	=> strtolower($this->input->post('username')),
				);
				$this->db->where('id', user_info()->id);
				$this->db->update('users',$arr);
				$_SESSION['valid'] = "Username updated successfully!";
			} else {
				$_SESSION['invalid'] = "Username already taken!";
			}
			redirect(base_url()."change/username");
    	} else {
    		$_SESSION['invalid'] = "Please login!";
    		redirect(base_url()."login");
    	}
    }

    public function get_chat_display($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['id'] = $id;
			echo $this->load->view('frontend/common/chat_listing',$this->data,true);
		} else {
			$_SESSION["invalid"] = "You are not loggedin, your chat has been ended";
			echo 999999;
		}
	}

	public function do_send_notification($user_id, $message, $type){
		if($user_id != ""){
			$arr = array(
				'user_id' => $user_id,
				'message'=> $message,
				"created_at" => date("Y-m-d H:i:s"),
				"n_type" => $type
			);
			$this->db->insert('notifications',$arr);
		}
	}

	public function send_chat($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$user_details = $this->db->query(
				"SELECT * from users 
				WHERE 
					id = '".$id."'
					OR 
					username = '".$id."'
				"
				)->result_object()[0];

				$chat_data = $this->db->query("SELECT * FROM conversations WHERE (user_id = ".$user_details->id." OR player_id = ".$user_details->id." ) AND (user_id = ".user_info()->id." OR player_id = ".user_info()->id.")")->result_object()[0];
					// echo $this->db->last_query();
					// die;
					
					$arr = array(
						'user_id' => $chat_data->user_id==user_info()->id?user_info()->id:$user_details->id,
						'player_id'=> $chat_data->player_id==user_info()->id?user_info()->id:$user_details->id,
						"chat" => $_POST['chat_text'],
						"created_at" => date("Y-m-d H:i:s"),
						"sender_id" => user_info()->id,
						'is_coach' => $chat_data->is_coach
					);

					$input = "file";
			        if((isset($_FILES[$input]) && $_FILES[$input]['size'] > 0)) {
			        	$image = $this->image_upload($input,'./resources/uploads/chats/','*');
				        if($image['upload'] == true || $_FILES[$input]['size']<1){
				            $image = $image['data'];
				            $arr['media'] = $image['file_name'];
				        }
			    	}
					
					$this->db->insert('conversations',$arr);
					$chat_id = $this->db->insert_id();

					$this->do_send_notification($user_details->id, user_info()->full_name." has sent you a message.", 1);

					echo 1;
		} else {
			$_SESSION["invalid"] = "You are not loggedin, your chat has been ended";
			echo 999999;
		}
	}

	public function get_products(){

		$country_ip = '';

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$country_ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$country_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$country_ip = $_SERVER['REMOTE_ADDR'];
		}

		$ipdat = @json_decode(file_get_contents(
			"http://www.geoplugin.net/json.gp?ip=" . $country_ip));
		
		$user_country = $ipdat->geoplugin_countryName;

		if ($user_country == "United States") {
			$products = $this->db->query("SELECT * FROM products WHERE (country = 'United States' OR country IS NULL) AND title LIKE '%".$this->input->post('keyword')."%'")->result_object();
		} else {
			$sql = "SELECT * FROM products WHERE country = ? AND title LIKE '%".$this->input->post('keyword')."%'";
			$products = $this->db->query($sql, array($user_country))->result_object();
		}
		$return  = '<div id="country-list">';
		foreach ($products as $row) {
		   $return  .= '<a href="'.base_url().'shop/shipping/'.$row->id.'"> '.$row->title.' </a>';
		}
		if(empty($products)){
			$return.= '<div class="no_search_pro">No product found!</div>';
		}
		$return .= '</div>';
		echo $return;
	}

	public function get_all_player(){
		$players = $this->db->query("SELECT * FROM users WHERE id != ".user_info()->id." AND status = 1 AND is_public = 1 AND LOWER(full_name) LIKE '%".strtolower($this->input->post('keyword'))."%' LIMIT 5")->result_object();
		$return  = '<div id="country-list">';
		foreach ($players as $row) {
			$type_p = $row->user_type == 1?"(Player)":"(Coach)";
		   	$return  .= '<a href="'.base_url().'conversation/'.$row->id.'"> '.$row->full_name.' '.$type_p.' </a>';
		}
		if(empty($players)){
			$return.= '<div class="no_search_pro">No player found!</div>';
		}
		$return .= '</div>';
		echo $return;
	}

	public function bookings(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/bookings',$this->data);
		} else {
			$_SESSION['invalid'] = "Please login!";
			redirect(base_url()."login");
		}
	}

	public function payment_history(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/payment_history',$this->data);
		} else {
			$_SESSION['invalid'] = "Please login!";
			redirect(base_url()."login");
		}
	}

	public function wallet(){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->load->view('frontend/wallet',$this->data);
		} else {
			$_SESSION['invalid'] = "Please login!";
			redirect(base_url()."login");
		}
	}

	public function workout_detail($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['id'] = $id;
			$this->load->view('frontend/workout_detail',$this->data);
		} else {
			$_SESSION['invalid'] = "Please login!";
			redirect(base_url()."login");
		}
	}

	public function do_exercise($id){
		if(isset($_SESSION["PXLLOGIN"])){
			$this->data['id'] = $id;
			$this->load->view('frontend/do_exercise',$this->data);
		} else {
			$_SESSION['invalid'] = "Please login!";
			redirect(base_url()."login");
		}
	}

	public function do_submit_appointment(){
		if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 1){
    			$start_time = strtotime(date("H:i:s", strtotime($this->input->post('start_time'))));
    			$end_time = strtotime(date("H:i:s", strtotime($this->input->post('end_time'))));
    			$difference = round(abs($end_time - $start_time) / 3600,2);
    			$total_hours = $difference;

    			// GET TOTAL PRICE
    			$get_coach_details = $this->db->query("SELECT * FROM users WHERE id = ".$this->input->post('coach_id'))->result_object()[0];
    			$time_hour = $get_coach_details->dob;
    			$total_price = round(($time_hour * $total_hours),2);

				$arr = array(
					'uID' => user_info()->id,
					'name' => $this->input->post('full_name'),
					'gender' => $this->input->post('gender'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'date' => $this->input->post('booking_date'),

					'from_time' => $this->input->post('start_time'),
					'to_time' => $this->input->post('end_time'),
					'notes' => nl2br($this->input->post('notes')),

					'coach_name'=> $this->input->post('coach_name'),
					'coach_id'=> $this->input->post('coach_id'),
					'created_at'=> date("Y-m-d H:i:s"),
					'status'=> 0,
					'total_hours' => $total_hours,
					'total_price' => $total_price,
				);
				$this->db->insert('bookings',$arr);

				$message_to_Send = '<b>'.$this->input->post('full_name').'</b>  has sent you a booking request.';
				$message = '
					<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$this->input->post('coach_name').'</strong>,<br /><br/>
						'.$message_to_Send.'

						<br>
						Please visit your dashboard to accept/reject the booking.
						
						<br />	<br />	
						Best Regards,
						<br>
						'.settings()->site_title.'</span>						
				';
				$this->do_send_email(settings()->email, $get_coach_details->email, 'PXL - New Booking Received', $message, 0);

				$this->do_send_notification($get_coach_details->id, $message_to_Send, 2);

				$_SESSION['valid'] = "Your Booking request has been submitted to coach successfully!";
				redirect(base_url()."bookings");
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
	}

	public function reject_booking($id){
		if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 2){

    			$get_booking_details = $this->db->query("SELECT * FROM bookings WHERE id = ".$id)->result_object()[0];
    			$user_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->uID)->result_object()[0];
    			$coach_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->coach_id)->result_object()[0];
				$arr = array(
					'status'=> 2,
				);

				$this->db->where('id', $id);
				$this->db->update('bookings',$arr);

				$message_to_Send = '<b>'.$coach_details->full_name.' (Coach)</b>  has "<b style="color:red">REJECTED</b>" your booking request.';
				$message = '
					<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$user_details->full_name.'</strong>,<br /><br/>
						'.$message_to_Send.'

						<br>
						Please visit your dashboard to creare a new booking.
						
						<br />	<br />	
						Best Regards,
						<br>
						'.settings()->site_title.'</span>						
				';
				$this->do_send_email(settings()->email, $user_details->email, 'PXL - Booking Request Rejected', $message, 0);

				$this->do_send_notification($user_details->id, $message_to_Send, 2);

				$_SESSION['valid'] = "Booking status has been updated successfully!";
				redirect(base_url()."bookings");
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
	}

	public function accept_booking($id){
		if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 2){

    			$get_booking_details = $this->db->query("SELECT * FROM bookings WHERE id = ".$id)->result_object()[0];
    			$user_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->uID)->result_object()[0];
    			$coach_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->coach_id)->result_object()[0];
				$arr = array(
					'status'=> 1,
				);

				$this->db->where('id', $id);
				$this->db->update('bookings',$arr);

				$message_to_Send = '<b>'.$coach_details->full_name.' (Coach)</b>  has "<b style="color:green">ACCEPTED</b>" your booking request.';
				$message = '
					<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$user_details->full_name.'</strong>,<br /><br/>
						'.$message_to_Send.'

						<br>
						Please visit your dashboard and do the payment to process order.
						
						<br />	<br />	
						Best Regards,
						<br>
						'.settings()->site_title.'</span>						
				';
				$this->do_send_email(settings()->email, $user_details->email, 'PXL - Booking Request Accepted', $message, 0);

				$this->do_send_notification($user_details->id, $message_to_Send, 2);

				$_SESSION['valid'] = "Booking status has been updated successfully!";
				redirect(base_url()."bookings");
			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
	}


	public function do_booking_payment($id){
		if(isset($_SESSION["PXLLOGIN"])){
    		if(user_info()->user_type == 1){
    			$get_booking_details = $this->db->query("SELECT * FROM bookings WHERE id = ".$id)->result_object()[0];
    			$user_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->uID)->result_object()[0];
    			$coach_details = $this->db->query("SELECT * FROM users WHERE id = ".$get_booking_details->coach_id)->result_object()[0];

			$name = $_POST['card_name'];
			$nameArr = explode(' ', $name);
			$firstName = !empty($nameArr[0])?$nameArr[0]:'';
			$lastName = !empty($nameArr[1])?$nameArr[1]:'';
			$countryCode = 'US';
			
			// Card details
			$creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
			$creditCardType = 'Visa';
			$expMonth = $_POST['expiry_month'];
			$expYear = $_POST['expiry_year'];
			$cvv = $_POST['cvv'];
			
			// Load PaypalPro library
			$this->load->library('PaypalPro');
			
			// Payment details
			$paypalParams = array(
				'paymentAction' => 'Sale',
				'itemName' => 'Booking With Coach',
				'itemNumber' => $id,
				'amount' => $get_booking_details->total_price,
				'currencyCode' => 'USD',
				'creditCardType' => 'Visa',
				'creditCardNumber' => $creditCardNumber,
				'expMonth' => $expMonth,
				'expYear' => $expYear,
				'cvv' => $cvv,
				'firstName' => $firstName,
				'lastName' => $lastName,
				// 'city' => $city,
				// 'zip'	=> $zipcode,
				'countryCode' => $countryCode,
			);
			$response = $this->paypalpro->paypalCall($paypalParams);
			$paymentStatus = strtoupper($response["ACK"]);
			// echo "<pre>";
			// print_r($response);
			// die;
			if($paymentStatus == "SUCCESS"){
				// Transaction info
				$transactionID = $response['TRANSACTIONID'];
				$paidAmount = $response['AMT'];
				$currency = $response['CURRENCYCODE'];

				// SAVE PAYMENTS
    			$arr = array(
    				'bID' => $id,
					'uID' => $get_booking_details->uID,
					'coach_id' => $get_booking_details->coach_id,
					'amount_paid' => $get_booking_details->total_price,
					'created_at'=> date("Y-m-d H:i:s"),
					'json_response' => $transactionID
				);
				$this->db->insert('payment_history',$arr);
				$payment_book_id = $this->db->insert_id();

				$arr_booking = array(
					'payment_id'=> $payment_book_id,
				);

				$this->db->where('id', $id);
				$this->db->update('bookings',$arr_booking);


				// UPDATE COACH WALLET

				$old_balance = $coach_details->wallet;
				$new_wallet = ($old_balance + $get_booking_details->total_price);

				$coach_arr = array(
					'wallet'=> $new_wallet,
				);
				$this->db->where('id', $coach_details->id);
				$this->db->update('users',$coach_arr);

				$message_to_Send = '<b>'.$user_details->full_name.'</b>  has "<b style="color:green">Made Payment</b>" againts your order #'.$id;
				$message = '
					<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$coach_details->full_name.'</strong>,<br /><br/>
						'.$message_to_Send.'

						
						<br />	<br />	
						Best Regards,
						<br>
						'.settings()->site_title.'</span>						
				';
				$this->do_send_email(settings()->email, $coach_details->email, 'PXL - Booking Payment', $message, 0);

				$this->do_send_notification($coach_details->id, $message_to_Send, 2);
				
				$_SESSION['BOOKING_PAYMENT'] = $payment_book_id;
				$_SESSION['valid'] = "Payment has been made successfully!";
				redirect(base_url()."bookings");
			}else{
				$_SESSION['invalid'] = $response['L_LONGMESSAGE0'];
				redirect($_SERVER['HTTP_REFERER']);
			}

			} else {
				redirect(base_url()."dashboard");
			}
		} else {
			redirect(base_url()."login");
		}
	}


	public function do_submit_withdrawal_request(){
		if(isset($_SESSION["PXLLOGIN"]) && user_info()->user_type == 2){
				$arr = array(
					'amount' => $this->input->post('amount'),
					'uID'=> user_info()->id,
					'created_at'=> date("Y-m-d H:i:s"),
					'status'=> 0,
				);
				$this->db->insert('withdrawal',$arr);



				// UPDATE COACH WALLET

				$old_balance = user_info()->wallet;
				$new_wallet = ($old_balance - $this->input->post('amount'));

				$coach_arr = array(
					'wallet'=> $new_wallet,
				);
				$this->db->where('id', user_info()->id);
				$this->db->update('users',$coach_arr);


				// SEND EMAIL TO ADMIN
				$message_to_Send = '<b>'.user_info()->full_name.'</b>  has submitted a withdrawal request of amount <b>$'.$this->input->post('amount')."</b>";
				$message = '
					<span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>ADMIN</strong>,<br /><br/>
						'.$message_to_Send.'

						
						<br />	<br />	
						Best Regards,
						<br>
						'.settings()->site_title.'</span>						
				';
				$this->do_send_email(settings()->email, settings()->email, 'PXL - Withdrawal Request', $message, 0);

				$_SESSION['valid'] = "Withdrawal request has been submitted successfully to admin!";
				redirect(base_url()."wallet");
		} else {
			redirect(base_url());
		}
	}

	public function do_save_bank_payout(){
		if(isset($_SESSION["PXLLOGIN"]) && user_info()->user_type == 2){

			$bank = $this->db->query("SELECT * FROM user_bank WHERE uID = ".user_info()->id)->result_object()[0];


			$arr = array(
				'uID' => user_info()->id,
				'account_name'=> $this->input->post('account_name'),
				'bank_name'=> $this->input->post('bank_name'),
				'account_number'=> $this->input->post('account_number'),
				'created_at'=> date("Y-m-d H:i:s"),
			);
			if(empty($bank)){
				$this->db->insert('user_bank',$arr);
			} else {
				unset($arr['uID']);
				$this->db->where('uID', user_info()->id);
				$this->db->update('user_bank',$arr);
			}

			$_SESSION['valid'] = "Bank information updated successfully!";
			redirect(base_url()."wallet");

		} else {
			redirect(base_url());
		}
	}

	public function do_make_profile($val){
		if(isset($_SESSION["PXLLOGIN"]) && user_info()->user_type == 1){
			$arr = array(
				'is_public' => $val,
			);
			$this->db->where('id', user_info()->id);
			$this->db->update('users',$arr);
			$_SESSION['valid'] = "Profile Visibility updated successfully!";
			redirect(base_url()."settings");
		} else {
			redirect(base_url());
		}
	}

	// public function check_login($id){
	// 	if(isset($_SESSION['PXLLOGIN'])){
	// 		redirec(base_url()."shop/step/1")
	// 	} else {
	// 		$_SESSION['products_ID'] = $id;
	// 		$_SESSION['invalid'] = "Please login to buy products";
	// 		redirect(base_url()."login");
	// 	}
	// }


	public function do_get_time($id){
		$row = $this->db->query("SELECT * FROM workout_exercises WHERE id = ".$id."")->result_object()[0];
		$time_now = date("F d, Y H:i:s");
		$user_time = round($row->time, 0);
		$endTime = date("F d, Y H:i:s", strtotime('+'.$user_time.' minutes'));
		echo json_encode(array(
		    'start_time' => $time_now,
		    'end_time' => $endTime
		));
	}
    
    public function do_finish_exercise($id, $wid){
    	$user_exercises = $this->db->query("SELECT * FROM user_exercises WHERE exercide_id = ".$id." AND uID = ".user_info()->id)->result_object()[0];
    	$get_execise_details = $this->db->query("SELECT * FROM workout_exercises WHERE id = ".$id)->result_object()[0];
    	$workout_data = $this->db->query("SELECT * FROM workouts WHERE id = ".$get_execise_details->wID)->result_object()[0];
    	if(empty($user_exercises)){
    			
    			$arr = array(
					'uID' => user_info()->id,
					'exercide_id' => $id,
					'category' => $workout_data->category,
					'time' => $get_execise_details->time,
					'finished_at'=> date("Y-m-d H:i:s"),
				);
				$this->db->insert('user_exercises',$arr);
    	} else {
    		$arr = array(
				'finished_at' => date("Y-m-d H:i:s"),
			);
			$this->db->where('uID', user_info()->id);
			$this->db->where('exercide_id', $id);
			$this->db->update('user_exercises',$arr);
    	}

    	$_SESSION['valid'] = "Exercise completed successfully!";
		redirect(base_url()."workout/detail/".$wid);
    }

	private function do_send_email($from, $to, $subject, $message, $show=0){
		$template = '
        <table cellpadding="0" cellspacing="0" style="background: #fff;width: 100%; padding: 10px; border-radius: 10px; float: left;font-family:arial; border:5px solid #F16623" width="100%">
            <tr>
                <td colspan="2" style="text-align: center;">
                    <img src="'.$this->data['assets'].'images/logo.svg" style="width: 80px;">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color:#fff">...</td>
            </tr>
       
            <tr>
                <td style="font-size: 12px; font-family:arial; padding: 30px; padding-bottom: 10px">
                    '.$message.'
                </td>
            </tr>
            ';
            if($show==1){
                $template .= '
                <tr>
                    <td style="font-weight: bold; font-size: 12px; font-family:arial; padding-top: 30px; padding-bottom: 10px; text-align:center;">
                            If you did not request a new password, we ask that you kindly ignore this email
                    </td>
                </tr>
                ';
            }   
            $template .= '
            <tr>
                <td style="font-weight: bold; font-size: 12px; font-family:arial; padding-top: 10px; padding-bottom: 10px; text-align:center">
                        Need Help?
                </td>
            </tr>

            <tr>
                <td style="font-weight: bold; font-size: 12px; padding-top: 0px; padding-bottom: 10px; text-align:center">
                        Please send any feedback or bug reports to <a href="mailto:'.settings()->email.'">'.settings()->email.'</a>
                </td>
            </tr>
        </table>';

		$this->load->library('email');
		$this->email->from($from, settings()->site_title);
		$this->email->to($to); 
		$this->email->subject($subject.' -::- '.settings()->site_title);
		$this->email->message($template);
		$this->email->set_mailtype("html");
		$send = $this->email->send();
	}
}