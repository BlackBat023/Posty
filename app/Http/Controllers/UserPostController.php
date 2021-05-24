<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    // Index method
    public function index(User $user)
    {
        // extract user posts
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        
        // render view
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

}
