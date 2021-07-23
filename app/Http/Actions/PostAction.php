<?php
namespace App\Http\Actions;

use App\Models\Post;
use App\DataTransferObjects\PostDTO;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostAction
{
    public function create(PostDTO $postDTO): void
    {
        Post::create([
            'title' => $postDTO->title,
            'description' => $postDTO->description,
            'slug' => SlugService::createSlug(Post::class, 'slug', $postDTO->title),
            'image_path' => $postDTO->image_path,
            'user_id' => auth()->user()->id
        ]);
    }

    public function update(PostDTO $postDTO, $slug): void
    {
        Post::where('slug', $slug)
            ->update([
                'title' => $postDTO->title,
                'description' => $postDTO->description,
            ]);
    }


}