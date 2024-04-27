<?php

namespace App\Models;

class Game
{

    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private string $preview,
        private int $categoryId
    )
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function preview(): string
    {
        return $this->preview;
    }

    public function categoryId(): int
    {
        return $this->categoryId;
    }
}