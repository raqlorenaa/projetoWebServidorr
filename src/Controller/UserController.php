<?php 
namespace App\Controller;

use App\Model\User;
use App\Core\View;

class UserController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userModel = new User();
            $result = $userModel->createUser($_POST['nome'], $_POST['email'], $_POST['username'], $_POST['password']);
            if ($result) {
                View::redirect('login');
            } else {
                View::render('RegisterView.php', ['error' => 'Erro ao cadastrar usuário.']);
            }
        } else {
            View::render('RegisterView.php');
        }
    }
}
?>