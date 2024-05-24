
<?php
include_once 'model/user.php';
include_once 'config/main.php';
include_once 'config/static.php';

class AuthController {
    static function login() {
        view('login');
    }

    static function register() {
        view('register');
    }

    static function sessionLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'username' => $post['username'], 
            'password' => $post['password']
        ]);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: '.BASEURL.'dashboard');
        }
        else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }

    static function newRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::register([
            'username' => $post['username'], 
            'email' => $post['email'],
            'password' => $post['password'],
        ]);

        if ($user) {
            header('Location: '.BASEURL.'login');
        }
        else {
            header('Location: '.BASEURL.'register?failed=true');
        }
    }

