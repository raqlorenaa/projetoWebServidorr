<?php
namespace App\Controller;

use App\Core\BaseView;

class HomeController {
    public function index() {
        $view = new BaseView();
        $view->render('homeview.php');
    }
}
