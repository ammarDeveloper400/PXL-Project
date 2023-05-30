<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * handles the Categories
 * 
 * @since 1.0
 * @author DeDevelopers
 * @copyright Copyright (c) 2019, DeDevelopers, https://dedevelopers.com
 */
class Withdrawals extends ADMIN_Controller {
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
        $this->redirect_role(1);
        $this->data['active'] = 'withdrawals';
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
		$this->data['title'] = 'Withdrawals Requests';
        $this->data['sub'] = 'withdrawals';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/categories_listing';
		$this->data['content'] = $this->load->view('backend/withdrawals/listing',$this->data,true);
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

        $category_status = 1;
        if($status == 1){
            $category_status = 0;
        }
        $dbData['status'] = $category_status;

        $this->db->where('id',$id);
        $this->db->update('withdrawal',$dbData);
        $this->session->set_flashdata('msg','Withdrawal status updated successfully!');
        redirect('admin/withdrawals');
    }

     

}
