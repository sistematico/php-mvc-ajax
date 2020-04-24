<?php

namespace App\Model;

use App\Core\Model;

class Quote extends Model
{

    private $results = [];

    public function list()
    {
        $sql = "SELECT id, quote, author, tags, date FROM quote";
        $query = $this->db->prepare($sql);
        $query->execute();
        //return $query->fetchAll();
        while ($row = $query->fetch()) {
            $this->results[] = ['id' => $row->id,'quote' => $row->quote,'author' => $row->author,'tags' => $row->tags,'date' => $row->date];
        }
        return $this->results;
    }

    public function add($quote, $author, $tags)
    {
        $sql = "INSERT INTO quote (quote, author, tags) VALUES (:quote, :author, :tags)";
        $query = $this->db->prepare($sql);
        $query->execute([':quote' => $quote, ':author' => $author, ':tags' => $tags]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM quote WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);
    }

    public function get($id)
    {
        $sql = "SELECT id, quote, author, tags, date FROM quote WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);
        return $query->fetch();
    }

    public function update($quote, $author, $tags, $id)
    {
        $sql = "UPDATE quote SET quote = :quote, author = :author, tags = :tags WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([':quote' => $quote, ':author' => $author, ':tags' => $tags, ':id' => $id]);
    }

    public function getAmountOfQuotes()
    {
        $sql = "SELECT COUNT(id) AS amount FROM quote";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->amount;
    }

    public function searchQuotes($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT id, quote, author, tags, date FROM quote WHERE quote LIKE :term OR author LIKE :term OR tags LIKE :term";
        $query = $this->db->prepare($sql);
        $query->execute([':term' => $term]);
        
        while ($row = $query->fetch()) {
            $this->results[] = ['id' => $row->id,'quote' => $row->quote,'author' => $row->author,'tags' => $row->tags,'date' => $row->date];
        }
        return $this->results;
    }

    public function install()
    {
        $sql = "CREATE TABLE IF NOT EXISTS quote (id INTEGER PRIMARY KEY, quote TEXT, author TEXT, tags TEXT, date TEXT DEFAULT CURRENT_TIMESTAMP)";
        try {
            $this->db->exec($sql);
            return "Table installed.";
        } catch(\PDOException $e) {
            unset($e);
            return "Error: " . $e->getMessage();
        }
    }

    public function prune($tabela = 'quote')
    {
        $this->db->exec("DROP TABLE IF EXISTS $tabela");

        try {
            $this->db->exec("CREATE TABLE IF NOT EXISTS $tabela (id INTEGER PRIMARY KEY, quote TEXT, author TEXT, tags TEXT, date TEXT DEFAULT CURRENT_TIMESTAMP)");
            return "Tabela $tabela recriada com sucesso.<br />";
        } catch (\PDOException $e) {
            return "Erro ao criar tabela $tabela: " . $e->getMessage() . "<br />";
        }
    }

    public function populate($file = ROOT . 'quotes.sql')
    {
        if (file_exists($file)) {
            $sql = file_get_contents($file);
        } else {
            return "File $file not found.";
        }

        try {
            $this->db->exec($sql);
            return "Data imported";
        } catch(\PDOException $e) {
            //unset($e);
            return "Error: " . $e->getMessage();
        }

        return "Error importing data";
    }

    public function tableExists($table = 'quote')
    {
        $sql = "select 1 from $table";
        try {
            $this->db->exec($sql);
            return true;
        } catch(\PDOException $e) {
            unset($e);
            return false;
        }
        return false;
    }    
}