<?php
include_once 'models/contact.php';

class DashboardController {
    static function index() {
        if (!isset($_SESSION['nama'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dashboard', ['contacts' => Contact::getAllContacts($_SESSION['nama']['nim'])]);
        }
    }
}