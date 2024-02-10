<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ModelInfoController extends Controller
{
    public function getData($model) {
        $ret =  match($model) {
            "user",
            "users" => User::getModelInfo(),
            default => null,
        };

        if ($ret === null) {
            return Response::json(['message' => 'Not found.'], 404);
        }
        return Response::json($ret);
    }
}
