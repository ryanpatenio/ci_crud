<?php


class ProductModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function getAllProduct(){
        $query = $this->db->get('product');

        if($query->num_rows() > 0){
            return $query->result();
        }
        return array(); #return empty array
    }

    public function getAllCategories(){
        $query = $this->db->select("*")
            ->from('category')
            ->get();

        if($query->num_rows() > 0){
            return $query->result();
        }
        return array(); #return empty array

    }

    #ADD PRODUCT
    public function addProduct($data){
        #default Query Builder 2 param first `table name` 2nd `data to update in the table`
        $insert = $this->db->insert('product',$data);

        if($insert){
            #success
            return 1; #code for success
        }
        return 2; #error code
    }
}