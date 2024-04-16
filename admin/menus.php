<?php 
session_start();
include('includes/header.php');
include('process.php');
?>


<div>
    <div class="container">
        <div class="row ">
            <div class="col-4 menusDiv">
            <h3>Menus</h3>
                <div class="accordion" id="accordionSidebar">
                  
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_One">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_One" aria-expanded="true" aria-controls="collapse_One">
                            Pages
                        </button>
                        </h2>
                        <div id="collapse_One" class="accordion-collapse collapse" aria-labelledby="heading_One" data-bs-parent="#accordionSidebar">
                            <div class="accordion-body">
                               <form>
                                
                                    <?php pageTitle(); ?>
                                    <button type="button" class="btn btn-primary" id="submitBtnPage">Add menu</button>
                              
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_Two">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_Two" aria-expanded="false" aria-controls="collapse_Two">
                           Category
                        </button>
                        </h2>
                        <div id="collapse_Two" class="accordion-collapse collapse" aria-labelledby="heading_Two" data-bs-parent="#accordionSidebar">
                        <div class="accordion-body">
                           
                                <?php Category(); ?>
                                
                                <button type="button" class="btn btn-primary" id="submitBtnCategory">Add Menu</button>
                            </form>
                        </div>
                        </div>
                    </div>

                   
                    
                </div>
                
                
            </div>
            <div class="col-8 menuStructure">
                <h3>Menu structure</h3>
                <div class="row">
                    <div class="col-6">
                        <h6>Select Menu</h6>
                        <form class="d-flex">
                            <select class="form-select m-0 w-50 selectMenu" id="menuSelection">
                            
                                <?php selectMenu() ?>
                                
                            </select>
                            <span class="ms-2"><input class="btn btn-primary mt-1" type="submit"  value="select" id="selectMenu-btn"></span>
                        </form>
                        
                    </div>
                    <div class="col-6">
                        <h6 class="pt-1">Create Menu:</h6>
                        <span>
                            <form  class="d-flex" method="POST" id = "menuCreationForm">
                            <input class="form-control pb-2 menuName w-50" type= "text" name="menuName" id="menuNameId">  
                            <input class="btn btn-primary mt-1 ms-2" type="submit" name="create" value="create" id="createMenu-btn">
                            </form> 
                            
                        </span> 
                    </div>
                    
                    
                </div>
            

                <div class="row">
                    
                    <form method="POST">

                        <div id="MenuCreationDiv">
                            <ul  id="menu">
                            </ul>  
                        
                        </div>
                        <!-- <div>
                            <h4>Menu Settings</h4>
                            <input  type="checkbox" value = "" id="forFrontendView" ><label for="forFrontendView">Top Navigation</label>
                            

                        </div> -->
                        
                        <button class="btn btn-primary" id="saveListBtn">Save Menu</button> 
                        <!-- <button class="btn btn-primary updateBtn" id="UpdateListBtn">Update Menu</button>  -->

                    </form>
                        <!-- selection part -->
                </div>        
                        
            </div>
            

        </div>
    </div>
</div>
<?php include('includes/footer.php');?>