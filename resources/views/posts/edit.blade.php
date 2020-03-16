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

@section('title', '編集ページ')

@section('content')
<h1>
   <div class="container">
      <div class="row o-3column">
        <div class="col-md-4">
  更新画面
</h1>

<form method="post" action="{{ url('/posts', $ico->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <input type="text" name="title" placeholder="ICO名" value="{{ old('title', $ico->title) }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>

  <p>
    <textarea name="body" placeholder="内容">{{ old('body', $ico->body) }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>

  <a href="{{ url('/') }}" class="back">Back</a>

  <p><input type="submit" value="更新"></p>
</form>


@endsection

@section('test')

<?PHP
require'../require/footer.php';
?>

@endsection


