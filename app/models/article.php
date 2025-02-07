<?php

namespace App\Models;
use App\Core\Security;
use App\Core\Model;

class Article extends Model {
    private $db;
    private $id;
    private $title;
    private $content;
    private $userId;
    private $status;
    private $image_url;
    private Security $security;

    public function __construct($id = null,$title=null,$content=null,$userId=null,$status=null,$image_url=null) {
        $this->db = \App\Core\Database::getInstance()->getConnection();
        $this->security = new Security($this->db);
        if($id != null){
            $this->id = $id;
        }  
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->status = $status;
        $this->image_url = $image_url;
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
        $query = "SELECT
                  a.*,
                  u.username as author
                  FROM articles a 
                  INNER JOIN users u ON a.user_id = u.id
                  GROUP BY a.id , author
                  ORDER BY a.created_at DESC";
        $stmt = $this->security->secureQuery($this->db, $query, []);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }
    public function totalArticles(){
        $query = "SELECT COUNT(*) as total_articles FROM articles";
        $stmt = $this->security->secureQuery($this->db, $query);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
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

    public function addArticle(){
        $query = "INSERT INTO articles (title, content, user_id, status, image_url) 
                  VALUES (:title, :content, :userId, :status, :image_url)";
        $params = [
            'title' => $this->title,
            'content' => $this->content,
            'userId' => $this->userId,
            'status' => $this->status ?? 'published',
            'image_url' => $this->image_url
        ];

        error_log("Executing SQL query: " . $query);
        error_log("With parameters: " . print_r($params, true));

        $stmt = $this->security->secureQuery($this->db, $query, $params);
        if($stmt) {
            $this->id = $this->db->lastInsertId();
            error_log("Article inserted successfully with ID: " . $this->id);
            return $this->id;
        }
        error_log("Failed to insert article");
        return false;
    }
    public function updateArticle($id, $title, $content, $image_url, $status) {
        $query = "UPDATE articles 
                 SET title = :title, 
                     content = :content, 
                     image_url = :image_url, 
                     status = :status,
                     updated_at = NOW() 
                 WHERE id = :id";
        
        $params = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'image_url' => $image_url,
            'status' => $status
        ];
        
        return $this->security->secureQuery($this->db, $query, $params);
    }
    
    public function archiveArticle($id) {
        $query = "UPDATE articles SET status = 'archived' WHERE id = :id";
        $params = ['id' => $id];
        return $this->security->secureQuery($this->db, $query, $params);
    }
    public function getArticlesByUserId($userId) {
        $query = "SELECT 
                  a.*,
                  u.username
                  FROM articles a 
                  INNER JOIN users u ON a.user_id = u.id
                  WHERE a.user_id = :userId
                  ORDER BY a.created_at DESC";
        $stmt = $this->security->secureQuery($this->db, $query, [
            "userId" => $userId
        ]);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
    }
}