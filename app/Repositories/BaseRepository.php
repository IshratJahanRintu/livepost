<?php

namespace App\Repositories;

use App\Models\Post;

abstract class BaseRepository
{
abstract public function create(array $attribute);
abstract  public function update($model,array $attributes);
abstract public function delete($model);
}
