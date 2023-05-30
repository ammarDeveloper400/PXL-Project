<?php

class Orders_model extends CI_Model{
	
	public function get_all_orders($field='id',$order = 'DESC')
	{
        $result = $this->db->query('
			SELECT *
			FROM orders
			ORDER BY '.$field.' '.$order.'
			'
        );

        if($_GET["start_date"]!="")
        {
        	if($_GET["s_status"]!="")
        	$this->db->where("status",$_GET["s_status"]);
        	if($_GET["customer_id"]!="")
        		$this->db->where("user_id",$_GET["customer_id"]);
        	$this->db->where("DATE(created_at) >=",$_GET["start_date"]);
        	$this->db->where("DATE(created_at) <=",$_GET["to_date"]);
        	$this->db->order_by($field,$order);
        	$result = $this->db->get("orders");

        }

        if($_GET["user_id"]!="")
        {
        	$result = $this->db->query('
				SELECT *
				FROM orders
				WHERE uID = '.$_GET["user_id"].'
				ORDER BY '.$field.' '.$order.'
				'
	        );
        }

        if($_GET["provider_id"]!="")
        {
        	$result = $this->db->query('
				SELECT *
				FROM orders
				WHERE is_deleted  = 0
				AND (order_offer = 2 OR order_offer = 3)
				AND vendor_id = '.$_GET["provider_id"].'
				ORDER BY '.$field.' '.$order.'
				'
	        );
        }

        return $result;

	}

	public function get_all_orders_offers($field='id',$order = 'DESC')
	{
        $result = $this->db->query('
			SELECT *
			FROM orders
			WHERE is_deleted  = 0
			AND order_offer = 1
			ORDER BY '.$field.' '.$order.'
			'
        );


        if($_GET["start_date"]!="")
        {
        	$this->db->where("is_deleted",0);
        	$this->db->where("order_offer",1);
        	if($_GET["s_status"]!="")
        	$this->db->where("status",$_GET["s_status"]);
        	if($_GET["customer_id"]!="")
        		$this->db->where("user_id",$_GET["customer_id"]);
        	$this->db->where("DATE(created_at) >=",$_GET["start_date"]);
        	$this->db->where("DATE(created_at) <=",$_GET["to_date"]);
        	$this->db->order_by($field,$order);
        	$result = $this->db->get("orders");

        }

        if($_GET["user_id"]!="")
        {
        	$result = $this->db->query('
				SELECT *
				FROM orders
				WHERE is_deleted  = 0
				AND order_offer = 1
				AND user_id = '.$_GET["user_id"].'
				ORDER BY '.$field.' '.$order.'
				'
	        );
        }

        if($_GET["provider_id"]!="")
        {
        	$result = $this->db->query('
				SELECT *
				FROM orders
				WHERE is_deleted  = 0
				AND order_offer = 1
				AND vendor_id = '.$_GET["provider_id"].'
				ORDER BY '.$field.' '.$order.'
				'
	        );
        }

        return $result;

	}

	public function get_all_trash_orders($field='id',$order = 'DESC')
	{
        $result = $this->db->query('
			SELECT *
			FROM orders
			WHERE is_deleted  = 1
			ORDER BY '.$field.' '.$order.'
			'
        );

        return $result;

	}

    public function get_all_active_orders($field='id',$order = 'DESC')
    {
        $result = $this->db->query('
			SELECT *
			FROM orders
			WHERE is_deleted  = 0
			AND status  = 1
			ORDER BY '.$field.' '.$order.'
			'
        );

        return $result;

    }
	public function get_order_by_title($title)
	{
        $result = $this->db->query('
			SELECT *
			FROM orders
			WHERE is_deleted  = 0
			AND title = "'.$title.'"
			'
        );

        return $result;

	}

	public function get_order_by_id($id){

        $result = $this->db->query('
			SELECT *
			FROM orders
			WHERE id = '.$id.'
			ORDER BY id DESC
			'
        );

        if($result->num_rows()>0){

            return $result->row();
        }else{

            return false;

        }
    }


	

	
}


?>
