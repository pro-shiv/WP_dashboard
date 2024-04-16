<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    

</head>
<body>

<?php include('../includes/header.php');?>
    <!-- add page button -->
<nav class="navbar navbar-expand-lg bg-body-tertiary nav_btn_category">
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
    $sql="SELECT * From categorydetail where id =$id";
    $result=mysqli_query($conn,$sql)or die("Sql query failed");
    $row = mysqli_fetch_assoc($result);
    
    

}
?>
<div class="container">
  
    <!-- page detail form-->
    <div class="row justify-content-center editPageContainer">
        <div class="page-form-div col-md-6">
            <form method="POST" enctype="multipart/form-data" id="editCategoryForm">
                <div class="mb-3">
                    <label for="forTitle" class="form-label"> Title</label>
                    <input type="text" class="form-control" value="<?php echo $row['title'];?>"id="forTitle" name="title">
                    <input type="hidden" class="form-control" value="<?php echo $row['id'];?>"id="forId" name="id">
                </div>
                <div class="mb-3">
                    <label for="CategoryPageContent" class="form-label">Slug</label>
                    <input type="text" class="form-control" value="<?php echo $row['slug'];?>"id="forSlug" name="slug">
            
                </div>
                <div class="mb-3">
                    <label for="CategoryPageContent" class="form-label">Discription</label>
                    <textarea class="form-control"  rows="3"  name="Discription" id="CategoryPageContent"><?php echo $row['description'];?></textarea>
            
                </div>

                <div>
                    <input class="btn btn-primary" type="submit" name="update" value="update" id="EditCategory-submit-btn">
                </div>
            </form> 
        </div>

    </div>
    
     <!-- page detail form over-->
      
</div>
   

<?php include('../includes/footer.php'); ?>
