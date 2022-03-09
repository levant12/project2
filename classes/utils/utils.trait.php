<?php

trait Utils {
    public function redirect (string $text, string $location) {
        echo $text;
        header("location: $location");
        exit();
    }

}