<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Location
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Location extends ADMIN_Controller {
    /**
     * constructs ADMIN_Controller as parent object
     * loads the neccassary class
     * checks if current user has the rights to access this class
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
	function __construct()
	{
		parent::__construct();
		auth();
        $this->redirect_role(11);
        $this->data['active'] = 'location';
        $this->load->model('location_model','category');
	}
    /**
     * loads the listing page
     * 
     * @return view listing view
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
	public function index()
	{
		$this->data['title'] = 'Workouts';
        $this->data['sub'] = 'location';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
		$this->data['content'] = $this->load->view('backend/workouts/listing',$this->data,true);
		$this->load->view('backend/common/template',$this->data);
	}


    /**
     * loads the add view, then handles the submitted data
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
	public function add (){
        $input = "title";
	    $this->form_validation->set_rules($input,'Workout Name','trim|required');
	    if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Workouts';
            $this->data['sub'] = 'add-location';
            $this->data['content'] = $this->load->view('backend/workouts/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{

	        $dbData['title_1'] = $this->input->post('title');
            $dbData['category'] = $this->input->post('category');
            $dbData['title'] = $this->input->post('title_1');
            $dbData['sub_head'] = $this->input->post('sub_head');
            $dbData['strength'] = $this->input->post('strength');
            $dbData['time'] = $this->input->post('time');
	        $dbData['created_at'] = date('Y-m-d H:i:s');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/workout/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
                $config['file_ext_tolower']        = TRUE;
                $config['encrypt_name']        = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ( $this->upload->do_upload('image'))
                {
                    $logo_data = $this->upload->data();
                    $dbData['image'] = $logo_data['file_name'];
                }
            }
            $this->db->insert('workouts',$dbData);

            $this->session->set_flashdata('msg','New Workout added successfully!');
            redirect('admin/workouts');
        }
    }
    
    /**
     * changes status of given id row in database
     * 
     * @param  integer $id     id of row in database
     * @param  integer $status new status to set
     * @return redirect        redirects to sucess page
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
    public function status($id,$status){
        $category_status = 1;
        if($status == 1){
            $category_status = 0;
        }
        $dbData['status'] = $category_status;
        $this->db->where('id',$id);
        $this->db->update('workouts',$dbData);
        $this->session->set_flashdata('msg','workout status updated successfully!');
        redirect('admin/workouts');
    }

    /**
     * loads the add view, then handles the submitted data
     * 
     * @param integer $id id of row in database
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
    public function edit($id){
    
        $result = $this->db->query("SELECT * FROM workouts WHERE id = ".$id)->result_object()[0];
        $this->data["the_id"] = $id;
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $this->data['data'] = $result;
        $input = "title";
        $this->form_validation->set_rules($input,'Title','trim|required');
        $this->form_validation->set_message('required','This field is required.');
        $this->form_validation->set_message('alpha_numeric_spaces','Only alphabet and numbers are allowed.');
        
        if($this->form_validation->run() === false){
            $this->data['title'] = 'Edit Workout';
            $this->data['content'] = $this->load->view('backend/workouts/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            $dbData['title_1'] = $this->input->post('title');
            $dbData['category'] = $this->input->post('category');
            $dbData['title'] = $this->input->post('title_1');
            $dbData['sub_head'] = $this->input->post('sub_head');
            $dbData['strength'] = $this->input->post('strength');
            $dbData['time'] = $this->input->post('time');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/workout/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
                $config['file_ext_tolower']        = TRUE;
                $config['encrypt_name']        = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ( $this->upload->do_upload('image'))
                {
                    $logo_data = $this->upload->data();
                    $dbData['image'] = $logo_data['file_name'];
                }
            }
                $this->db->where("id",$id);
                $this->db->update('workouts',$dbData);
        
            $this->session->set_flashdata('msg','workout updated successfully!');
            redirect('admin/workouts');

        }
    }

   
    
    /**
     * deletes the row in database and moves it to trash
     * 
     * @param  integer $id id of row to move to trash
     * @return redirect     back to listing page
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
    public function delete($id){
        $this->db->query("DELETE FROM workouts WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'workout deleted successfully!');
        redirect('admin/workouts');
    }
}
