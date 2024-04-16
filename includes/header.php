<?php 
session_start();
 $baseURL = "http://localhost/php/phpEcom";
 include('./functions.php');
 $menuHeaderData = $_SESSION['user_id'];
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom</title>
    <link id="pagestyle" href="<?php echo $baseURL; ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- custom css  -->
    <link id="pagestyle" href="<?php echo $baseURL; ?>/assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="headerContainer">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary navContainer">
                <div class="container">
                    <a class="navbar-brand" href="#">Ecom</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <?php topHeader($menuHeaderData)?>
                        <!-- <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> -->
                    </ul>
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    </div>
                </div>
            </nav>
        </header>

    </div>