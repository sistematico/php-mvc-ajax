<?php

namespace App\Controller;

use App\Model\Quote;

class QuotesController
{

    public function index()
    {
        header('location: ' . URL);
    }

    public function list()
    {
        $Quote = new Quote();
        echo $Quote->list();
    }

    public function populate()
    {
        $Quote = new Quote();
        echo $Quote->populate();
    }

    public function prune()
    {
        $Quote = new Quote();
        echo $Quote->prune();
    }

    public function add()
    {
        $Quote = new Quote();
        echo $Quote->add($_POST["quote"], $_POST["author"], $_POST["tags"]);
    }

    public function delete($id)
    {
        if (isset($id)) {
            $Quote = new Quote();
            echo $Quote->delete($id);
        }
    }

    public function edit($id)
    {
        if (isset($id)) {
            $Quote = new Quote();
            echo $Quote->get($id);
        }
    }

    public function update()
    {
        $Quote = new Quote();
        echo $Quote->update($_POST["quote"], $_POST["author"], $_POST["tags"], $_POST['id']);
    }

    public function search()
    {
        if (isset($_POST["term"]) && strlen($_POST["term"]) > 1) {
            $Quote = new Quote();
            echo $Quote->search($_POST["term"]);
        }
    }

    public function amount()
    {
        $Quote = new Quote();
        echo $Quote->amount();
    }
}
