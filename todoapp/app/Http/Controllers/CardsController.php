<?php

namespace App\Http\Controllers;

use App\Card;
use App\Listing;
use Auth;
use Validator;


use Illuminate\Http\Request;

class CardsController extends Controller
{
    
    //
        //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    
    
    public function new($listing_id)
    {

        $listing = Listing::where('id',$listing_id)->first();
        return view('card/new',['listing' => $listing]);
        // テンプレート「card/new.blade.php」を表示します。
    }
    
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['card_name' => 'required|max:255','card_memo' => 'required|max:255', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければCardモデルを介して、作ったカードタイトルとメモとlisting_idをcardsテーブルに保存
        $cards = new Card;
        $cards->title = $request->card_name;
        $cards->memo = $request->card_memo;
        $cards->listing_id = $request->listing_id;
        $cards->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    
    public function show($listing_id,$card_id)
    {
        $listing = Listing::where('id',$listing_id)->first();
        $card = Card::where('id',$card_id)->first();
        return view('card/show',['listing' => $listing],['card' => $card]);
        
        // テンプレート「card/show.blade.php」を表示します。
    }
    
    public function edit($listing_id,$card_id)
    {
        $card = Card::where('id',$card_id)->first();
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        
        return view('card/edit',['listings' => $listings],['card' => $card]);
        
        // テンプレート「card/edit.blade.php」を表示します。
    }
    
    public function update(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['card_name' => 'required|max:255', 'card_memo' => 'required|max:255',]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければCardモデルを介して、作ったカードタイトルとメモとlisting_idをcardsテーブルに更新
        $cards = Card::where('id',$request->card_id)->first();
        $cards->title = $request->card_name;
        $cards->memo = $request->card_memo;
        $cards->listing_id = $request->list_id;
        $cards->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    /*
    *カードの削除
    */
    public function destroy($listings_id,$card_id)
    {
        $cards = Card::where('id',$card_id)->delete();
        return redirect('/');
    }   
}
