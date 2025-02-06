<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Models\Article;

class HomeController extends Controller {
    private $articleModel;
    
    public function __construct($twig) {
        parent::__construct($twig);
        $this->articleModel = new Article();
    }
    
    public function index() {
        // Get latest articles for the homepage
        
        $data = [
            'title' => 'Welcome to Our Blog',
            'description' => 'Discover our latest articles and stay updated',
        ];
        
        echo $this->twig->render('front/home.twig', $data);
    }
}