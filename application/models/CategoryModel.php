<?php

class CategoryModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }

    public function getAllCategories(){
        $query = $this->db->get('category');

        if($query->num_rows() > 0){
            return $query->result();
        }
        return array();
    }

    public function addCategory($data){
        $query = $this->db->insert('category',$data);
        if($query){
            return 1;
        }
        return 2;
    }

    public function getCategoryByID($id){
        $query = $this->db->where('category_id',$id)
            ->get('category');
        if($query->num_rows() > 0){
            return $query->row_array();
        }
        return 2;
    }

    public function updateCategory($data,$id){
        $update = $this->db->where('category_id',$id)
            ->update('category',$data);
        if($update){
            return 1;
        }
        return 2;
    }
}