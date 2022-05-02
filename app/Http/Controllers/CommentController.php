<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public function index($post_id)
  {
    $comments = Comment::with(['user', 'post'])->where('post_id', '=', $post_id)->get();

    return view('comment.index', [
      'comments' => $comments,
    ]);
  }

  public function store($post_id, Request $request)
  {
    $request->validate([
      'comment' => 'required',
    ]);
    $comment = new Comment();
    $comment->content = $request->input('comment');
    $comment->post()->associate(Post::find($post_id));
    $comment->user()->associate(Auth::user());
    $comment->save();

    return redirect()->route('post.show', ['id' => $post_id])->with('success', "Successfully added a new comment");
  }
  public function edit($post_id, $id)
  {
    $comment = Comment::with(['user', 'post'])->find($id);

    return view('comment.edit', [
      'comment' => $comment,
      'post_id' => $post_id,
    ]);
  }
  public function update($post_id, $id, Request $request)
  {
    $request->validate([
      'comment' => 'required',
    ]);
    $comment = Comment::find($id);
    $comment->content = $request->input('comment');
    $comment->save();

    return redirect()->route('post.show', ['id' => $post_id])->with('success', "Successfully updated the comment");
  }

  public function delete($post_id, $id, Request $request)
  {
    $comment = Comment::find($id);
    $comment->delete();

    return redirect()->route('post.show', ['id' => $post_id])->with('success', "Successfully deleted the comment");
  }
}
