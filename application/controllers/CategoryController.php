<?php 


class CategoryController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $page = "category";
        
        if(!file_exists(APPPATH.'views/'.$page.'.php')){
         show_404();

        }      

        $data['categories'] = $this->CategoryModel->getAllCategories();


        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('/'.$page,$data);
        $this->load->view('layout/footer'); 
    }

    public function addCategory(){
        #validations
        $this->form_validation->set_rules('name','Category Name','required');
        
        if($this->form_validation->run() == FALSE){
            $this->response->status('validation_err',400);
            return;
        }

        $data = $this->input->post();

        #add Method
        $insert = $this->CategoryModel->addCategory($data);
        if($insert == 1){
            return $this->response->status('success',200);
        }else{
            return $this->response->status('error',500);
        }
    }

    public function editCategory(){
        #category id
        $id = $this->input->get('id');

        if($id === null || $id === ''){
            $this->response->status('id_null',400);
            return;
        }

        #get Method
        $data = $this->CategoryModel->getCategoryByID($id);
        if($data == 2){
            $this->response->status('error',500);
        }

        echo json_encode($data);
    }

    public function updateCategory(){
        #validations
        $this->form_validation->set_rules('category_name','Category Name','required');

          
        if($this->form_validation->run() == FALSE){
            $this->response->status('validation_err',400);
            return;
        }

        #category ID
        $id = $this->input->post('category_id');

        if($id === null || $id === ''){
            $this->response->status('id_null',400);
            return;
        }

        #data
        $data = $this->input->post();
        $dataToUpdate = array(
            'name' => $data['category_name']
        );

        #update Method
        $update = $this->CategoryModel->updateCategory($dataToUpdate,$id);
        if($update == 1){
            #success
            return $this->response->status('success',200);
        }else{
            #error
            return $this->response->status('error',500);
        }

    }
}