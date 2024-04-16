
<?php include('includes/header.php');?>
<?php include('process.php');?>
    <!-- add page button -->
<nav class="navbar navbar-expand-lg bg-body-tertiary navProduct">
    <div class="container d-flex justify-content-end">
        <button id="btn_addPage" class="btn btn-primary">Add Product
        </button>
    </div>
</nav>
    <!-- add page button over -->

<div class="container">
  
    <!-- page create detail form-->
    <div class="formContainer">
    <div class="row vh-100 d-flex align-items-center justify-content-center formContainer">
        <div class="page-form-div col-md-6">
            <h4>Add Product</h4>
            <form method="POST" enctype="multipart/form-data" id="productPageForm">
                <div class="mb-4">
                    <label for="forTitle" class="form-label">Product Title</label>
                    <input type="text" class="form-control" id="forTitle" name="title">
                </div>
                <div class="mb-4">
                    <label for="productCategory" class="form-label">Category</label>
                    <!-- <textarea class="form-control" id="productCategory" rows="3" name="productCategory"></textarea> -->
                    <select class="form-select" name = "categoryId" aria-label="productCategory">
                        <?php selectCategory() ?>
                    </select>
                    
            
                </div>
                <div class="mb-4">
                    <label for="productContent" class="form-label">Product Discription</label>
                    <textarea class="form-control" id="productContent" rows="3" name="productDiscription"></textarea>
            
                </div>
                <div class="mb-4">
                    <label for="productImg" class="form-label">Product Image</label>
                    <input class="form-control" type="file" id="productImg" name="productImage">
                </div>
                <div class="mb-4 image-holder " ></div>

                <div>
                    <input class="btn btn-primary" type="submit" name="create" value="submit" id="product-submit-btn">
                </div>
            </form> 
        </div>

    </div>

    </div>
    
    
     <!-- page detail form over-->
      
</div>
    
<div class="container productListingDiv">
    <div class="row pt-3">
        <div class="table-responsive" id="table_result_product">
    </div>

</div>

<?php include('includes/footer.php'); ?>
 
