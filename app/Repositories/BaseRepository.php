<?php

namespace App\Repositories;

use App\Models\Post;

abstract class BaseRepository
{
abstract public function create(array $attribute);
abstract  public function update(Post $post,array $attributes);
abstract public function delete(Post $post);
}
