<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;

class View
{

    public function __construct(
        private Session $session
    )
    {
        $this->session = $session;
    }

    public function page(string $name): void
    {
        $viewPath = APP_PATH."/views/pages/$name.php";

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name does not exist");
        }

        extract(array: [
            'view' => $this,
            'session' => $this->session
    ]);

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";

        if (!file_exists($componentPath)) {
            echo "Component $name does not exist";
            return;
        }

        include_once APP_PATH."/views/components/$name.php";
    }

    private function defaultData(): array {
        return [
            'v1iew' => $this,
            'session' => $this->session,
        ];
    }
}