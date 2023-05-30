<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Location
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Promo extends ADMIN_Controller {
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
        $this->redirect_role(150);
        $this->data['active'] = 'promo';
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

		$this->data['title'] = 'Promo Code';
        $this->data['sub'] = 'promo';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
        $this->data['promocode'] = $this->db->query("SELECT * FROM coupons ORDER BY id DESC")->result_object();
		$this->data['content'] = $this->load->view('backend/promo/listing',$this->data,true);
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
	    $this->form_validation->set_rules($input,'Coupon Code','trim|required');

        $input = $dlang->slug."[image]";
	    $this->form_validation->set_rules($input,'Image','callback_image_not_required['.$input.',20,20]');
	    if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New Coupon Code';
            $this->data['sub'] = 'add-promo';
            $this->data['content'] = $this->load->view('backend/promo/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
	        $dbData['coupoun'] = $this->input->post("title");
            $dbData['disocunt'] = $this->input->post("discount");
            $this->db->insert('coupons',$dbData);
            $def_key = $this->db->insert_id();
            $this->session->set_flashdata('msg','New coupon Code added successfully!');
            redirect('admin/promo');
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
        $result = $this->db->query("SELECT * FROM coupons WHERE id = ".$id)->result_object()[0];
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
        $this->db->update('coupons',$dbData);
        $this->session->set_flashdata('msg','coupon code status updated successfully!');
        redirect('admin/promo');
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
        $result = $this->db->query("SELECT * FROM coupons WHERE id = ".$id)->result_object()[0];
        $this->data["the_id"] = $id;
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $this->data['data'] = $result;

        $input = "title";
        $this->form_validation->set_rules($input,'Coupon Code','trim|required');

        if($this->form_validation->run() === false){
            $this->data['title'] = 'Edit Coupon Code';
            $this->data['content'] = $this->load->view('backend/promo/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
            
            $dbData['coupoun'] = $this->input->post("title");
            $dbData['disocunt'] = $this->input->post("discount");
            $this->db->where("id",$id);
            $this->db->update('coupons',$dbData);
 
            $this->session->set_flashdata('msg','Coupon Code updated successfully!');
            redirect('admin/promo');

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
        $this->db->query("DELETE FROM coupons WHERE id = ".$id);
        $this->session->set_flashdata('msg', 'Coupon Code deleted successfully!');
        redirect('admin/promo');
    }
}
