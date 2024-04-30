<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
use App\Kernel\Validator\Validator;
use App\Kernel\View\View;
use App\Services\CategoryService;
use App\Services\GameService;

class GamesController extends Controller
{
    private GameService $service;
    public function create():void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/games/add', [
           'categories' => $categories->all()
        ]);
    }

    public function add(): void
    {
        $this->view('admin/games/add');
    }

    public function store(): void
    {

       $file = $this->request()->file('image');

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['required'],
            'category' => ['required'],
            'image' => ['image']
        ]);


        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }
            $this->redirect('/admin/games/add');
            //dd('Validation failed', $this->request()->errors());
        }

        $this->service()->store(
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('category'),
        );

        $this->redirect('/admin');
    }

    public function destroy(): void
    {
        $this->service()->destroy($this->request()->input('id'));

        $this->redirect('/admin');
    }

    private function service(): GameService
    {
        if (! isset($this->service)) {
            $this->service = new GameService($this->db());
        }
        return $this->service;
    }

    public function edit(): void
    {
        $categories = new CategoryService($this->db());

        $this->view('admin/games/update', [
            'game' => $this->service()->find($this->request()->input('id')),
            'categories' => $categories->all(),
        ]);
    }

    public function update()
    {
        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['required'],
            'category' => ['required'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $errors) {
                $this->session()->set($field, $errors);
            }

            $this->redirect("/admin/games/update?id={$this->request()->input('id')}");
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('name'),
            $this->request()->input('description'),
            $this->request()->file('image'),
            $this->request()->input('category'),
        );

        $this->redirect('/admin');
    }

    public function show():void
    {
        $this->view('game', [
            'game' => $this->service()->find($this->request()->input('id')),
        ]);
    }
}