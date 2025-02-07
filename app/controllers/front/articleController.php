<?php
namespace App\Controllers\Front;

use App\Models\Article; 
use App\Core\View;

class ArticleController extends View {
    private Article $articleModel;

    public function __construct() {
        parent::__construct();
        $this->articleModel = new Article();
    }

    public function index() {
       $articles = $this->articleModel->getAllArticles();
       $data = ['articles' => $articles];
       echo $this->twig->render('front/article.twig', $data);
    }
    public function show($articleId) {
       $article = $this->articleModel->getById($articleId);
       if (!$article) {
           // Handle case where article is not found
           header("HTTP/1.0 404 Not Found");
           echo $this->twig->render('error/404.twig');
           return;
       }
       $data = ['article' => $article];
       echo $this->twig->render('front/articleDetails.twig', $data);
    }
    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])){
            $title = trim($_POST['title']) ; 
            $content = trim($_POST['content']); 
            $image_url = trim($_POST['image_url']); 
            $status = $_POST['status']; 
            $userId = $_POST['userId'];


            $this->articleModel = new Article(null, $title, $content, $userId, $status, $image_url);
            $articleId = $this->articleModel->addArticle();
            
            if($articleId) {
                header('Location: /articles');
                exit;
            } else {

            }
        }
        // If something went wrong, redirect back to dashboard
        header('Location: /author/dashboard');
        exit;
    }

    public function dashboard() {
        // Get articles for the logged-in user
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
        
        if(!$userId) {
            header('Location: auth/login');
            exit;
        }

        $articles = $this->articleModel->getArticlesByUserId($userId);
        $data = [
            'articles' => $articles,
            'user' => ['id' => $userId] // Add more user data if needed
        ];
        
        echo $this->twig->render('front/authorDashboard.twig', $data);
    }
}