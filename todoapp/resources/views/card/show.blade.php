@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カードの詳細情報-->
  {{csrf_field()}} 
    <div class="container">
      <div class="row">
        <div class="panel panel-info">
          <div class="panel-heading">
            <label>タイトル</label>
          </div>
          <div class="panel-body text-center">
            <p>{{old('card_name',$card->title)}}</p>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <label>メモ</label>
          </div>
          <div class="panel-body text-center">
            <p>{{old('card_memo',$card->memo)}}</p>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <label>リスト名</label>
          </div>
          <div class="panel-body text-center">
            <p>{{old('listing_title',$listing->title)}}</p>
            <input type="hidden" name="listing_id" value="{{ old('listing_id', $listing->id) }}">
            <input type="hidden" name="listing_id" value="{{ old('card_id', $card->id) }}">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6 text-center"> 
        <a class="cardDetail_link" href="/listing/{{$listing->id}}/card/{{$card->id}}/edit">
          <button class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i>&nbsp;&nbsp;編集する</button>
        </a>
      </div>
    </div>
    <div class="form-group"> 
      <div class="col-sm-offset-3 col-sm-6 text-center"> 
        <a class="cardDetail_link" href="/listing/{{$listing->id}}/carddelete/{{$card->id}}">
          <i class="glyphicon glyphicon-remove text-danger">削除する</i>
        </a>
      </div>
    </div>

  
</div> 
@endsection