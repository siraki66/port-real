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

@section('title', 'New Post')

@section('content')
<h1>ICO追加画面</h1>


@if ($is_image)
<figure>
    <img src="/storage/profile_images/{{ Auth::id() }}.jpg" width="100px" height="100px">
    <figcaption>現在のプロフィール画像</figcaption>
</figure>
@endif

<form method="POST" action="{{ url('/posts/create') }}" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <p> 
    <input type="text" name="title" placeholder="ICO名" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>


  <p> 
    <textarea name="body" placeholder="内容">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>

    <input type="file" name="photo">
</br>
</br>

<a href="{{ url('/') }}" class="back">Back</a>

    <input type="submit">
  </form>

  @endsection

  @section('test')

<?PHP 
require'../require/footer.php';
?>

@endsection





