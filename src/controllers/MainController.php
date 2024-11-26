<?php

class MainController
{
    public function home()
    {
        $this->render('home');
    }

    public function about()
    {
        $this->render('about');
    }

    public function notFound()
    {
        $this->render('404');
    }

    private function render($view,$data = [])
    {
        extract($data);

        $viewfile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewfile)) {
            require_once $viewfile;
        } else {
            $this->render('404');
        }
    }

}