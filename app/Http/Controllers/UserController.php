<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use \Illuminate\Http\JsonResponse;
use \Illuminate\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return new JsonResponse(
            [
                "data" => "hello",
                "req" => "get request"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     *  @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        return new JsonResponse(
            [
                "data" => "hello",
                "req" => "store request"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     *  @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return new JsonResponse(
            [
                "data" => $user,
                "req" => "show request"
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(User $user)
    {
        return new JsonResponse(
            [
                "data" => $user,
                "req" => "update request"
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     *  @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        return new JsonResponse(
            [
                "data" => "hello",
                "req" => "destro request"
            ]
        );
    }
}
