<?php

require_once "../vendor/autoload.php";

// get checked boxes id-s from index.js
$checkedBoxes = $_POST;
$query = new DVD();

// remove every checked product
foreach($checkedBoxes['checked'] as $checkedBox) {
    $query->delete($checkedBox);
}

header("location: ./index.php?error=none");