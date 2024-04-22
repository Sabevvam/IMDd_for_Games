<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;

class GamesController extends Controller
{
    public function index():void
    {
        $this->view('games');
    }

    public function add(): void
    {
        $this->view('admin/games/add');
    }

    public function store(): void
    {

       $file = $this->request()->file('image');

        $filePath = $file->move('games');

        dd($this->storage()->url($filePath));

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);


        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/games/add');
            //dd('Validation failed', $this->request()->errors());
        }

        $id = $this->db()->insert('games',[
            'name' => $this->request()->input('name'),
        ]);

        dd("Game added successfully");

    }
}