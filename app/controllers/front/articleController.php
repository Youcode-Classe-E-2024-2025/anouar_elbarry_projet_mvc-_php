<?php
namespace App\Controllers\Front;

use App\Models\Article; 
use App\Core\View;

class ArticleController extends View {
    private Article $articleModel;

    public function __construct($twig) {
        parent::__construct($twig);
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
}