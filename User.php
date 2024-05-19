<?php
include_once('Database.php');

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    public function register($username, $email, $password) {
        if (!$this->isEmailUnique($email)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, admin, password) VALUES (?, ?, 0, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password']) && $user['admin'] == 1) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['admin'] == 1;
            return header('Location: table.html');

        } elseif($user && password_verify($password, $user['password']) && $user['admin'] == 0) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['admin'] == 0;
            return header('Location: index.html');
        }
        
        //return false;
    }

    public function isAdmin($userId) {
        $stmt = $this->db->prepare("SELECT admin FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn() == 1;
    }

    public function valide_Username($username) {
        return preg_match('/^[a-zA-Z0-9]{3,}$/', $username);
    }

    public function valide_Email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function valide_Password($password) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password);
    }

    private function isEmailUnique($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() == 0;
    }
}
?> 