<?php

require_once "../vendor/autoload.php";

// remove every checked product
foreach($_POST['checked'] as $checkedBox) {
    Product::delete($checkedBox);
}

header("location: ./index.php?error=none");