<?php $baseURL = "http://localhost/php/phpEcom/admin";  ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo$baseURL ?>" target="_blank">
       
        <span class="ms-1 font-weight-bold text-white">Ecom</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item page_container">
          <a class="nav-link text-white page_btn " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Page</span>
          </a>
          <div class="dropdown-content">
            
            <a class="nav-link text-white " href="<?php echo$baseURL ?>/page.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Add page</span>
            </a>
            <a class="nav-link text-white " href="<?php echo$baseURL ?>/Category.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">categories</span>
            </a>
            <a style ="display:none;" href="#">Link 2</a>
            <a style ="display:none;" href="#">Link 3</a>
          </div>
        </li>
        <li class="nav-item page_container">
          <a class="nav-link text-white " href="<?php echo$baseURL ?>/product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
          <div class="dropdown-content">
            <a class="nav-link text-white " href="<?php echo$baseURL ?>/product.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">table_view</i>
                </div>
                <span class="nav-link-text ms-1">Add product</span>
            </a>
            <a class="nav-link text-white " href="<?php echo$baseURL ?>/Category.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">categories</span>
            </a>
            <a style ="display:none;" href="#">Link 2</a>
            <a style ="display:none;" href="#">Link 3</a>
          </div>
          
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="<?php echo$baseURL ?>/menus.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Menus</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> -->
  </aside>