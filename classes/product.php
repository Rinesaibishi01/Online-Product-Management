<?php
class Product {
    private $db;
    private $tabela = "produkte"; 

    public function __construct($db) {
        $this->db = $db;
    }

    // 1. Leximi i produkteve (Për t'i shfaqur te Ballina dhe Dashboard)
    public function lexoProduktet() {
        try {
            $query = "SELECT * FROM " . $this->tabela . " ORDER BY id DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    // 2. Shtimi i produktit (Për add_product.php)
    public function shtoProdukt($emri, $pershkrimi, $cmimi, $foto) {
        try {
            $query = "INSERT INTO " . $this->tabela . " (emri, pershkrimi, cmimi, foto) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$emri, $pershkrimi, $cmimi, $foto]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // 3. Fshirja e produktit
    public function fshijProduktin($id) {
        try {
            $query = "DELETE FROM " . $this->tabela . " WHERE id = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // 4. Marrja e një produkti sipas ID
    public function lexoProduktSipasId($id) {
        try {
            $query = "SELECT * FROM " . $this->tabela . " WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // 5. Përditësimi i produktit (EDIT)
    public function updateProdukt($id, $emri, $pershkrimi, $cmimi, $foto) {
        try {
            $query = "UPDATE " . $this->tabela . " 
                      SET emri = ?, pershkrimi = ?, cmimi = ?, foto = ? 
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$emri, $pershkrimi, $cmimi, $foto, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>