<?php

class productFactory {
    public static function makeFor($type) {
        switch ($type){
            case 'dvd':{
                $product = new DVD();
                $product->setSize($_POST ['dvdSize']);
                return $product;
            }
            case 'book':{
                $product = new Book();
                $product->setWeight($_POST ['bookWeight']);
                return $product;
            }
            case 'furniture': {
                $product = new Furniture();
                $product->setHeight($_POST ['furnH']);
                $product->setWidth($_POST['furnW']);
                $product->setLength($_POST['furnL']);
                return $product;
            }
        }
    }
}