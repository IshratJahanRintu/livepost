<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {

        $page_size = $request->page_size ?? 20;

        $posts = Post::query()->paginate($page_size);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     *
     */
    public function store(Request $request, PostRepository $repository)
    {
return $repository->create($request->only([
    'title',
    'body',
    'user_ids'
]));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     *
     */
    public function update(Post $post, Request $request,PostRepository $repository)
    {
return $repository->update($post,$request->only([
    'title',
    'body',
    'user_ids'
]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     */
    public function destroy(Post $post,PostRepository $repository)
    {
      return  $repository->delete($post);
    }
}
