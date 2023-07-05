<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class GeneralJsonException extends Exception
{

    public function report()
    {
        dump("from report method");
    }

    public function render(Request $request)
    {
        return new JsonResponse([
            'message' => $this->getMessage(),

        ]);
    }
    //
}
