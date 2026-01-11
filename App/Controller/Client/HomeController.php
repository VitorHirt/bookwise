<?php

namespace App\Controller\Client;

use Functions;
use Model\Database;

class HomeController
{
    public function index()
    {
        $helpers = new Functions();
        $db = new Database();
        $data['db'] = $db->db();
        extract($data);

        return include $helpers->view("client.layout.layout");
    }
}
