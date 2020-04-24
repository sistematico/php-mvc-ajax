<?php

namespace App\Controller;

use App\Model\Quote;

class QuotesController
{
    public function index()
    {
        $Quote = new Quote();
        if ($Quote->tableExists() === true) {
            $quotes = $Quote->getAllQuotes();
            $amount = $Quote->getAmountOfQuotes();
        } else {
            $result = $Quote->install();
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function populate()
    {
        $Quote = new Quote();
        $result = $Quote->populate();
        $quotes = $Quote->getAllQuotes();
        $amount = $Quote->getAmountOfQuotes();
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function prune()
    {
        $Quote = new Quote();
        $result = $Quote->prune();
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if (isset($_POST["submit_add_quote"]) && strlen($_POST["artist"]) > 1) {
            $Quote = new Quote();
            $Quote->add($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }        
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete($id)
    {
        if (isset($id)) {
            $Quote = new Quote();
            $Quote->delete($id);
        }
        header('location: ' . URL . 'quotes/index');
    }

    public function edit($id)
    {
        if (isset($id)) {
            $Quote = new Quote();
            $quote = $Quote->get($id);

            if ($quote === false) {
                $page = new \App\Controller\PagesController();
                $page->error();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/quotes/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            header('location: ' . URL . 'quotes/index');
        }
    }

    public function update()
    {
        if (isset($_POST["submit_update_quote"])) {
            $Quote = new Quote();
            $Quote->update($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['id']);
        }
        header('location: ' . URL . 'quotes');
    }

    public function search()
    {
        if (isset($_POST["term"]) && strlen($_POST["term"]) > 1) {
            $Quote = new Quote();
            $result = $Quote->searchTracks($_POST["term"]);
        } 
        require APP . 'view/_templates/header.php';
        require APP . 'view/quotes/search.php';
        require APP . 'view/_templates/footer.php';
    }

    public function ajaxGetStats()
    {
        $Quote = new Quote();
        $amount = $Quote->getAmountOfQuotes();
        echo $amount;
    }
}
