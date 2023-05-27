<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends ADMIN_Controller {

	function __construct()
	{
		parent::__construct();
		auth();
        $this->redirect_role(1);
        
        $this->data['active'] = 'product';
        $this->load->model('products_model','product');
	}

	public function index()
	{

		$this->data['title'] = 'Products';
        $this->data['sub'] = 'products';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/products_listing';
        $this->data['products'] = $this->product->get_all_products();
		$this->data['content'] = $this->load->view('backend/products/listing',$this->data,true);
		$this->load->view('backend/common/template',$this->data);

	}
    public function trash()
    {

        $this->data['title'] = 'Trash products';
        $this->data['sub'] = 'trash';
        $this->data['js'] = 'listing';
        $this->data['jsfile'] = 'js/products_listing';
        $this->data['products'] = $this->product->get_all_trash_products();
        $this->data['content'] = $this->load->view('backend/products/trash',$this->data,true);
        $this->load->view('backend/common/template',$this->data);

    }
    public function restore($id){

        $dbData['deleted_by'] = $this->session->userdata('admin_id');
        $dbData['is_deleted'] = 0;
        $this->db->where('id',$id);
        $this->db->update('products', $dbData);
        $this->session->set_flashdata('msg', 'product restored successfully!');
        redirect('admin/trash-products');
    }

	public function add (){
        $input = $dlang->slug."title";
	    $this->form_validation->set_rules($input,'Title','trim|required');
        $this->form_validation->set_message('required','This field is required.');
        $this->form_validation->set_message('alpha_numeric_spaces','Only alphabet and numbers are allowed.');
	    if($this->form_validation->run() === false){
            $this->data['title'] = 'Add New product';
            $this->data['sub'] = 'add-product';
            $this->data['jsfile'] = 'js/add_product';
            $this->data['content'] = $this->load->view('backend/products/add',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{
           
            $dbData['title'] = $this->input->post('title');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['status'] = 1;
            $dbData['price'] = ($this->input->post('price'));
            $dbData['created_at'] = date('Y-m-d H:i:s');
            $dbData['is_test'] = $this->input->post('type');
            $dbData['country'] = $this->input->post('country');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/products/';
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

            $this->db->insert('products',$dbData);

            $this->session->set_flashdata('msg','New product added successfully!');
            redirect('admin/products');
        }
    }

    public function rand_chars() {
        $result = '';
        $chars = array('1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        $len = count($chars) - 1;
        for ($x = 0; $x < 30; $x++) {
            $r = rand(0, $len);
            $result .= $chars[$r];
        }
        return $result;
    }
    
    public function valid_excel_url($url) {

        $result = false;

        if (empty($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;

    }

	public function import (){
        if ($_FILES) {
            if(!empty($_FILES['excel_sheet']['name'])){
                $config['upload_path']          = './resources/uploads/img/';
                $config['allowed_types']        = 'xlsx';
                $config['file_ext_tolower']        = TRUE;
                $config['encrypt_name']        = TRUE;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('excel_sheet'))
                {
                    $logo_data = $this->upload->data();
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
                    $reader->setReadDataOnly(TRUE);
                    $spreadsheet = $reader->load("resources/uploads/img/" .  $logo_data['file_name']);
                    
                    $worksheet = $spreadsheet->getActiveSheet();
                    // Get the highest row and column numbers referenced in the worksheet
                    $highestRow = $worksheet->getHighestRow(); // e.g. 10
                    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
                    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
                    for ($row = 1; $row <= $highestRow; ++$row) {

                        $excel_title = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $excel_url = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $excel_desc = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $excel_price = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                        if(!empty($excel_title) && $this->valid_excel_url($excel_url)) {
                            if ($this->check_product_where_title($excel_title)) {
                                if (fopen($excel_url, 'r')) {
                                    $rand_name = $this->rand_chars();
                                    if (file_put_contents('resources/uploads/products/' . $rand_name . '.png', fopen($excel_url, 'r'))) {
                                        $dbData['image'] = $rand_name . '.png';
                                        $dbData['title'] = $excel_title;
                                        $dbData['description'] = $excel_desc;
                                        $dbData['status'] = 1;
                                        $dbData['price'] = $excel_price;
                                        $dbData['created_at'] = date('Y-m-d H:i:s');
                                        $dbData['is_test'] = 1;
                                        $this->db->insert('products',$dbData);
                                    }
                                }
                            }
                        }
                    }
                    redirect('admin/products');
                } else {
                    redirect('admin/import-products');
                }
            } else {
                $this->data['title'] = 'Import products';
                $this->data['sub'] = 'import-products';
                $this->data['content'] = $this->load->view('backend/products/import',$this->data,true);
                $this->load->view('backend/common/template',$this->data);
            }
        } else {
            $this->data['title'] = 'Import products';
            $this->data['sub'] = 'import-products';
            $this->data['content'] = $this->load->view('backend/products/import',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }
    }

    public function check_product_where_title($title){

	    $result = $this->product->get_product_where_title($title);
	    if(!empty($title)) {
            if ($result->num_rows() > 0) {
                return false;
            } else {
                return true;
            }
        }else{
            return false;
        }
    }

    public function check_product($title){

	    $result = $this->product->get_product_by_title($title);
	    if(!empty($title)) {
            if ($result->num_rows() > 0) {
                $this->form_validation->set_message('check_product', 'This product already exist.');
                return false;
            } else {
                return true;
            }
        }else{
            $this->form_validation->set_message('check_product', 'This field is required.');
            return false;
        }
    }
    public function details($product=0)
    {
        $this->data['title'] = 'Product Details';
        $this->data['sub'] = 'details';
        $this->data['product'] = $this->product->get_product_by_id($product);
        if(empty($this->data['product']))
        {
            $this->session->set_flashdata('msg','No product found matching your selection');
            redirect(base_url()."products");
            exit();
        }

        $this->data['content'] = $this->load->view('backend/products/details',$this->data,true);
        $this->load->view('backend/common/template',$this->data);
    }


    public function status($id,$status){
        
        $result = $this->product->get_product_by_id($id);
        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }
        $product_status = 1;
        if($status == 1){
            $product_status = 0;
        }

        $dbData['status'] = $product_status;

        $this->db->where('id',$id);
        $this->db->update('products',$dbData);
        $this->session->set_flashdata('msg','product status updated successfully!');
        redirect('admin/products');
        
    }

    public function edit($id){

        $result = $this->product->get_product_by_id($id);
        $this->data["the_id"] = $id;
        $the_id = $id;
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
            $this->data['title'] = 'Edit product';
            $this->data['jsfile'] = 'js/add_product';
            $this->data['content'] = $this->load->view('backend/products/edit',$this->data,true);
            $this->load->view('backend/common/template',$this->data);
        }else{

            $dbData['title'] = $this->input->post('title');
            $dbData['description'] = nl2br($this->input->post('description'));
            $dbData['price'] = ($this->input->post('price'));
            $dbData['is_test'] = $this->input->post('type');
            $dbData['country'] = $this->input->post('country');

            if(!empty($_FILES['image']['name'])){
                $config['upload_path']          = './resources/uploads/products/';
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
            $this->db->update('products',$dbData);

            
            $this->session->set_flashdata('msg', 'product updated successfully!');
            redirect('admin/products');

        }
    }

    public function check_product_edit($title,$id){

        $result = $this->product->get_product_by_title($title);
        if(!empty($title)) {
            if ($result->num_rows() > 0) {
                $result = $result->row();
                if($result->id == $id){
                    return true;
                }else{
                    $this->form_validation->set_message('check_product_edit', 'This product already exist.');
                    return false;
                }
            } else {
                return true;
            }
        }else{
            $this->form_validation->set_message('check_product_edit', 'This field is required.');
            return false;
        }
    }

    public function delete($id){
        $result = $this->product->get_product_by_id($id);

        if(!$result){
            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');
        }

        $this->db->query("DELETE FROM products WHERE id = ".$id);

        $this->session->set_flashdata('msg', 'product deleted successfully!');
        redirect('admin/products');
    }

    public function delete_image($id){
        $result = $this->product->get_product_image_by_id($id);

        if(!$result){

            $this->session->set_flashdata('err','Invalid request.');
            redirect('admin/404_page');

        }
        $dbData['deleted_by'] = $this->session->userdata('admin_id');
        $dbData['is_deleted'] = 1;
        $this->db->where('id',$id);
        $this->db->update('products', $dbData);
        $this->session->set_flashdata('msg', 'product deleted successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }
   
}
