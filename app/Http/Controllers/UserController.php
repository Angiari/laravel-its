<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index($id){
       
        $user = User::findOrFail($id);
        $posts = $user->posts;

        return view('users.index', compact('user', 'posts'));
    }

}
