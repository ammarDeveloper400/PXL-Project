<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Exercise
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Exercise extends ADMIN_Controller {
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
        $this->data['active'] = 'exercise';
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
	public function index($id)
	{
		$this->data['title'] = 'Workouts Exercises';
        $this->data['sub'] = 'location';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
        $this->data['id'] = $id;
		$this->data['content'] = $this->load->view('backend/exercise/listing',$this->data,true);
		$this->load->view('backend/common/template',$this->data);
	}


    /**
     * loads the add view, then handles the submitted data
     * 
     * @since 1.0
     * @author DeDevelopers
     * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
     */
	public function add ($wid){
        $this->data['wid'] = $wid;
        $input = "title";
	    $this->form_validation->set_rules($input,'Workout Name','trim|required');
	    if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Exercise';
            $this->data['sub'] = 'add-location';
            $this->data['content'] = $this->load->view('backend/exercise/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            $dbData['wID'] = $wid;
	        $dbData['title'] = $this->input->post('title');
            $dbData['intensity'] = $this->input->post('intensity');
            $dbData['calories'] = $this->input->post('calories');
            $dbData['equipments'] = $this->input->post('equipments');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['technique_description'] = nl2br($this->input->post('technique_description'));
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

            if(!empty($_FILES['video']['name'])){
                $config2['upload_path']          = './resources/uploads/workout/';
                $config2['allowed_types']        = 'mp4|MP4|flv|FLV|mov|MOV';
                $config2['file_ext_tolower']        = TRUE;
                $config2['encrypt_name']        = TRUE;
                $config2['remove_spaces']        = TRUE;
                $this->load->library('upload', $config2, 'video_upload');
                if ( $this->video_upload->do_upload('video'))
                {
                    $logo_data = $this->video_upload->data();
                    $dbData['video'] = $logo_data['file_name'];
                } 
                // else {
                //     $error = array('error' => $this->video_upload->display_errors());
                // }
            }

            $this->db->insert('workout_exercises',$dbData);

            $this->session->set_flashdata('msg','New Exercise added successfully!');
            redirect('admin/workout/exercise/'.$wid);
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
        $this->db->update('workout_exercises',$dbData);
        $this->session->set_flashdata('msg','Exercise status updated successfully!');
        redirect($_SERVER['HTTP_REFERER']);
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
    public function edit($id,$wid){
    
        $result = $this->db->query("SELECT * FROM workout_exercises WHERE id = ".$id)->result_object()[0];
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
            $this->data['title'] = 'Edit Exercise';
            $this->data['content'] = $this->load->view('backend/exercise/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            $dbData['title'] = $this->input->post('title');
            $dbData['intensity'] = $this->input->post('intensity');
            $dbData['calories'] = $this->input->post('calories');
            $dbData['equipments'] = $this->input->post('equipments');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['technique_description'] = nl2br($this->input->post('technique_description'));
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

            if(!empty($_FILES['video']['name'])){
                $config2['upload_path']          = './resources/uploads/workout/';
                $config2['allowed_types']        = 'mp4|MP4|flv|FLV|mov|MOV';
                $config2['file_ext_tolower']        = TRUE;
                $config2['encrypt_name']        = TRUE;
                $config2['remove_spaces']        = TRUE;
                $this->load->library('upload', $config2, 'video_upload');
                if ( $this->video_upload->do_upload('video'))
                {
                    $logo_data = $this->video_upload->data();
                    $dbData['video'] = $logo_data['file_name'];
                } 
                // else {
                //     $error = array('error' => $this->video_upload->display_errors());
                // }
            }

            $this->db->where("id",$id);
            $this->db->update('workout_exercises',$dbData);
        
            $this->session->set_flashdata('msg','Exercise updated successfully!');
            redirect('admin/workout/exercise/'.$wid);

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
        $this->db->query("DELETE FROM workout_exercises WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Exercise deleted successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
