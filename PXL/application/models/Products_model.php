<?php

class Products_model extends CI_Model{
	
	public function get_all_products($field='id',$order = 'DESC')
	{
		
		$this->db->select("products.*");
		$this->db->order_by("products.id","DESC");
		$this->db->from("products");
		$result = $this->db->get();

        return $result;
	}

	public function get_all_trash_products($field='id',$order = 'DESC')
	{
		if(is_vendor()){
	        $result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 1
				AND lparent  = 0
				AND vendor_id = '.vendor_id().'
				ORDER BY '.$field.' '.$order.'
				'
	        );
    	}
        else{
        	$result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 1
				AND lparent  = 0
				ORDER BY '.$field.' '.$order.'
				'
	        );
        }

        return $result;
	}

    public function get_all_active_products($field='id',$order = 'DESC')
    {
    	if(is_vendor()){
	        $result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 0
				AND status  = 1
				AND lparent  = 0
				AND vendor_id = '.vendor_id().'
				ORDER BY '.$field.' '.$order.'
				'
	        );
	    }else{
	    	$result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 0
				AND status  = 1
				AND lparent  = 0
				ORDER BY '.$field.' '.$order.'
				'
	        );
	    }

        return $result;
    }
	public function get_product_where_title($title)
	{
		$sql = 'SELECT * FROM products WHERE title = ?';
		$result = $this->db->query($sql, array($title));

        return $result;
	}

	public function get_product_by_title($title)
	{
		if(is_vendor()){
	        $result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 0
				AND lparent  = 0
				AND vendor_id = '.vendor_id().'
				AND title = "'.$title.'"
				'
	        );
	    }else{
	    	$result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 0
				AND lparent  = 0
				AND title = "'.$title.'"
				'
	        );
	    }

        return $result;
	}

	public function get_product_by_id($id){
		if(is_vendor()){

	        $result = $this->db->query('
				SELECT *
				FROM products
				WHERE is_deleted  = 0
				AND id = '.$id.'
				AND vendor_id = '.vendor_id().'
				AND lparent  = 0
				ORDER BY id DESC
				'
	        );
	    }else{
	    	 $result = $this->db->query('
				SELECT *
				FROM products
				WHERE 
				id = '.$id.'
				ORDER BY id DESC
				'
	        );
	    }

        if($result->num_rows()>0){

            return $result->row();
        }else{

            return false;
        }
    }
    public function get_product_by_lang($lang_id,$id){
    	
	    	$this->db->group_start();
	    	$this->db->where("lang_id",$lang_id);
	    	$this->db->group_end();
	    	$this->db->group_start();
	    	$this->db->where("id",$id);
	    	$this->db->or_where("lparent",$id);
	    	$this->db->group_end();
	    	return $this->db->get('products')->result_object()[0];
	    
    }
}


?>
