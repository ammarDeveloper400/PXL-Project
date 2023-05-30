<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Location
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Sports extends ADMIN_Controller {
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
        $this->redirect_role(155);
        $this->data['active'] = 'sports';
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

		$this->data['title'] = 'Sports';
        $this->data['sub'] = 'sports';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
        $this->data['promocode'] = $this->db->query("SELECT * FROM sports ORDER BY title ASC")->result_object();
		$this->data['content'] = $this->load->view('backend/sports/listing',$this->data,true);
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
            $this->data['title'] = 'Add New Sport';
            $this->data['sub'] = 'add-sport';
            $this->data['content'] = $this->load->view('backend/sports/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
	        $dbData['title'] = $this->input->post("title");
            $this->db->insert('sports',$dbData);
            $def_key = $this->db->insert_id();
            $this->session->set_flashdata('msg','New Sports added successfully!');
            redirect('admin/sports');
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
        $result = $this->db->query("SELECT * FROM sports WHERE id = ".$id)->result_object()[0];
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
        $this->db->update('sports',$dbData);
        $this->session->set_flashdata('msg','Sports status updated successfully!');
        redirect('admin/sports');
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
        $result = $this->db->query("SELECT * FROM sports WHERE id = ".$id)->result_object()[0];
        $this->data["the_id"] = $id;
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $this->data['data'] = $result;

        $input = "title";
        $this->form_validation->set_rules($input,'Title','trim|required');

        if($this->form_validation->run() === false){
            $this->data['title'] = 'Edit Sports';
            $this->data['sub'] = 'add-sport';
            $this->data['content'] = $this->load->view('backend/sports/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
            $dbData['title'] = $this->input->post("title");
            $this->db->where("id",$id);
            $this->db->update('sports',$dbData);
            $this->session->set_flashdata('msg','Sports updated successfully!');
            redirect('admin/sports');
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
        $this->db->query("DELETE FROM sports WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Sports deleted successfully!');
        redirect('admin/sports');
    }
}
