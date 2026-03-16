<?php
class Product {
    private $db;
    private $tabela = "produkte"; // Emri fiks si në phpMyAdmin

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

    // 3. FSHIRJA E PRODUKTIT (Kjo na duhej!)
    public function fshijProduktin($id) {
        try {
            $query = "DELETE FROM " . $this->tabela . " WHERE id = ?";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // 4. Marrja e një produkti të vetëm (Nëse të duhet për Edit ose Shiko Detajet)
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
}
?>