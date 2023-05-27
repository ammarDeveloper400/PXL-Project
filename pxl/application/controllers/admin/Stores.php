<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the stores
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Stores extends ADMIN_Controller {
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
        $this->redirect_role(19);
        $this->data['active'] = 'store';
        $this->load->model('stores_model','store');
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

        $this->data['title'] = 'Coaches';
        $this->data['sub'] = 'stores';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/users_listing';
        $this->data['stores'] = $this->db->query("SELECT * FROM users WHERE user_type = 2");
        $this->data['content'] = $this->load->view('backend/stores/listing',$this->data,true);
        $this->load->view('backend/common/template',$this->data);

    }
   
    public function details($id)
    {
        $this->data['title'] = 'Coach Details';
        $this->data['sub'] = 'stores';
        $this->data['js'] = 'listing';
        $this->data['uid'] = $id;
        $this->data['content'] = $this->load->view('backend/stores/details', $this->data,true);
        $this->load->view('backend/common/template',$this->data);
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

        // $result = $this->db-;

        // if(!$result){
        //     $this->session->set_flashdata('err','Invalid request.');
        //     redirect('admin/404_page');
        // }

        $store_status = 1;

        if($status == 1){

            $store_status = 0;

        }

        $dbData['status'] = $store_status;
        $this->db->where('id',$id);
        $this->db->update('users',$dbData);

        $this->session->set_flashdata('msg','Coach status updated successfully!');
        redirect($_SERVER['HTTP_REFERER']);
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
        $result = $this->db->query("SELECT * FROM users WHERE user_type = 2 AND id = ".$id)->result_object()[0];
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $this->db->query("DELETE FROM users WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Coach deleted successfully!');
        redirect('admin/coaches');
    }

    public function add (){
        $input = "title";
        $this->form_validation->set_rules($input,'Coach Name','trim|required');
        if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Coach';
            $this->data['sub'] = 'stores';
            $this->data['content'] = $this->load->view('backend/stores/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{

                $dbData = array();
                $dbData['full_name'] = $this->input->post("title");
                $dbData['email'] = $this->input->post("email");
                $dbData['password'] = md5($this->input->post("password"));
                $dbData['created_at'] = date("Y-m-d");
                $dbData['status'] = 1;
                $dbData['user_type'] = 2;
                $this->db->insert('users',$dbData);
                $store_id = $this->db->insert_id();


            $this->session->set_flashdata('msg','New Coach added successfully!');
            redirect('admin/coaches');

        }
    }

    public function edit($id){

        $result = $this->db->query("SELECT * FROM users WHERE user_type = 2 AND id = ".$id)->result_object()[0];
        $this->data["the_id"] = $id;
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }

        $this->data['data'] = $result;

        $input = "title";
        $this->form_validation->set_rules($input,'Coach Name','trim|required');
        
        if($this->form_validation->run() === false){
            $this->data['title'] = 'Edit Coach';
            $this->data['meta'] = $this->load->view('backend/common/meta_data',$this->data,true);
            $this->data['content'] = $this->load->view('backend/stores/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
                $dbData=array();
                $row_id = $this->input->post("row_id");
                $dbData['full_name'] = $this->input->post("title");
                $dbData['email'] = ($this->input->post("email"));

                $this->db->where("id",$row_id);
                $this->db->update('users',$dbData);

            $this->session->set_flashdata('msg','Coach updated successfully!');
            redirect('admin/coaches');

        }
    }
}
