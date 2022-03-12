<?php
require_once "./includes/displayInc.php";
require_once "./vendor/autoload.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assests/css/index.css">
    <title>Product List</title>
</head>
<body>
    <header>
        <a href="#"><h1>Product List</h1></a>
        <a href="./pages/add.php" id="linkAdd"><button>ADD</button></a>
        <button id="delete-product-btn" class="delete-checkbox" onclick="deleteButtonClickEvent()">MASS DELETE</button>
    </header>
    <hr>
    <!-- Desktop version -->
    <section id="desktop" class="products slider">
        <!-- function will display 10 products in each slide and 5 in each row -->
        <?php 
        echo $products;
        echoProducts(10,5,$products,"slidesD"); ?>
    </section>
    <!-- arrows to use slider fot desktop -->
    <a class="prev" id="desk" onclick="plusSlide(-1,'slidesD')">&#10094;</a>
    <a class="next" id="desk" onclick="plusSlide(1,'slidesD')">&#10095;</a>
    <!-- Tablet version -->
    <section id="tablet" class="products slider">
        <!-- function will display 6 products in each slide and 3 in each row -->
        <?php echoProducts(6,3,$products,"slidesT"); ?>
    </section>
    <!-- arrows to use slider fot tablet -->
    <a class="prev" id="tab" onclick="plusSlide(-1,'slidesT')">&#10094;</a>
    <a class="next" id="tab" onclick="plusSlide(1,'slidesT')">&#10095;</a>
    <!-- Mobile version -->
    <section id="mobile" class="products slider">
        <!-- function will display 2 products in each slide and 1 in each row -->
        <?php echoProducts(2,1,$products,"slidesM"); ?>
    </section>
    <!-- arrows to use slider fot mobile -->
    <a class="prev" id="mob" onclick="plusSlide(-1,'slidesM')">&#10094;</a>
    <a class="next" id="mob" onclick="plusSlide(1,'slidesM')">&#10095;</a>
    <footer>
        <hr>
        Scandiweb Test Assigment
    </footer>
    <!-- JQuery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JS link -->
    <script type="text/javascript" src="./assests/js/index.js"></script>
</body>
</html>