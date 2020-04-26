<?php

namespace App\Controller;

class PagesController
{

    // public function crud()
    // {
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/pages/crud.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    public function index()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function about()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/about.php';
        require APP . 'view/_templates/footer.php';
    }

    public function credits()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/credits.php';
        require APP . 'view/_templates/footer.php';
    }

    public function error()
    {
        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/error.php';
        require APP . 'view/_templates/footer.php';
    }
}
