<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
         
        $page = "product";
        
        if(!file_exists(APPPATH.'views/'.$page.'.php')){
         show_404();

        }
        $data['products'] = $this->ProductModel->getAllProduct(); #data array of products
        $data['categories'] = $this->ProductModel->getAllCategories();


        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('/'.$page,$data);
        $this->load->view('layout/footer');
    }

    public function addProduct(){
        #VALIDATIONS
        #before you can use this form validations you must add it in the config/autoload{libraries}
        $this->form_validation->set_rules('product_name','Product Name','required');
        $this->form_validation->set_rules('category','Category','required');

        if($this->form_validation->run() == FALSE){
            #return error response
            #method response is a customize library that returns json message with 2 parameters first the message and the second is status CODE
            $this->response->status('validation_false',400);
            return;
        }

        #set all the DATA
        $data = $this->input->post();
        $dataToInsert = array(
            'name' => $data['product_name'],#name of the field
            'category_id' => $data['category']

        );

        #call the add product method
        $update = $this->ProductModel->addProduct($dataToInsert);
        if($update == 1){
            #success
            return $this->response->status('success',200);#200 OK CODE || SUCCESS CODE
        }
        return $this->response->status('error',500);
    }

    public function editProduct(){
        #ID
        $id = $this->input->get('id');
        echo $id;
    }

}