<?php
namespace storage;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; //付け加えた
use App\Http\Requests\ProfileRequest; //画像ファイルアップのため付け加えた
use Illuminate\Support\Facades\Auth; //ログイン認証のため付け加えた
use Illuminate\Support\Facades\Storage; //画像ファイルアップのため付け加えた

use Illuminate\Http\Request;
use App\Post;
use App\Ico;
use App\Http\Requests\PostRequest;
use App\Http\Requests\IdRequest;

class PostsController extends Controller
{
    public function index() { 
     


      $posts = Ico::latest()->get();  //ICOモデルの場合
      $postdescs = Ico::orderBy('id', 'asc')->get();

 

      return view('posts.index')->with([
        'posts' => $posts,
        'postdescs' => $postdescs
        ]);

    }

  
    public function show(Ico $ico) {
    
      return view('posts.show')->with([
        'ico' => $ico
        
        ]);
     }

    public function store(PostRequest $request) {
      $post = new Post(); 
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
    }

    public function edit(Ico $ico) {
 
      return view('posts.edit')->with('ico', $ico); //必要
    }

    public function update(PostRequest $request, Ico $ico) {
      $ico->title = $request->title;
      $ico->body = $request->body;
      $ico->save();
      return redirect('/');
    }



    public function destroy(Ico $ico) {

      $ico->delete();
      return redirect('/');
    }




    public function search(Request $request){



      $word = $request->word;

      return view('posts.search2',compact('word')); 

      }





    public function search2(Request $request){


      $posts = Ico::latest()->get();
      
      $record = $request->word;
      $recordwords= Ico::where('title', 'like', "%{$record}%")->get();

 


      return view('posts.search2')->with([
        'posts' => $posts,
        'recordwords' => $recordwords
        ]);


      }










    public function test(){

      return view('posts.test');

        
      }

    public function test2($id){

 

      return view('posts.test', ['id' => $id]);

        
      }



      
      // 新規登録＆ログイン
    public function signup(){
   
      return view('posts.customer_input');
          }

    public function signup_out(){
   
      return view('posts.customer_output');
          }


    public function login(){
   
      return view('posts.login');
          }

    public function login_out(){
   
      return view('posts.login_output');
          }


      //ログアウト
    public function logout(){
      return view('posts.logout');
         }

//CSVダウンロード
    public function csv(){
   
      return view('posts.csv');
          }


    public function create() {
      return view('posts.create');

        
      
    }




      public function az(Request $request, string $initial){

        $posts = Ico::latest()->get();
        $items = Ico::where('title', 'like', $initial . '%')->get();
   
  
        return view('posts.az')->with([
          'posts' => $posts,
          'items' => $items
          ]);


    }
  

 /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
    public function img_index()
    {
      $is_image = false;
      if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
          $is_image = true;
      }
        return view('/posts/create', ['is_image' => $is_image]);
    }


    /**
     * プロフィールの保存
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function img_store(ProfileRequest $request)
    {
      $post = new Ico(); 
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      
      $a=$post->id;
      $post->image_url = $request->photo->storeAs('public/profile_images', $a. '.jpg');
      // $post->image_url = $request->photo->storeAs('../../public/storage/profile_images', $a. '.jpg');
      var_dump($post->image_url);  
      $post->save(); 

 
      return redirect('posts/create')->with('success', '新しいプロフィールを登録しました');
    }




}


