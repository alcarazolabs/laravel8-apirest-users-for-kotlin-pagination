<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $NUM_PAGES = 15;

    public function users(Request $request){

        $nombre = $request->name;

        $users = User::buscarPorNombre($nombre)->paginate($this->NUM_PAGES)->withQueryString();
        //retornar response json
        return response()->json([
             $users,
        ], 200);

    }
}
