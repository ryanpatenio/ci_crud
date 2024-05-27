
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>product">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" type="button"><i class="bi bi-plus-circle"> New</i></button>
        </div>


        

          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Product Name</th> 
                          
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
             <?php 
             
             $i = 1;
             foreach ($products as $product) { ?>
               <tr>
                    <td><?=$i;?></td>
                    <td><?= $product->name; ?></td>
                                 
                    <td>
                      <button type="button" id="edit-btn" data-id="<?= $product->product_id; ?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                      <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                    </td>
                </tr>
         <?php $i++;    }
             
             ?>

            
               

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   


    </section>



<!--------------All Modal-------------------->
  

    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="addForm" >
                
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Product Name</label>                  
                      <input type="text" class="form-control" name="product_name" id=""  required>  
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Category</label>                  
                      <select name="category" class="form-control" id="" required>
                       
                        <?php
                        foreach ($categories as $category) { ?>
                           <option value="<?=$category->category_id; ?>"><?=$category->name; ?></option>
                     <?php   }
                        
                        
                        ?>
                      </select>
                    </div>
                  </div>
                  
                </div>                       
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
            </div>
        </form>
          </div>
        </div>
      </div><!-- End ADD Modal-->

      <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="updateForm" >
                
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Product Name</label>                  
                      <input type="text" class="form-control" name="product_name" id="product-name"  required>  
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Category</label>                  
                      <select name="category" class="form-control" id="category" required>
                       
                        <?php
                        foreach ($categories as $category) { ?>
                           <option value="<?=$category->category_id; ?>"><?=$category->name; ?></option>
                     <?php   }
                        
                        
                        ?>
                      </select>
                    </div>
                  </div>
                  
                </div>                       
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
            </div>
        </form>
          </div>
        </div>
      </div><!-- End Edit Modal-->

<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/admin-assets/ajax/product.js"></script>