<?php
class Perdoruesi {
    private $db;
    private $tabela = "perdoruesit";

    public function __construct($db) {
        $this->db = $db;
    }

    // Metoda për Login
    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->tabela . " WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Këtu përdorim 'password' sepse ashtu e ke në foto
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['emri'] = $user['emri'];
            $_SESSION['roli'] = $user['roli']; 
            return $user;
        }
        return false;
    }

    // Metoda për Regjistrim
    public function regjistro($emri, $email, $password) {
        try {
            // Ndryshuam 'fjalekalimi' në 'password' që të përputhet me databazën tënde
            $sql = "INSERT INTO " . $this->tabela . " (emri, email, password, roli) VALUES (?, ?, ?, 'perdorues')";
            $stmt = $this->db->prepare($sql);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            return $stmt->execute([$emri, $email, $hashed_password]);
        } catch (PDOException $e) {
            return false; 
        }
    }

    // Merr user sipas ID
    public function lexoUserSipasId($id) {

        $query = "SELECT * FROM " . $this->tabela . " WHERE id = ?";

        $stmt = $this->db->prepare($query);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update user
    public function updateUser($id, $emri, $email, $roli) {

        $query = "UPDATE " . $this->tabela . "
                  SET emri = ?, email = ?, roli = ?
                  WHERE id = ?";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([$emri, $email, $roli, $id]);
    }
} // Kjo kllapë mbyll klasën Perdoruesi
?>