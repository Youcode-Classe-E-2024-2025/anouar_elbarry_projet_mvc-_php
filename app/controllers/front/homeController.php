<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\Models\Article;

class HomeController extends View {
    private $articleModel;
    
    public function __construct() {
        parent::__construct();
        $this->articleModel = new Article();
    }
    
    public function index() {
        // Get latest articles for the homepage
        $articles = $this->articleModel->getAllArticles();
        
        $data = [
            'title' => 'Welcome to Our Blog',
            'description' => 'Discover our latest articles and stay updated',
            'articles' => $articles
        ];
        
        return parent::render('front/home.twig', $data);
    }
}