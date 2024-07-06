<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\Controller;


class DashboardController  extends Controller
{
    public function index(){

         $posts = Auth::user()->posts()->latest()->paginate(6);
         //dd($posts);
        return view('users.dashboard' , ['posts' => $posts]);
    }
    public function userPosts(User $user) {
        $userPosts = $user->posts()->latest()->paginate(6);
        return view ('users.posts' , [
            'posts' => $userPosts,
            'user' => $user
        ]);
    }
}


