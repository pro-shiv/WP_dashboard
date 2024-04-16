<?php 
include('config/db.php');

//topHeader displayer
function topHeader($menuName){
    global $conn;
    
    $displayMenu_query = "SELECT menuTitle FROM menu WHERE  menuName='$menuName' ORDER BY display_order";
    // var_dump($displayMenu_query);
    // die();
    $displayMenu_run = mysqli_query($conn,$displayMenu_query);
    
    $data = mysqli_num_rows($displayMenu_run);
    $li ="";
    while($row = mysqli_fetch_assoc($displayMenu_run)){
        
        $li.= "<li class='nav-item'><a class='nav-link active' aria-current='page' href='http://localhost/php/phpEcom/index.php'>".$row['menuTitle']."</a></li>";
        
    }
    echo $li;
}
function homeCards(){
    global $conn;
    //fetching all products
    if(!isset($_GET['category']) && !isset($_GET['homeSearchInput'])){
        $product_query = "SELECT * FROM productdetail";
    $product_query_run = mysqli_query($conn,$product_query);
    
    while($row = mysqli_fetch_assoc($product_query_run)){
        echo "<div class='col-md-4 mb-2 g-4 cardWrapper'>
        <div class='card'>
            <img class='product_img' src='/php/phpEcom/admin/uploads/ProductImg/".$row['ImgFileName']."' class='card-img-top' alt='...'>
            <div class='card-body'>
            <h5 class='card-title homeTitle'>".$row['prductTitle']."</h5>
            <p class='card-text'>".$row['productDiscription']."</p>
            <a href='#' class='btn btn-primary cardBtnHome'>Add to Cart</a>
            </div>
        </div>

    </div>";

    }

    }
}
//fetching category based product
function homeCategoryBased(){
    global $conn;
    //fetching all products
    if(isset($_GET['category'])){
        $category_id = $_GET['category'];
        $product_query = "SELECT * FROM productdetail WHERE categoryId = '$category_id'";
        $product_query_run = mysqli_query($conn,$product_query);
        $dataRow = mysqli_num_rows($product_query_run);
        if ($dataRow == 0){
            echo "<h3 class='nostockMessage'>No stock available for this category</h3>";
            
        }
        while($row = mysqli_fetch_assoc($product_query_run)){
            echo "<div class='col-md-4 mb-2 g-4 cardWrapper'>
            <div class='card'>
                <img class='product_img' src='/php/phpEcom/admin/uploads/ProductImg/".$row['ImgFileName']."' class='card-img-top' alt='...'>
                <div class='card-body'>
                <h5 class='card-title homeTitle'>".$row['prductTitle']."</h5>
                <p class='card-text'>".$row['productDiscription']."</p>
                <a href='#' class='btn btn-primary cardBtnHome'>Add to Cart</a>
                </div>
            </div>

        </div>";

        }

        }

}
function rightAside(){
    global $conn;
    
    $displayCategory_query = "SELECT * FROM categorydetail ORDER BY title ASC";
    // var_dump($displayMenu_query);
    // die();
    $displayCategory_query_run = mysqli_query($conn,$displayCategory_query);
    
    
    $li ="";
    while($row = mysqli_fetch_assoc($displayCategory_query_run)){
        $categoryId = $row["id"];
        $li.= "<li class='nav-item'><a id = '$categoryId' class='nav-link active' aria-current='page' href='index.php?category=$categoryId'>".$row['title']."</a></li>";
        
    }
    echo $li;
}

function searchFunction(){
    global $conn;
    //fetching all products
    if(isset($_GET['homeSearchInput'])){
        $searchKey = $_GET['homeSearchInput'];
       

        $search_query = "SELECT * FROM productdetail WHERE prductTitle LIKE '%$searchKey%'";
        $seach_query_run = mysqli_query($conn,$search_query);
        $dataRow = mysqli_num_rows($seach_query_run);


        if ($dataRow == 0){
            echo "<h3 class='nostockMessage'>No result found for this search </h3>";
            
        }
        while($row = mysqli_fetch_assoc($seach_query_run)){
            echo "<div class='col-md-4 mb-2 g-4 cardWrapper'>
            <div class='card'>
                <img class='product_img' src='/php/phpEcom/admin/uploads/ProductImg/".$row['ImgFileName']."' class='card-img-top' alt='...'>
                <div class='card-body'>
                <h5 class='card-title homeTitle'>".$row['prductTitle']."</h5>
                <p class='card-text'>".$row['productDiscription']."</p>
                <a href='#' class='btn btn-primary cardBtnHome'>Add to Cart</a>
                </div>
            </div>

        </div>";

        }

        }

}

?>