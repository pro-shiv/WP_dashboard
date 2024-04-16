<?php include('includes/header.php');?>

<div class="bodyContainer">
    <div class = "container-fluid px-0">
        <div class = "bannerDiv">
        <img class = "homeBanner-1"src="assets/images/homeBanner.jpg" alt="homeBanner">
        </div>

    </div>
    <div class = "container">
        <div class = "row afterBannerRowWrapper">
            <div class = "col-md-9">
                <div class = "row ">
                    <?php 
                        homeCards();
                        homeCategoryBased();
                        searchFunction();
                    ?>
                </div>

            </div>
            <div class = "col-md-3 aside">
                <div class = "rightAsideWrapper">
                    <form class = "d-flex asideSearch" action="" role = "search">
                        <input class  = "form-control me-2" type = "search" placeholder = "Search" name="homeSearchInput" aria-label="Search">
                        <!-- <button class = "btn btn-outline-success" type = "submit">Search</button> -->
                        <input type="submit" value="submit" name="homeSearchBtn" class="btn btn-outline-light searchBtn">
                    </form>
                    <div class = "row text-left asideCategoryHeading">
                        <h3>Categories</h3>
                    </div>
                    <div class  = "asideCategoryWrapper">
                        <ul class = "liRightAside">
                        <?php rightAside()?>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
          
</div>
 
<?php include('includes/footer.php'); ?>
