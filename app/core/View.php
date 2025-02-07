<?php
namespace App\Core;

class View {
    protected $twig;

    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }

    protected function render($view, $data = []) {
        if ($this->twig) {
            try {
                echo $this->twig->render($view, $data);
            } catch (\Exception $e) {
                echo "Error rendering template: " . $e->getMessage();
            }
        } else {
            echo "Error: Twig environment not initialized";
        }
    }
}