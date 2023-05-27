<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Categories
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Categories extends ADMIN_Controller {
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
        $this->redirect_role(12);
        $this->data['active'] = 'category';
        $this->load->model('categories_model','category');
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
		$this->data['title'] = 'Categories';
        $this->data['sub'] = 'categories';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
        $this->data['categories'] = $this->db->query("SELECT * FROM events_affiliates WHERE type = 2 ORDER BY id DESC");
        $this->data['events'] = $this->db->query("SELECT * FROM events_affiliates WHERE type = 1 ORDER BY id DESC");
		$this->data['content'] = $this->load->view('backend/categories/listing',$this->data,true);
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
	    $this->form_validation->set_rules($input,'Title','trim|required');
       
	    if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Affiliate';
            $this->data['sub'] = 'add-category';
            $this->data['content'] = $this->load->view('backend/categories/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            

            $dbData['title'] = $this->input->post('title');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['status'] = 1;
            $dbData['link_external'] = ($this->input->post('link'));
            $dbData['created_at'] = date('Y-m-d H:i:s');
            $dbData['type'] = $this->input->post('type');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/events/';
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

            $this->db->insert('events_affiliates',$dbData);

            $this->session->set_flashdata('msg','New Affiliate added successfully!');
            redirect('admin/affiliates');
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
        $result = $this->category->get_category_by_id($id);
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $category_status = 1;
        if($status == 1){
            $category_status = 0;
        }
        $dbData['status'] = $category_status;
        $this->db->where('id',$id);
        $this->db->update('events_affiliates',$dbData);
        $this->session->set_flashdata('msg','Affiliate status updated successfully!');
        redirect('admin/affiliates');
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
        $result = $this->db->query("SELECT * FROM events_affiliates WHERE id = ".$id)->result_object()[0];
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
            $this->data['title'] = 'Edit Affiliate';
            $this->data['content'] = $this->load->view('backend/categories/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
            $dbData['title'] = $this->input->post('title');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['link_external'] = ($this->input->post('link'));
            $dbData['type'] = $this->input->post('type');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/events/';
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

            $row_id = $this->input->post('row_id');
            $this->db->where("id",$row_id);
            $this->db->update('events_affiliates',$dbData);

            $this->session->set_flashdata('msg','Affiliate updated successfully!');
            redirect('admin/affiliates');

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
        $result = $this->category->get_category_by_id($id);

        if(!$result){

            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');

        }

        $this->db->query("DELETE FROM events_affiliates WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Affiliate deleted successfully!');
        redirect('admin/affiliates');
    }
   
}
