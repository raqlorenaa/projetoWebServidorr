<?php
namespace App\Core;

class BaseView {
    public function render($viewFile, $data = []) {
        extract($data);
        include "src/View/{$viewFile}";
    }
}
