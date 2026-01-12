<?php

namespace App\Controller\Client;

use Functions;
use Model\Database;

class BookController
{
    protected Functions $helpers;
    protected Database $db;

    public function __construct(Functions $helpers, Database $db)
    {
        $this->helpers = $helpers;
        $this->db = $db;
    }

    public function index($id)
    {
        $bookView = 'client.book';
        return include $this->helpers->view("client.layout.layout");
    }
}
