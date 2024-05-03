<?php

include_once 'model/contact_model.php';

class ContactController {
    static function add() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            view('dash_page/layout', ['url' => 'view/contact_crud_page/add']);
        }
    }

    static function saveAdd() {
        if (!isset($_SESSION['Nama'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
        else {
            $post = array_map('htmlspecialchars', $_POST);
            $contact = Contact::insert([
                'Nama' => $post['Nama'], 
                'Nim' => $_SESSION['user']['Nim'],
                'ProgramStudi' => $post['ProgramStudi'],
                'TahunAngkatan' => $post['TahunAngkatan'],
                'Alamat' => $post['Alamat']
            ]);
            
            if ($contact) {
                header('Location: '.BASEURL.'dashboard/contacts');
            }
            else {
                header('Location: '.BASEURL.'contacts/add?addFailed=true');
            }
        }
    }
}