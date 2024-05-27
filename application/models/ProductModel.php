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

    #get Product by ID
    public function getProductByID($id){
        $query = $this->db->select('p.product_id,p.name as product_name,c.name as category_name,c.category_id')
            ->from('product p')
            ->join('category c','p.category_id = c.category_id','left')
            ->where('p.product_id',$id)
            ->get();
        if($query->num_rows() > 0){
            #return data
            return $query->row_array(); #first array result or first row
        }
        return 2;#error
    }

    #update Product
    public function updateProduct($data,$id){
        $update = $this->db->where('product_id',$id)
        ->update('product',$data);          
        
        if($update){
            #success
            return 1;
        }
        return 2; #error
    }
}