<?php

namespace App\Model;

use App\Core\Model;

class Quote extends Model
{

    private $results = [];

    public function getAllQuotes()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function add($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);
        $query->execute($parameters);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM song WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }

    public function get($id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function update($artist, $track, $link, $id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':id' => $id);
        $query->execute($parameters);
    }

    public function getAmountOfQuotes()
    {
        $sql = "SELECT COUNT(id) AS amount FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->amount;
    }

    public function searchTracks($term)
    {
        $term = "%" . $term . "%";
        $sql = "SELECT id, artist, track, link FROM song WHERE artist LIKE :term OR track LIKE :term";
        $query = $this->db->prepare($sql);
        $query->execute([':term' => $term]);
        while ($row = $query->fetch()) {
            $this->results[] = [
                'id' => $row->id,
                'artist' => $row->artist,
                'track' => $row->track,
                'link' => $row->link
            ];
        }
        return $this->results;
    }

    public function install()
    {
        $sql = "CREATE TABLE IF NOT EXISTS song (id INTEGER PRIMARY KEY, artist TEXT, track TEXT, link TEXT)";
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
            $this->db->exec("CREATE TABLE IF NOT EXISTS $tabela (id INTEGER PRIMARY KEY, artist TEXT, track TEXT, link TEXT)");
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

    public function getTableList()
    {
        $sql = "SELECT name FROM sqlite_master WHERE type='table'";
        $query = $this->db->query($sql);
        return $query->fetch();
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