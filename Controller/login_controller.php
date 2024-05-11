<?php

namespace App\Controller;

use App\Model\Login;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

$username_error = ""; // Defina as variáveis com valores padrão vazios
$password_error = "";
$login_error = "";

// Se houver erros, atribua as mensagens de erro às variáveis correspondentes
if(isset($_SESSION['username_error'])) {
    $username_error = $_SESSION['username_error'];
    unset($_SESSION['username_error']);
}

if(isset($_SESSION['password_error'])) {
    $password_error = $_SESSION['password_error'];
    unset($_SESSION['password_error']);
}

if(isset($_SESSION['login_error'])) {
    $login_error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}


class LoginController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function processLogin($username, $password) {
        $this->model->processLogin($username, $password);
    }

    public function logout() {
        $this->model->logout();
    }
}

$loginController = new LoginController(new Login($mysqli));

if(isset($_POST['logout'])) {
    $loginController->logout();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginController->processLogin($username, $password);
}
?>
