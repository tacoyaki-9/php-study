<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//===ここから削除（（トップページをリスト一覧画面にするため。未ログイン時はログイン画面に遷移させるため）===

//===ここまで削除===

//===ここから追加===
//①リスト一覧画面
Route::get('/','ListingsController@index');

//②リスト新規画面
Route::get('/new', 'ListingsController@new')->name('new');

//③リスト新規作成処理 
Route::post('/listings','ListingsController@store');

//リスト編集画面
Route::get('/listingsedit/{listings_id}','ListingsController@edit');

//リスト編集処理
Route::post('/listing/edit','ListingsController@update');

//リスト削除処理
Route::get('/listingsdelete/{listings_id}','ListingsController@destroy');

//カード新規画面
Route::get('/listing/{listing_id}/card/new','CardsController@new')->name('new_card');

//カード新規作成処理
Route::post('/listings/{listing_id}/card','CardsController@store');

//カード詳細画面
Route::get('/listing/{listing_id}/card/{card_id}','CardsController@show');

//カード編集画面
Route::get('/listing/{listing_id}/card/{card_id}/edit','CardsController@edit');

//カード編集処理
Route::post('/listings/{listing_id}/card/edit','CardsController@update');

//カード削除処理
Route::get('/listing/{listings_id}/carddelete/{card_id}/','CardsController@destroy');




//===ここまで追加===
/* ======= 解説 =======
■ルートの定義とは、このURLでアクセスされた時は、このコントローラのアクションを呼び出してください」と定義します。
    ①の場合、「/」でアクセスされたら、ListingsControllerのindexアクションを呼び出してねという支持になります

Route::get('リクエストされたURL','呼び出すコントローラー名@処理するコントローラ名');

②リスト新規画面の「->name('new')」の記述は、ルートの名前を定義しています。これを名前付きルートといいます。
名前を定義しておくことで、コントローラやビューで定義した名前でパスの指定をすることができます。

*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
