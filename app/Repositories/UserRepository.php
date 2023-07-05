<?php

namespace App\Repositories;

use App\Events\Models\User\UserCreated;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;



class UserRepository extends BaseRepository
{
    function create($attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $created = User::query()->create([
                'name' => data_get($attributes, 'name'),
                'email' => data_get($attributes, 'email'),
                'password'=>data_get($attributes,'password')
            ]);

event(new UserCreated($created));
            return $created;
        });


    }

    /**
     * @param $user
     * @param $attributes
     * @return UserResource
     */
    function update($user, $attributes)
    {
        $updated = $user->update([
            'name' => data_get($attributes, 'name')??$user->name,
            'email' => data_get($attributes, 'email')??$user->email,
            'password'=>data_get($attributes,'password')??$user->password
        ]);
    if (!$updated) {
            throw new \Exception('Failed to update');
        }


        return new UserResource($user);

    }

    function delete( $user)
    {
        $deleted = $user->forceDelete();
        return new JsonResponse(
                ["data" => $deleted,
                "req" => "user delete request"
            ]
        );
    }
}
