<?php
namespace App\Core;

class Request {
    public function getPath() {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }
}
?>