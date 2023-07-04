<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(
            [
                "data" => "post",
                "req" => "get request"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     *
     */
    public function store()
    {
        return new JsonResponse(
            [
                "data" => "post",
                "req" => "post request"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
 */
    public function show(Post $post)
    {
        return new JsonResponse(
            [
                "data" => $post,
                "req" => "post request"
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param  Post  $post
     *
     */
    public function update( Post $post)
    {
        return new JsonResponse(
            [
                "data" => $post,
                "req" => "post update request"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     *
     */
    public function destroy(Post $post)
    {
        return new JsonResponse(
            [
                "data" => $post,
                "req" => "post delete request"
            ]
        );
    }
}
