<?php

namespace App\Core;

class Controller {
    protected $twig;

    public function __construct($twig = null) {
        $this->twig = $twig;
    }

    protected function render($view, $data = []) {
        if ($this->twig) {
            echo $this->twig->render($view, $data);
        }
    }
}