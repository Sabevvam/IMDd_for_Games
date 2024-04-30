<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;
use App\Kernel\View\View;
use App\Services\GameService;

class HomeController extends Controller
{
    public function index():void
    {
        $games = new GameService($this->db());

        $this->view('home', [
            'games' => $games->new()
        ]);
    }
}