<?php

require_once "../vendor/autoload.php";

var_dump($_POST['checked']);
$checkedboxes = $_POST;

// remove every checked product
foreach($checkedboxes['checked'] as $checkedBox) {
    Product::delete($checkedBox);
}

header("location: ./index.php?error=none");