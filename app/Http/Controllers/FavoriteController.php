<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
  public function index()
  {
    $favorites = Favorite::with(['user', 'post'])->where('user_id', '=', Auth::user()->id)->get();
    $posts = new Collection();
    foreach ($favorites->each->post as $post) {
      $posts->push($post->post);
    }
    return view('favorite.index', [
      'favorites' => $favorites,
      'posts' => $posts,
    ]);
  }

  public function store($post_id, Request $request)
  {
    $favorite = new Favorite();
    $favorite->post()->associate(Post::find($post_id));
    $favorite->user()->associate(Auth::user());
    $favorite->save();

    return redirect()->route('post.index')->with('success', "Successfully added to favorites");
  }

  public function delete($post_id, Request $request)
  {
    $favorites = Favorite::with(['user', 'post'])->where('user_id', '=', Auth::user()->id)->where('post_id', '=', $post_id)->get();
    $favorites->each->delete();

    return redirect()->route('post.index')->with('success', "Successfully removed from favorites");
  }
}
