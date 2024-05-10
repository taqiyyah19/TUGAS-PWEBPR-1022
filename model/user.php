<?php
include_once __DIR__ . '../config/conn.php';

class User
{
    static function login($data = [])
    {
        global $conn;
    
        $username = $data['username'];
        $password = $data['password'];
    
        $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) {
                return $result;
            } else {
                return false;
            }
        }
    }
    
    static function register($data = [])
    {
        global $conn;

        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET  username = ?,  email = ?, password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss',  $username, $email, $password);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function getPassword($username)
    {
        global $conn;
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }
}