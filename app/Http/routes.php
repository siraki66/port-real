:
  Route::get('/signin',[
  'uses' => 'UserController@getSignin',
  'as' => 'user.signin'
  ]);
: