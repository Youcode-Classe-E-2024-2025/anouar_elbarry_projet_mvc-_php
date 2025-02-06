<?php

namespace App\Models;
use App\Core\Security;
use App\Core\Model;

class Article extends Model {
    private $db;
    private Security $security;

    public function __construct() {
        $this->db = \App\Core\Database::getInstance()->getConnection();
        $this->security = new Security($this->db);
    }

    public function getLatestArticles($limit = 5) {
        $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit";
        $params = [
            'limit' => $limit
        ];
        $stmt = $this->security->secureQuery($this->db, $query, $params);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }

    public function getAllArticles() {
        $query = "SELECT * FROM articles ORDER BY created_at DESC";
        $stmt = $this->security->secureQuery($this->db, $query, []);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }
    public function getById($articleId) {
        $query = "SELECT 
                  a.*,
                  u.username
                  FROM articles a 
                  INNER JOIN users u ON a.user_id = u.id
                  WHERE a.id = :articleId";
        $stmt = $this->security->secureQuery($this->db, $query, [
            "articleId" => $articleId
        ]);
        $result = $stmt ? $stmt->fetch(\PDO::FETCH_ASSOC) : null;
        return $result;
    }
}