<?php

namespace App\Repositories;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
    function create($attributes)
    {
        $created = DB::transaction(function () use ($attributes) {
            $created = Post::query()->create([
                'title' => data_get($attributes, 'title', 'untitled'),
                'body' => data_get($attributes, 'body'),
            ]);
            $created->users()->sync(data_get($attributes, 'user_ids'));

            return $created;
        });
        return new PostResource($created);

    }

    function update(Post $post, $attributes)
    {
        $updated = $post->update([
            'title' => data_get($attributes, 'title', 'untitled'),
            'body' => data_get($attributes, 'body')
        ]);
        if (!$updated) {
            throw new \Exception('Failed to update');
        }
        if ($user_ids = data_get($attributes, 'user_ids')) {
            $post->users()->sync($user_ids);
        }
        return new PostResource($post);

    }

    function delete(Post $post)
    {
        $deleted = $post->forceDelete();
        return new JsonResponse(
                ["data" => $deleted,
                "req" => "post delete request"
            ]
        );
    }
}
