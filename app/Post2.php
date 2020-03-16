<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post2 extends Model
{
   protected $fillable = ['title', 'content', 'user_id'];
}
