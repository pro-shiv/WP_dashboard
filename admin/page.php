<?php include('includes/header.php');?>
    <!-- add page button -->
<nav class="navbar navbar-expand-lg bg-body-tertiary navPage">
    <div class="container d-flex  justify-content-end ">
        <div class="addPageDiv">
            <button id="btn_addPage" class="btn btn-primary">Add Page
        </button>
        </div>
        <div class="backTopage">
            <a id="btn_backToPage" href="page.php" class="btn btn-primary">Page
        </a>
        </div>
        
    </div>
</nav>
    <!-- add page button over -->

<div class="container">
  
    <!-- page create detail form-->
    <div class="formContainer">
        <div class="row vh-100 d-flex align-items-center justify-content-center formContainer">
            <div class="page-form-div col-md-6"> 
                <h4>Add page </h4>
                <form method="POST" enctype="multipart/form-data" id="pageForm">
                    <div class="mb-4">
                        <label for="forTitle" class="form-label">Page Title</label>
                        <input type="text" class="form-control" id="forTitle" name="title">
                    </div>
                    <div class="mb-4">
                        <label for="pageContent" class="form-label">Discription</label>
                        <textarea class="form-control" id="pageContent" rows="3" name="pageDiscription"></textarea>
                
                    </div>
                    <div class="mb-4">
                        <label for="pageFeatured" class="form-label">Featured Image</label>
                        <input class="form-control" type="file" id="pageFeatured" name="featureImage">
                    </div>
                    <div class="mb-4 image-holder "></div>

                    <div>
                        <input class="btn btn-primary" type="submit" name="create" value="submit" id="page-submit-btn">
                    </div>
                </form> 
            </div>

        </div>
    </div>
    
    
     <!-- page detail form over-->
      
</div>
    
<div class="container pageListingDiv">
    <div class="row pt-3">
        <div class="table-responsive" id="table_result">
    </div>

</div>

<?php include('includes/footer.php'); ?>
