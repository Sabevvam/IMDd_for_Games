<?php

namespace App\Services;

use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Game;
use App\Models\Review;



class GameService
{
    public function __construct(
        private DatabaseInterface $db
    ){
    }

    public function store(string $name,  string $description, UploadedFileInterface $image,int $category): false|int
    {
        $filePath = $image->move('games');

        return $this->db->insert('games', [
            'name' => $name,
            'description' => $description,
            'preview' => $filePath,
            'category_id' => $category,
        ]);
    }

    public function all():array
    {
        $games = $this->db->get('games');

        return array_map(function($game){
            return new Game(
                $game['id'],
                $game['name'],
                $game['description'],
                $game['preview'],
                $game['category_id'],
                $game['created_at']
            );
        }, $games);
    }

    public function destroy(int $id): void
    {
        $this->db->delete('games', ['id' => $id]);
    }

    public function find(int $id): ?Game
    {
        $game = $this->db->first('games', [
            'id' => $id,
        ]);

        if (! $game) {
            return null;
        }

        return new Game(
            $game['id'],
            $game['name'],
            $game['description'],
            $game['preview'],
            $game['category_id'],
            $game['created_at'],
            $this->getReviews($id)
        );
    }

    public function update(int $id, string $name, string $description, ?UploadedFileInterface $image, int $category): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'category_id' => $category,
        ];

        if ($image && ! $image->hasError()) {
            $data['preview'] = $image->move('games');
        }

        $this->db->update('games', $data, [
            'id' => $id,
        ]);
    }

    public function new()
    {
        $games = $this->db->get('games', [], ['id' => 'DESC'], 10);

        return array_map(function($game){
            return new Game(
                $game['id'],
                $game['name'],
                $game['description'],
                $game['preview'],
                $game['category_id'],
                $game['created_at']
            );
        }, $games);
    }

    private function getReviews(int $id): array
    {
        $reviews = $this->db->get('reviews', [
            'game_id' => $id,
        ]);

        return array_map(function ($review) {
            $user = $this->db->first('users', [
                'id' => $review['user_id'],
            ]);

            return new Review(
                $review['id'],
                $review['rating'],
                $review['review'],
                $review['created_at'],
                new User(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['password'],
                )
            );
        }, $reviews);
    }
}