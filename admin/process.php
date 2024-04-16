<?php
 include('config/db.php');

 // add page
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='addPage')  {

    $PageTitle         = $_POST["title"];
    $pageDiscription   = $_POST["pageDiscription"];
    $filename =  $_FILES["featureImage"]["name"];
    $tempname =  $_FILES["featureImage"]["tmp_name"];
    $target_file   =  "uploads/pageImg/".$filename;
       
      
       
        if (move_uploaded_file($tempname, $target_file)) {
            $sql = "INSERT INTO ecompage (pageTitle,pageDescription,featuredImagePath,ImgFileName) VALUES ('$PageTitle','$pageDiscription','$tempname','$filename')";
            $check = mysqli_query($conn, $sql);
            if($check){
                echo"inserted";
            }else{
                echo "not inserted";
            }
        } else {
           
            echo "file not uploaded";
        }

       
    
       
    }
// add product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='addProduct'){
    $ProductTitle         = $_POST["title"];
    $productDiscription   = $_POST["productDiscription"];
    $product_cateogryId           = $_POST["categoryId"];
    $filename =  $_FILES["productImage"]["name"];
    $tempname =  $_FILES["productImage"]["tmp_name"];
    $target_file   =  "uploads/productImg/".$filename;
       
    
    
        if (move_uploaded_file($tempname, $target_file)) {
            $sql = "INSERT INTO productdetail (prductTitle,productDiscription,productImg,ImgFileName,categoryId) VALUES ('$ProductTitle','$productDiscription','$tempname','$filename' ,'$product_cateogryId')";
            $check = mysqli_query($conn, $sql);
            if($check){
                echo"Product_inserted";
            }else{
                echo "not inserted";
            }
        } else {
            
            echo "file not uploaded";
        }
}    
//edit page ajax
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='editPage'){
    $PageTitle         = $_POST["title"];
    $pageDiscription   = $_POST["pageDiscription"];
    $id = $_POST["id"];
    $checkImg = $_FILES["featureImage"]["name"];
    
    if(empty($checkImg)){
        $sql = "UPDATE ecompage SET pageTitle ='$PageTitle' , pageDescription='$pageDiscription' where id='$id'";
        $check = mysqli_query($conn, $sql);
        if($check){
            echo"updated";
            
        }else{
            echo "not updated";
        }

    }
    else{
        $filename =  $_FILES["featureImage"]["name"];
        $tempname =  $_FILES["featureImage"]["tmp_name"];
        $target_file   =  "uploads/pageImg/".$filename;
        if (move_uploaded_file($tempname, $target_file)) {
            $sql = "UPDATE ecompage SET pageTitle ='$PageTitle' , pageDescription='$pageDiscription' , featuredImagePath='$tempname' , ImgFileName='$filename' where id='$id'";
            $check = mysqli_query($conn, $sql);
            if($check){
                echo"updated";
                
            }else{
                echo "not updated";
            }
        } else {
            
            echo "file not uploaded";
        }
    }
    
}    
  //product page edit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='editProduct'){
    $ProductTitle          = $_POST["title"];
    $productDiscription    = $_POST["productDiscription"];
    $id = $_POST["id"];
    $product_cateogryId    = $_POST["categoryId"];
    $checkImg = $_FILES["featureImage"]["name"];
   
    if(empty($checkImg)){
        
        
        $sql = "UPDATE productdetail SET prductTitle ='$ProductTitle' , productDiscription='$productDiscription' ,categoryId ='$product_cateogryId' where id='$id'";
        $check = mysqli_query($conn, $sql);
        if($check){
            echo"updated";
        }else{
            echo "not updated";
        }

    }
    else{
        $filename =  $_FILES["featureImage"]["name"];
        $tempname =  $_FILES["featureImage"]["tmp_name"];
        $target_file   =  "uploads/productImg/".$filename;
        if (move_uploaded_file($tempname, $target_file)) {
            $sql = "UPDATE productdetail SET prductTitle ='$ProductTitle' , productDiscription='$productDiscription' , productImg='$tempname' , ImgFileName='$filename' ,categoryId ='$product_cateogryId' where id='$id'";
            $check = mysqli_query($conn, $sql);
            if($check){
                echo"updated";
            }else{
                echo "not updated";
            }
        } else {
            
            echo "file not uploaded";
        }
      
   
    }
    
    
}
   // creating category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='addCategory'){
    $categoryTitle         = $_POST["title"];
    $slug         = $_POST["slug"];
    $categoryDiscription   = $_POST["Discription"];
    
         
    $sql = "INSERT INTO categorydetail (title,slug,description) VALUES ('$categoryTitle','$slug','$categoryDiscription')";
    $check = mysqli_query($conn, $sql);
    if($check){
        echo"category_inserted";
    }else{
        echo "not inserted";
    }
        

}
//category edit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='editCategory'){
    $categoryTitle  = $_POST["title"];
    $slug           = $_POST["slug"];
    $categoryDiscription     = $_POST["Discription"];
    $id = $_POST["id"];
   

   
    $sql = "UPDATE  categorydetail SET title ='$categoryTitle' ,slug='$slug' , description='$categoryDiscription'  where id='$id'";
    $check = mysqli_query($conn, $sql);
    if($check){
        echo"updated";
    }else{
        echo "not updated"; 
    }
   
}

function url(){ 
return $baseURL = "http://localhost/php/phpEcom/admin";
}
// for menu page



function pageTitle(){

    global $conn;
    
    $page_query = "SELECT pageTitle,id from ecompage";
    $page_query_run = mysqli_query($conn,$page_query);
    $data = mysqli_num_rows($page_query_run);
    $output = array();
    
    while($row = mysqli_fetch_assoc($page_query_run)){
    
        echo "<input type='checkbox' data-type='page' class='pages' id=".$row['id']." value=" .$row['pageTitle']." name='pageMenu[]'><label for=".$row['id'].">".$row['pageTitle']."</label> <br>";
       
        
    } 
    
    
    }

    function Category(){

        global $conn;
        
        $page_query = "SELECT title,id from categorydetail";
        $page_query_run = mysqli_query($conn,$page_query);
        $data = mysqli_num_rows($page_query_run);
      
       
        while($row = mysqli_fetch_assoc($page_query_run)){
        
            
            echo "<input type='checkbox'data-type='category' class='catgory' id=".$row['id']." name='categoryMenu[]' value = " .$row['title']. "><label>".$row['title']."</label> <br>";
        }
        
        
        
        }
        //category dropdown
    function selectCategory(){

        global $conn;
       
        $category_query = "SELECT DISTINCT * from categorydetail";
        $category_query_run = mysqli_query($conn, $category_query);
        $data = mysqli_num_rows($category_query_run);
        
        
        while($row = mysqli_fetch_assoc($category_query_run)){
        
            
            echo "<option value=".$row['id'].">".$row['title']."</option>";
        }
        
        
        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='saveMenu') {
          
          
            $Menus = $_POST["listData"];
            $ids = $_POST["ids"];
            $menuType = json_decode($_POST["itemType"]);
            $menuItemId = json_decode($_POST["itemId"]);
            $listData = json_decode($_POST['listData']);
            $display_order = json_decode($_POST['ids']);
            $count = count($display_order);
            $menuName = $_POST['menuName'];
            
           
            for ($i=0;$i<$count;$i++){
                $menus_insert = $listData[$i];
                $itemId = $menuItemId[$i];
                $type = $menuType[$i];
                $display_counter = $i+1;
                $sql = "INSERT INTO menu (menuTitle,display_order,itemId,type,menuName) VALUES (' $menus_insert','$display_counter','$itemId','$type','$menuName')";
                $check = mysqli_query($conn, $sql);
            }
            if($check){
                echo"menu_inserted";
            }else{
                echo "not inserted";
            }      
          
        } 

 // insert menu
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='saveMenuCreation'){
    $menuInput  = $_POST["menuInput"];
    
    $sql = "INSERT INTO menu_table (menus) VALUES ('$menuInput')";
    $check = mysqli_query($conn, $sql);
    if($check){
        echo $menuInput;
    }else{
        echo "not inserted";
    }
    
    die();
 }
// select menu

function selectMenu(){

    global $conn;
    
    $page_query = "SELECT DISTINCT menus from menu_table";
    $page_query_run = mysqli_query($conn,$page_query);
    $data = mysqli_num_rows($page_query_run);
  
   
    while($row = mysqli_fetch_assoc($page_query_run)){
    
        
        echo "<option>".$row['menus']."</option>";
    }
    
    
    
    }
    
  // update menu
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='upDateMenu') {
    
    $Menus = $_POST["listData"];
    // $ids = json_decode($_POST["ids"]);
    $updateCounter = $_POST["updateId"];
   ($displayCount = $_POST["updateDisplayCounter"]);
    $totalLi = $_POST["totalLi"];
   
  
    $menuType = json_decode($_POST["itemType"]);
    $menuItemId = json_decode($_POST["itemId"]);
    $listData = json_decode($_POST['listData']);
   
    $menuName = $_POST['menuName'];
    
    
    for ($i=0;$i<$totalLi;$i++){
        
        $menus_insert = $listData[$i];
        $itemId = $menuItemId[$i];
        //menu id
        $id = $updateCounter[$i];
        
        $type = $menuType[$i];
        $display_counter = $i+1;
        if($id !=""){

            $sql = "UPDATE menu SET  display_order = '$display_counter' WHERE id = '$id'";
            $check = mysqli_query($conn, $sql);

        }else{
            $sql = "INSERT INTO menu (menuTitle,display_order,itemId,type,menuName) VALUES (' $menus_insert','$display_counter','$itemId','$type','$menuName')";
            $check = mysqli_query($conn, $sql);

        }
        
        
       
       
        
    }
    if($check){
        echo"menu_updated";
    }else{
        echo "not updated";
    }
    
   
 
} 

?>