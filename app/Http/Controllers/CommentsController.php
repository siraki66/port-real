<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Ico;
class CommentsController extends Controller
{

  public function store(Request $request, Ico $ico) {
    $this->validate($request, [
      'body' => 'required'
    ],
    [
           
           'body.required'  => 'コメントは必須です。',
    ]);
    $comment = new Comment(['body' => $request->body]);
    $ico->comments()->save($comment);
    return redirect()->action('PostsController@show', $ico);
  }

  public function destroy(Ico $ico, Comment $comment) {
    $comment->delete();
    return redirect()->back();
    
  }

}

