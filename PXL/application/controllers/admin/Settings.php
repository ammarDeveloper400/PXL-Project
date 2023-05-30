<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends ADMIN_Controller {
	/**
	 * [__construct constructs parent object and authorized user]
	 */
	function __construct()
	{
		parent::__construct();
		auth();
        $this->redirect_role(-1);
	}
	/**
	 * [index performs settings view handling and action submission]
	 * @return [view|redriect] [redirects to settings page after saving settings
	 * , and presents settings view before saving it]
	 */
	public function index()
	{
		
		$this->form_validation->set_rules('title','title','trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('rights','Copy Rights','trim');
		$this->form_validation->set_message('required','This field is required.');
		$this->form_validation->set_message('valid_email','Please enter the valid email addres.');
		$this->form_validation->set_message('valid_url','Please enter the valid URL.');
		$this->data['data'] = settings();
		
		if($this->form_validation->run() === false){

			$this->data['meta'] = $this->load->view('backend/common/meta_data',$this->data,true);
			
			$this->data['title'] = 'Settings';
			$this->data['active'] = 'settings';
			$this->data['content'] = $this->load->view('backend/settings',$this->data,true);
			$this->load->view('backend/common/template',$this->data);
			
		}else{
			
			$dbData['footer_about'] = $this->input->post('footer_about');
			$dbData['footer_about_ar'] = $this->input->post('footer_about_ar');
			$dbData['site_title'] = $this->input->post('title');
			$dbData['site_title_ar'] = $this->input->post('title_ar');
			$dbData['mobile'] = $this->input->post('mobile');
			$dbData['email'] = $this->input->post('email');
			$dbData['copy_right'] = $this->input->post('rights');

			$dbData['paypal_username'] = $this->input->post('paypal_username');
			$dbData['paypal_password'] = $this->input->post('paypal_password');
			$dbData['paypal_signature'] = $this->input->post('paypal_signature');

			
			if(!empty($_FILES['logo']['name'])){
				$config['upload_path']          = './resources/uploads/logo/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG|SVG|svg';
				$config['file_ext_tolower']        = TRUE;
				$config['encrypt_name']        = TRUE;
				$config['remove_spaces']        = TRUE;
				$this->load->library('upload', $config);
				if ( $this->upload->do_upload('logo'))
				{
					$logo_data = $this->upload->data();
					unlink('./resources/uploads/logo/'.$this->data['data']->site_logo);
					$dbData['site_logo'] = $logo_data['file_name'];
				} 
			}

			if(!empty($_FILES['favicon']['name'])){
				$config['upload_path']          = './resources/uploads/favicon/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG|SVG|svg';
				$config['file_ext_tolower']        = TRUE;
				$config['encrypt_name']        = TRUE;
				$config['remove_spaces']        = TRUE;
				$this->load->library('upload', $config);
				if ( $this->upload->do_upload('favicon'))
				{
					$logo_data = $this->upload->data();
					unlink('./resources/uploads/favicon/'.$this->data['data']->site_favicon);
					$dbData['site_favicon'] = $logo_data['file_name'];
				}
			}

			
			$dbData['meta_title'] = $this->input->post('meta_title');
	        $dbData['meta_keywords '] = $this->input->post('meta_keys');
	        $dbData['meta_description'] = $this->input->post('meta_desc');


			$this->db->where('id',1);
			$this->db->update('settings',$dbData);
			$this->session->set_flashdata('msg','Site settings updated successfully!');
			redirect('admin/settings');
		}
	}
}
