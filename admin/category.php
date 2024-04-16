
<?php include('includes/header.php');?>
    <!-- add page button -->
<nav class="navbar navbar-expand-lg bg-body-tertiary navCategory">
    <div class="container d-flex justify-content-end">
        <button id="btn_addcategory" class="btn btn-primary">Add Category
        </button>
    </div>
</nav>
    <!-- add page button over -->

<div class="container">
  
    <!-- page create detail form-->
    <div class="formContainer">
        <div class="row vh-100 d-flex align-items-center justify-content-center">
            
            <div class="page-form-div col-md-6">
            <h4>Add Category</h4>
                <form method="POST" enctype="multipart/form-data" id="categoryPageForm">
                    <div class="mb-4">
                        <label for="forTitle" class="form-label">Category Title</label>
                        <input type="text" class="form-control" id="forTitle" name="title">
                    </div>
                    <div class="mb-4">
                        <label for="categorySlug" class="form-label">Slug</label>
                        <input class="form-control" id="categorySlug" rows="3" name="slug"></input>
                
                    </div>
                    <div class="mb-4">
                        <label for="categorySlug" class="form-label">Discription</label>
                        <textarea class="form-control" id="categorySlug" rows="3" name="Discription"></textarea>
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" name="create" value="submit" id="category-submit-btn">
                    </div>
                </form> 
            </div>

        </div>

    </div>
    
    
     <!-- page detail form over-->
      
</div>
    
<div class="container categoryListingDiv">
    <div class="row pt-3">
        <div class="table-responsive" id="table_result_category">
    </div>

</div>

<?php include('includes/footer.php'); ?>
