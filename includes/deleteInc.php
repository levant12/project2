<?php

require_once "../vendor/autoload.php";

// get checked boxes id-s from index.js
$checkedBoxes = $_POST;
$query = new DVD();
//switch ($type){
//    case ProductTypeEnum::DVD:{
//        $query = new DVD();
//        break;
//    }
//    case ProductTypeEnum::BOOK:{
//        $query = new Book();
//        break;
//    }
//    case ProductTypeEnum::FURNITURE: {
//        $query = new Furniture();
//        break;
//    }
//}

// remove every checked product
foreach($checkedBoxes['checked'] as $checkedBox) {
    $query->delete($checkedBox);
}

header("location: ./index.php?error=none");