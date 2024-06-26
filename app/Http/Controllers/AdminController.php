<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
	public function posts()
	{
		$posts = Post::orderBy('id', 'desc')->get();
		return view('admin.posts', compact('posts'));
	}

	public function users()
	{
		$users = User::orderBy('id', 'desc')->get();
		return view('admin.users', compact('users'));
	}
	public function user(User $user)
	{
		$posts = $user->posts;
		$comments = $user->comments;
		return view('admin.user', compact(['user','posts','comments']));
	}

	public function comments()
	{
		$comments = Comment::orderBy('id', 'desc')->get();
		return view('admin.comments', compact('comments'));
	}
}
