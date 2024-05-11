<?php
namespace App\Model;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';



class Login {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function processLogin($username, $password) {
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);

        $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
        $result = $this->mysqli->query($sql);

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['tipo'] = $row['tipo'];

            header("Location: ../view/index_view.php");
            exit();
        } else {
            session_start();
            $_SESSION['login_error'] = "Usuário ou senha incorretos!";
            header("Location: ../view/view.login.php");
            exit();
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index_view.php");
        exit();
    }

    
}
?>
