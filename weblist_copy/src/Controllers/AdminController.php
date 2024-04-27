<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\GameService;

class AdminController extends Controller
{
    public function index(): void
    {
        $categories = new CategoryService($this->db());
        $games = new GameService($this->db());

        $this->view('admin/index', [
            'categories' => $categories->all(),
            'games' => $games->all(),
        ]);
    }

}