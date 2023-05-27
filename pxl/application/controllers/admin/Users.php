<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends ADMIN_Controller {

    function __construct()
    {
        parent::__construct();
        auth();
        $this->redirect_role(13);
        $this->data['active'] = 'users';
        $this->load->model('users_model','user');
    }

    public function index()
    {
        $this->data['title'] = 'Athletes';
        $this->data['sub'] = 'users';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/users_listing';
        $this->data['users'] = $this->user->get_all_users();
        $this->data['content'] = $this->load->view('backend/users/listing', $this->data,true);
        $this->load->view('backend/common/template',$this->data);
    }

    public function details($id)
    {
        $this->data['title'] = 'Athletes Details';
        $this->data['sub'] = 'users';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/users_listing';
        $this->data['id'] = $id;
        $this->data['content'] = $this->load->view('backend/users/details', $this->data,true);
        $this->load->view('backend/common/template',$this->data);
    }

    public function add (){
        $this->form_validation->set_rules('fname','Full Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email');
        $this->form_validation->set_message('required','This field is required.');
        $this->form_validation->set_message('alpha_numeric_spaces','Only alphabet and numbers are allowed.');
        if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Athlete';
            $this->data['sub'] = 'add-user';
            $this->data['jsfile'] = 'js/add_user';
            $this->data['content'] = $this->load->view('backend/users/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{

            $rendomcode = $this->generateRandomStringAdmin(25);
            $url_click = base_url()."do/verify/email/".($rendomcode);

            $dbData['full_name'] = $this->input->post('fname');
            $dbData['email'] = $this->input->post('email');
            $dbData['status'] = 0;
            $dbData['password'] = md5($this->input->post('password'));
            $dbData['created_at'] = date('Y-m-d H:i:s');
            $dbData['email_verify'] = 0;
            $dbData['session_id'] = $rendomcode;
            $this->db->insert('users',$dbData);

            $message = '
                <span style="font-family: arial;font-size:12px;line-height:18px;">DEAR <strong>'.$this->input->post('fname').'</strong>,<br /><br/>

                    Admin has created your account!<br><br>
                    Please click on below link to verify your email address to login.
                    
                    <br><br>
                    <a href='.$url_click.'>'.$url_click.'</a>
                    <br />  <br />  
                    Best Regards,
                    <br>
                    '.settings()->site_title.'</span>                       
            ';
            $this->do_send_email_admin_template(settings()->email, $this->input->post('email'), 'PXL - Verify Account', $message, 0);

            $this->session->set_flashdata('msg','New Athlet added successfully!');
            redirect('admin/users');

        }
    }

    public function check_email($email){

        $result = $this->user->get_user_by_email($email);
        if(!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('check_email', 'Please enter the valid email address.');
                return false;
            }else{
                if ($result->num_rows() > 0) {
                    $this->form_validation->set_message('check_email', 'This email already exist.');
                    return false;
                } else {
                    return true;
                }
            }
        }else{
            $this->form_validation->set_message('check_email', 'This field is required.');
            return false;
        }
    }


    public function status($id,$status){

        $result = $this->user->get_user_by_id($id);

        if(!$result){

            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');

        }

        $user_status = 1;

        if($status == 1){

            $user_status = 0;

        }

        $dbData['status'] = $user_status;
        $dbData['user_profile'] = 1;
        $dbData['updated_at'] = date('Y-m-d H:i:s');
        $dbData['updated_by'] = $this->session->userdata('admin_id');

        $this->db->where('id',$id);
        $this->db->update('users',$dbData);
        $this->session->set_flashdata('msg','Athlete status updated successfully!');
        redirect('admin/users');
    }



    public function edit($id){

        $result = $this->user->get_user_by_id($id);

        if(!$result){

            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');

        }

        $this->data['data'] = $result;
        $this->form_validation->set_rules('fname','Full Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email_edit['.$id.']');
        $this->form_validation->set_message('required','This field is required.');
        $this->form_validation->set_message('alpha_numeric_spaces','Only alphabet and numbers are allowed.');
        if($this->form_validation->run() === false){
            $this->data['title'] = 'Edit Athlete';
            $this->data['sub'] = 'edit-user';
            $this->data['jsfile'] = 'js/add_user';
            $this->data['content'] = $this->load->view('backend/users/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{

            $dbData['full_name'] = $this->input->post('fname');
            $dbData['email'] = $this->input->post('email');
            $this->db->where('id',$id);
            $this->db->update('users', $dbData);
            $this->session->set_flashdata('msg', 'Athlete updated successfully!');
            redirect('admin/users');

        }
    }

    public function check_email_edit($email,$id){

        $result = $this->user->get_user_by_email($email);
        if(!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('check_email_edit', 'Please enter the valid email address.');
                return false;
            }else{
                if ($result->num_rows() > 0) {
                    $result = $result->row();
                    if($result->id == $id){
                        return true;
                    }else{
                        $this->form_validation->set_message('check_email_edit', 'This email already exist.');
                        return false;
                    }
                } else {
                    return true;
                }
            }

        }else{
            $this->form_validation->set_message('check_email_edit', 'This field is required.');
            return false;
        }
    }


    public function delete($id){
        $result = $this->user->get_user_by_id($id);

        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        
        $this->db->query("DELETE FROM users WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Athlete deleted successfully!');
        redirect('admin/users');
    }
    public function restore($id){
        
        $dbData['deleted_by'] = $this->session->userdata('admin_id');
        $dbData['is_deleted'] = 0;
        $this->db->where('id',$id);
        $this->db->update('users', $dbData);
        $this->session->set_flashdata('msg', 'Athlete restored successfully!');
        redirect('admin/trash-users');
    }
 
    
    public function user_detail($id)
    {       
        $result = $this->user->get_user_by_id($id);

        if(!$result){

            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');

        }
        $this->data['title'] = 'user Detail';
        $this->data['sub'] = 'add-user';
        $this->data['jsfile'] = 'js/user_detail';
        $this->data['user_detail'] = $this->user->get_user_by_id($id);
        $this->data['projects'] = $this->user->get_project_by_id($id);
        $this->data['attachments'] = (object)array();
        foreach($this->data['projects'] as $project)
        {
            $project_id = $project->id;
        }
        if($project_id)     
        {
            $this->data['attachments'] = $this->user->get_attachments_by_id($project_id);
        }
        $this->data['content'] = $this->load->view('backend/users/detail',$this->data,true);
        $this->load->view('backend/common/template',$this->data);
        
        
    }
    
}
