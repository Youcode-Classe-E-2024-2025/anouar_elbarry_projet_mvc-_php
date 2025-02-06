<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller {
    public function notFound() {
        http_response_code(404);
        $this->render('error/404.twig', [
            'title' => '404 Not Found',
            'message' => 'The page you are looking for could not be found.'
        ]);
    }
}
