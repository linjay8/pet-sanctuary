<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::with(['animal'])->get();

    return view('post.index', [
      'posts' => $posts,
    ]);
  }
  public function show($id)
  {
    $post = Post::with(['animal'])->find($id);
    $comments = Comment::with(['post'])->where('post_id', '=', $id)->orderBy('updated_at', 'desc')->get();
    return view('post.show', [
      'post' => $post,
      'comments' => $comments,
    ]);
  }
  public function create()
  {
    $animals = Animal::all();

    return view('post.create', [
      'animals' => $animals,
    ]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'description' => 'required',
      'status' => 'required',
      'animal' => 'required',
    ]);
    $post = new Post();
    $post->description = $request->input('description');
    $post->status = $request->input('status');
    $post->user()->associate(Auth::user());
    $post->animal()->associate(Animal::find($request->input('animal')));
    $post->save();


    return redirect()->route('post.index')->with('success', "Successfully added a new post");
  }
  public function edit($id)
  {
    $post = Post::with(['animal'])->find($id);
    $animals = Animal::all();

    return view('post.edit', [
      'post' => $post,
      'animals' => $animals,
    ]);
  }
  public function update($id, Request $request)
  {
    $request->validate([
      'description' => 'required',
      'status' => 'required',
      'animal' => 'required',
    ]);
    $post = Post::find($id);
    $post->description = $request->input('description');
    $post->status = $request->input('status');
    $post->user()->associate(Auth::user());
    $post->animal()->associate(Animal::find($request->input('animal')));
    $post->save();

    return redirect()->route('post.index')->with('success', "Successfully updated the post");
  }
  public function delete($id)
  {
    $post = Post::with(['animal'])->find($id);

    return view('post.delete', [
      'post' => $post,
    ]);
  }
  public function remove($id, Request $request)
  {
    $post = Post::find($id);
    $comments = Comment::with(['post', 'user'])->where('post_id', '=', $id);
    $comments->delete();
    $post->delete();

    return redirect()->route('post.index')->with('success', "Successfully deleted the post");
  }
}
