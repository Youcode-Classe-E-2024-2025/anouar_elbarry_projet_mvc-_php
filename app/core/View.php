<?php
namespace App\Core;

class View {
    protected $twig;
    protected $session;

    public function __construct() {
        global $twig;
        $this->twig = $twig;
        $this->session = Session::getInstance();
    }

    protected function render($view, $data = []) {
        if ($this->twig) {
            try {
                // Add session data to all views
                $data['session'] = [
                    'username' => $this->session->get('username'),
                    'user_id' => $this->session->get('user_id'),
                    'role' => $this->session->get('role')
                ];
                
                // Add flash messages if they exist
                if ($this->session->hasFlash()) {
                    $data['flash'] = $this->session->getFlash();
                }
                
                echo $this->twig->render($view, $data);
            } catch (\Exception $e) {
                echo "Error rendering template: " . $e->getMessage();
            }
        } else {
            echo "Error: Twig environment not initialized";
        }
    }
}