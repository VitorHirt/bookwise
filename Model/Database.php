<?php

namespace Model;

use PDO;

class Database
{
    public function db()
    {
        $db = new PDO('sqlite:database.sqlite');
        $query = $db->query('SELECT * FROM users');
        return $query->fetchAll();
    }
}
