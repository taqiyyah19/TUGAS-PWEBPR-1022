<?php

// Auth
Router::url('login', 'get', 'AuthController::login');
// Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
// Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');


// Dashboard
Router::url('dashboard', 'get', 'DashboardController::dashboard');



// Router::url('/', 'get', function () {
//     header('Location: login');
// });