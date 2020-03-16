<?php session_start();?>

<?PHP
 

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>
@extends('layouts.default')



@section('title', $ico->title)




@section('content')

<img class="logo" src="../storage/profile_images/{{$ico->id}}.jpg" width="200px" height="200px" alt="logo">





</br>
</br>
</br>

<h1>

{{ $ico->title }}
</h1>
<p>{!! nl2br(e($ico->body)) !!}</p>

<h2>コメント</h2>

<ul>
  @forelse ($ico->comments as $comment)
  <li>
    {{ $comment->body }}
    <!-- <a href="#" class="del" data-id="{{ $comment->id }}">[x]</a>
   <form method="post" action="{{ action('CommentsController@destroy', [$ico, $comment]) }}" id="form_{{ $comment->id }}">
     {{ csrf_field() }}
     {{ method_field('delete') }}
   </form> -->
  </li>
  @empty
  @endforelse
</ul>



<form method="post" action="{{ action('CommentsController@store', $ico) }}">
  {{ csrf_field() }}
  <p>
    <input type="text" name="body" placeholder="スキャム理由" value="{{ old('body') }}">
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="投稿">
    <a href="{{ url('/') }}" class="back">Back</a>
  </p>
</form>



<script src="/js/main.js"></script>

 

@endsection

@section('test')

<?PHP
require'../require/footer.php';
?>

@endsection