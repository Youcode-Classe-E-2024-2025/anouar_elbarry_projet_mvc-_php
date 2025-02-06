<?php

namespace App\Models;

class Article {
    private $db;

    public function __construct() {
        $this->db = \App\Core\Database::getInstance()->getConnection();
    }

    public function getLatestArticles($limit = 5) {
        $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}