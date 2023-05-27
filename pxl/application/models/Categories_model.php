<?php

class Categories_model extends CI_Model{
	
	public function get_all_categories($field='id',$order = 'DESC')
	{
        $result = $this->db->query('
			SELECT *
			FROM events_affiliates
			ORDER BY '.$field.' '.$order.'
			'
        );

        return $result;

	}

	public function get_all_trash_categories($field='id',$order = 'DESC')
	{
        $result = $this->db->query('
			SELECT *
			FROM events_affiliates
			
			ORDER BY '.$field.' '.$order.'
			'
        );

        return $result;

	}

    public function get_all_active_categories($field='id',$order = 'DESC')
    {
        $result = $this->db->query('
			SELECT *
			FROM events_affiliates
			WHERE is_deleted  = 0
			AND lparent  = 0
			AND status  = 1
			ORDER BY '.$field.' '.$order.'
			'
        );

        return $result;

    }
	public function get_category_by_title($title)
	{
        $result = $this->db->query('
			SELECT *
			FROM events_affiliates
			WHERE is_deleted  = 0
			AND lparent  = 0
			AND title = "'.$title.'"
			'
        );

        return $result;

	}

	public function get_category_by_id($id){

        $result = $this->db->query('
			SELECT *
			FROM events_affiliates
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
