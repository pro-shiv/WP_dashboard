
<?php include('../includes/header.php');
include('../process.php');
?>

    <!-- add page button -->
<nav class="navbar navbar-expand-lg bg-body-tertiary nav_btn_product">
    <div class="container d-flex justify-content-end">
        <a href="../index.php"id="btn_editPage" class="btn btn-primary">back to home
        </a>
    </div>
</nav>
    <!-- add page button over -->
<?php 
if(isset($_GET["id"])){
    $id =$_GET["id"];
    include("../config/db.php");
    $sql="SELECT * From productdetail where id =$id";   
    $result=mysqli_query($conn,$sql)or die("Sql query failed");
    $row = mysqli_fetch_assoc($result);

}
?>
<div class="container">
  
    <!-- page detail form-->
    <div class="row justify-content-center editPageContainer">
        <div class="page-form-div col-md-6">
            <form method="POST" enctype="multipart/form-data" id="editProductForm">
                <div class="mb-3">
                    <label for="forTitle" class="form-label">Product Title</label>
                    <input type="text" class="form-control" value="<?php echo $row['prductTitle'];?>"id="forTitle" name="title">
                    <input type="hidden" type="text"  class="form-control" value="<?php echo $row['id'];?>"id="forId" name="id">
                </div>
                <div class="mb-4">
                    <label for="productCategory" class="form-label">Category</label>
                    <!-- <textarea class="form-control" id="productCategory" rows="3" name="productCategory"></textarea> -->
                    <select class="form-select" name = "categoryId" aria-label="productCategory">
                        <?php selectCategory() ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productPageContent" class="form-label">Discription</label>
                    <textarea class="form-control"  rows="3"  name="productDiscription" id="productPageContent"><?php echo $row['productDiscription'];?></textarea>
            
                </div>
                <div class="mb-3">
                    <label for="productFeatured" class="form-label">Featured Image</label>
                    <div class="pb-2"><img  src="../uploads/productImg/<?php echo $row['ImgFileName'];?>" width="100px" height="100px"></div>
                    <input type="hidden"class="form-control" type="file" value="<?php echo $row['ImgFileName'];?>" id="productFeatured" name="featureImage_oldPic">
                    <input type="file" class="form-control" name="featureImage" id="productImg">
                </div>
                <div class="mb-3 image-holder " >

        
                </div>

                <div>
                    <input class="btn btn-primary" type="submit" name="update" value="update" id="Editproduct-submit-btn">
                </div>
            </form> 
        </div>

    </div>
    
     <!-- page detail form over-->
      
</div>
   

<?php include('../includes/footer.php'); ?>
