<?php

require_once "../vendor/autoload.php";

var_dump($_POST['checked']);

// remove every checked product
foreach($_POST['checked'] as $checkedBox) {
    Product::delete($checkedBox);
}

header("location: ./index.php?error=none");