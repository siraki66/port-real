<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected $fillable = ['body'];

  // $comment->post
  public function ico() {
    return $this->belongsTo('App\Ico');
  }
}


