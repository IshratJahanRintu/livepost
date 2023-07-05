<?php

namespace App\Http\Controllers;


use App\Events\Models\User\UserCreated;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



class UserController extends Controller
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
                "data" => "hello",
                "req" => "get request"
            ]
        );
    }

    function v2index(): JsonResponse
    {
        return new JsonResponse(
            [
                "data" => "hello from index version 2",
                "req" => "get request"
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param UserRepository $repository
     * @return UserResource
     */
    public function store(Request $request, UserRepository $repository)
    {
        return $repository->create($request->only([
            'name',
            'email',
            'password'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
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
     * @param Request $request
     * @param User $user
     * @return \App\Http\Resources\UserResource
     */
    public function update(User $user, Request $request, UserRepository $repository)
    {
        event(new UserCreated($user));
        return $repository->update($user, $request->only(
            [
                'name',
                'email', 'password'
            ]
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user, UserRepository $repository)
    {
        return $repository->delete($user);
    }
}
